<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $task = Auth::user()->tasks()->paginate(5);

        $total = count($task->all());
        $pending = count($task->where('status', 'pending'));

        $inprogress = count($task->where('status', 'inprogress'));
        $completed = count($task->where('status', 'completed'));

        return view('dashboard', compact('task', 'total', 'pending', 'inprogress', 'completed'));
    }
}
