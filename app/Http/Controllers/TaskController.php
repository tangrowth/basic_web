<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\Taskrequest;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('index', ['tasks' => $tasks]);
    }

    public function post(TaskRequest $request){
        $form = $request->all();
        Task::create($form);
        return redirect ('/');
    }

    public function edit(TaskRequest $request){
        $form = $request->all();
        unset($form['_token']);
        Task::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        Task::find($request->id)->delete();
        return redirect('/');
    }
}
