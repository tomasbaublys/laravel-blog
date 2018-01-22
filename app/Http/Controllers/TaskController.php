<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
    	$tasks = Task::all();
    	return view('tasks.index', compact('tasks'));
    }

    // route and model binding (Task $task) = Task::find(wildcard);
    public function show(Task $task) 
    {
    	return view('tasks.show', compact('task'));
    }
}

