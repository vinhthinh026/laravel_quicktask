<?php

namespace App\Http\Controllers\Tasks;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function __construct(Task $objmTasks)
    {

        $this->objmTasks = $objmTasks;

    }

    public function getTasks()
    {
        $idUser = Auth::user()->id;
        $objItems = $this->objmTasks->join('users', 'users.id', '=', 'tasks.user_id')
            ->select('tasks.*')
            ->where('user_id', $idUser)
            ->get();

        return view('tasks.index', compact('objItemTasks', 'objItems'));
    }

    public function postTasks(Request $request)
    {
        $idUser = Auth::user()->id;
        $task = new Task();
        $nameTasks = $request->tasks;
        $task->name = $nameTasks;
        $task->user_id = $idUser;
        $resultAdd = $task->save();

        if($resultAdd){
            return redirect()->route('tasks.index')->with('msg', trans('lable.Successful_add'));
        }
        else
        {
            return redirect()->route('tasks.index')->with('msg', trans('lable.Error'));
        }
    }

    public function deleteTasks($id)
    {
        $delete = $this->objmTasks->where('id', $id)->delete();
        if($delete){
            return redirect()->route('tasks.index')->with('msg', trans('lable.Successful_delete'));
        }
        else{
            return redirect()->route('tasks.index')->with('msg', trans('lable.Error'));
        }

    }
}
