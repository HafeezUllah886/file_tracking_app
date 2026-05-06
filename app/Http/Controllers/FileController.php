<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\FileStatusHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FileController extends Controller
{
    public function index(Request $request)
    {
        $start  = $request->start  ?? Carbon::now()->startOfMonth()->format('Y-m-d');
        $end    = $request->end    ?? Carbon::now()->endOfMonth()->format('Y-m-d');
        $status = $request->status ?? '';
        $unit   = $request->unit   ?? '';
        $wing   = $request->wing   ?? '';
        $search = $request->search ?? '';

        // Collect file_ids that have a status history entry within the date range
        $fileIdsInRange = FileStatusHistory::whereBetween('date', [$start, $end])
            ->pluck('file_id')
            ->unique();

        $query = File::with('statusHistories')
            ->whereIn('id', $fileIdsInRange);

        if ($status) {
            $query->where('status', $status);
        }
        if ($unit) {
            $query->where('unit', $unit);
        }
        if ($wing) {
            $query->where('wing', $wing);
        }
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('file_no', 'like', "%{$search}%")
                  ->orWhere('patient_name', 'like', "%{$search}%")
                  ->orWhere('reg_no', 'like', "%{$search}%");
            });
        }

        $files = $query->latest()->paginate(15)->withQueryString();

        $units = File::distinct()->orderBy('unit')->pluck('unit');
        $wings = File::distinct()->orderBy('wing')->pluck('wing');

        return view('files', compact('files', 'start', 'end', 'status', 'unit', 'wing', 'search', 'units', 'wings'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'reg_no' => 'required|string',
            'patient_name' => 'required|string',
            'unit' => 'required|string',
            'wing' => 'required|string',
            'date' => 'required|date',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $file = File::create([
            'reg_no'       => $validated['reg_no'],
            'patient_name' => $validated['patient_name'],
            'unit'         => $validated['unit'],
            'wing'         => $validated['wing'],
            'status'       => $validated['status'],
        ]);

        $file->statusHistories()->create([
            'status'  => $validated['status'],
            'date'    => $validated['date'],
            'notes'   => $validated['notes'] ?? null,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'File created successfully.');
    }

    public function show(File $file)
    {
        $file->load('statusHistories.user', 'category');
        return view('files.show', compact('file'));
    }

   
    public function update(Request $request, File $file)
    {
        $validated = $request->validate([
            'reg_no' => 'required|string',
            'patient_name' => 'required|string',
            'unit' => 'required|string',
            'wing' => 'required|string',
        ]);

        $file->update([
            'reg_no'       => $validated['reg_no'],
            'patient_name' => $validated['patient_name'],
            'unit'         => $validated['unit'],
            'wing'         => $validated['wing'],
        ]);


        return redirect()->back()->with('success', 'File updated successfully.');
    }

    public function confirmDelete(File $file)
    {
        return view('confirmation', compact('file'));
    }

    public function destroy(Request $request, File $file)
    {
        $request->validate([
            'password' => 'required',
        ]);

        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect password. File could not be deleted.');
        }

        $file->statusHistories()->delete(); 
        $file->delete();

        return redirect()->route('dashboard')->with('success', 'File deleted successfully.');
    }

    public function tracking($id)
    {
        $file = File::with('statusHistories.user')->findOrFail($id);

        return view('tracking', compact('file'));
    }

    public function status(Request $request)
    {
        $file = File::find($request->status_id);
        $file->statusHistories()->create([
            'status'  => $request->status,
            'date'    => $request->date,
            'notes'   => $request->notes,
            'user_id' => Auth::id(),
        ]);

        $file->status = $request->status;
        $file->save();

         return redirect()->back()->with('success', 'Status Updated');
    }
}
