<?php

namespace App\Http\Controllers;

use App\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $task = Task::paginate(5);

        $total = count(Task::all());
        $pending = count(Task::where('status', 'pending')->get());

        $inprogress = count(Task::where('status', 'inprogress')->get());
        $completed = count(Task::where('status', 'completed')->get());

        return view('dashboard', compact('task', 'total', 'pending', 'inprogress', 'completed'));
    }
}
