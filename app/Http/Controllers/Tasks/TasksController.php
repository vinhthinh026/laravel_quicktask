<?php

namespace App\Http\Controllers\Tasks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    public function __construct()
    {

    }

    public function getTasks()
    {
        return view('tasks.index');
    }

    public function postTasks(Request $request)
    {
        return view('tasks.index');
    }

    public function deleteTasks()
    {

    }
}
