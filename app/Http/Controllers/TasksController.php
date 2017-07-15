<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task; // call task model

class TasksController extends Controller
{
    //
    public function index()
    {
        //
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task) // Task::find(wildcard);
    {
        /*$task = Task::find($id);*/


        return view('tasks.show', compact('task'));
    }
}
