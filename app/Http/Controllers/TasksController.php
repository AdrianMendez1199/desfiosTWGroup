<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
use App\Models\User;

class TasksController extends Controller
{

    public function create() {
        $users = User::all();
        $tasks = Task::with(['user:name,id', 'createdBy:name,id'])->get();
        return view('task.task', ['users' => $users, 'tasks' => $tasks]);
    }

    public function createTask(Request $request) {

        $validator = Validator::make($request->all(), [
            'description'     => 'required|max:60',
            'user_id'         => 'required',
            'expiration_date' => 'required|date'
        ]);
 
        if ($validator->fails()) {
            return redirect('/home')
                  ->withErrors($validator)
                  ->withInput();
         }

       $hour = now()->format('H:i:s');
       
       $request->merge([
           'created_by' => Auth()->user()->id,
           'expiration_date' => "{$request->expiration_date} {$hour}"
        ]);

       Task::create($request->all());
       return back()->with('success','Tarea creada satisfactoriamente.');
    }


}
