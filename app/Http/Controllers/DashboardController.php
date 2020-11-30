<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $total = Auth::user()->tasks;
        $task = Auth::user()->tasks()->paginate(5);

        $pending = count($total->where('status', 'pending'));
        $inprogress = count($total->where('status', 'inprogress'));
        $completed = count($total->where('status', 'completed'));

        return view('dashboard', compact('task', 'total', 'pending', 'inprogress', 'completed'));
    }
}
