<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class BackupController extends Controller
{
    public function index()
    {
        $backups = [];
        $files = Storage::files('backups');

        foreach ($files as $file) {
            $backups[] = [
                'filename' => basename($file),
                'size' => round(Storage::size($file) / 1024 / 1024, 2), // MB
                'created_at' => Carbon::createFromTimestamp(Storage::lastModified($file)),
            ];
        }

        // Sort by date descending
        usort($backups, function ($a, $b) {
            return $b['created_at']->getTimestamp() - $a['created_at']->getTimestamp();
        });

        return view('settings.backups', compact('backups'));
    }

    public function create()
    {
        $dbPath = database_path('database.sqlite');
        
        if (!File::exists($dbPath)) {
            return redirect()->back()->with('error', 'Database file not found.');
        }

        $filename = 'backup-' . Carbon::now()->format('Y-m-d-H-i-s') . '.sqlite';
        $backupPath = 'backups/' . $filename;

        // Ensure backups directory exists
        if (!Storage::exists('backups')) {
            Storage::makeDirectory('backups');
        }

        // Copy database file to storage
        if (File::copy($dbPath, storage_path('app/private/' . $backupPath)) || File::copy($dbPath, storage_path('app/' . $backupPath))) {
            // Note: Depending on Laravel version/config, paths might vary. 
            // Let's use File Facade for direct filesystem copy if Storage fails or to be sure.
            $fullBackupPath = storage_path('app/backups/' . $filename);
            if (!File::isDirectory(storage_path('app/backups'))) {
                File::makeDirectory(storage_path('app/backups'), 0755, true);
            }
            File::copy($dbPath, $fullBackupPath);
            
            return redirect()->route('backups.index')->with('success', 'Backup created successfully.');
        }

        return redirect()->back()->with('error', 'Failed to create backup.');
    }

    public function download($filename)
    {
        $path = 'backups/' . $filename;

        if (!Storage::exists($path)) {
            // Check direct file system just in case
            if (!File::exists(storage_path('app/backups/' . $filename))) {
                abort(404);
            }
            return response()->download(storage_path('app/backups/' . $filename));
        }

        return Storage::download($path);
    }

    public function destroy($filename)
    {
        $path = 'backups/' . $filename;

        if (Storage::exists($path)) {
            Storage::delete($path);
        } elseif (File::exists(storage_path('app/backups/' . $filename))) {
            File::delete(storage_path('app/backups/' . $filename));
        }

        return redirect()->back()->with('success', 'Backup deleted successfully.');
    }

    public function downloadCurrent()
    {
        $dbPath = database_path('database.sqlite');
        
        if (!File::exists($dbPath)) {
            return response()->json(['error' => 'Database file not found.'], 404);
        }

        $filename = 'backup-' . Carbon::now()->format('Y-m-d-H-i-s') . '.sqlite';
        return response()->download($dbPath, $filename);
    }

    public function restore(Request $request)
    {
        $request->validate([
            'backup_file' => 'required|file',
        ]);

        $file = $request->file('backup_file');
        $dbPath = database_path('database.sqlite');

        // Optional: Basic validation to check if it's a sqlite file
        // SQLite files start with "SQLite format 3"
        $header = file_get_contents($file->getRealPath(), false, null, 0, 15);
        if ($header !== "SQLite format 3") {
            return response()->json(['error' => 'Invalid backup file format. Must be a SQLite 3 database.'], 422);
        }

        try {
            // Close existing connections if possible
            DB::disconnect();

            // Backup existing one just in case
            $oldBackup = database_path('database.sqlite.old');
            if (File::exists($dbPath)) {
                File::copy($dbPath, $oldBackup);
            }

            // Move the new file
            File::copy($file->getRealPath(), $dbPath);

            return response()->json(['success' => 'Database restored successfully. Application will now reload.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to restore database: ' . $e->getMessage()], 500);
        }
    }
}
