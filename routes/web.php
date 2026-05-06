<?php

use App\Http\Controllers\BackupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SearchController;
use App\Models\File;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/settings/password', [SettingsController::class, 'updatePassword'])->name('settings.password');
    Route::get('file/tracking/{id}', [FileController::class, 'tracking'])->name('file.tracking');
    Route::post('file/status', [FileController::class, 'status'])->name('file.status');
    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('files/{file}/confirm-delete', [FileController::class, 'confirmDelete'])->name('files.confirm-delete');
    Route::resource('files', FileController::class);

    // Backup Routes
    Route::get('/backups/download', [BackupController::class, 'downloadCurrent'])->name('backups.download');
    Route::post('/backups/restore', [BackupController::class, 'restore'])->name('backups.restore');

    Route::get('files/checkExist/{reg_no}', function ($reg_no) {
        $file = File::where('reg_no', $reg_no)->first();
        if ($file) {
            return response()->json(['exists' => true, 'message' => $file->statusHistories->last()->status . " | " . date('d M Y', strtotime($file->statusHistories->last()->date))]);
        } else {
            return response()->json(['exists' => false, 'message' => 'Patient Number Not Found']);
        }
    })->name('files.checkExist');

});
