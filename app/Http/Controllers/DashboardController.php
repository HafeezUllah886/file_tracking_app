<?php

namespace App\Http\Controllers;

use App\Models\expenses;
use App\Models\File;
use App\Models\NonBusinessExpenses;
use App\Models\purchase;
use App\Models\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $total_files = File::count();
        $pending_files = File::where('status', 'Pending')->count();
        $typed_files = File::where('status', 'Typed')->count();
        $received_back_files = File::where('status', 'Received Back')->count();
        $specialist_files = File::where('status', 'Specialist')->count();
        $member_i = File::where('status', 'Member I')->count();
        $member_ii = File::where('status', 'Member II')->count();
        $member_iii = File::where('status', 'Member III')->count();
        $commandant_files = File::where('status', 'Commandant')->count();
        $dispatched_files = File::where('status', 'Dispatched')->count();
        $issue_files = File::where('status', 'With Issue')->count();
        
        return view('dashboard', compact('total_files', 'pending_files', 'typed_files', 'received_back_files', 'specialist_files', 'member_i', 'member_ii', 'member_iii', 'commandant_files', 'dispatched_files', 'issue_files'));
    }
}
