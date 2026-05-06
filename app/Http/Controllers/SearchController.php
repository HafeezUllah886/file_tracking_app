<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('query');
        $files = collect();

        if ($query) {
            $files = File::where('file_no', 'LIKE', "%{$query}%")
                ->orWhere('patient_name', 'LIKE', "%{$query}%")
                ->orWhere('reg_no', 'LIKE', "%{$query}%")
                ->latest()
                ->paginate();
        }

        return view('search', compact('files', 'query'));
    }
}
