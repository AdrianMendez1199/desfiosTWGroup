<?php

namespace App\Http\Controllers;

use Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Log;
use App\Models\Task;
use App\Notifications\LogNotification;

class LogController extends Controller
{
    public function create(Request $request) {

         $validator = Validator::make($request->all(), [
            'comment'  => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return back()
                  ->withErrors($validator)
                  ->withInput();
         }

        $request->merge([
            'task_id' => $request->session()->get('task_id')
        ]);

        $user = Task::find($request->task_id)->createdBy;
        $user->notify(new LogNotification($user));

        Log::create($request->all());

        return back()
             ->with('success', 'Log creado satisfactoriamente');
    }

    public function getLogs(Request $request, int $taskId) {
        $logs = Task::find($taskId)->logs;
        $request->session()->put('task_id', $taskId);
        return view('task.detail', ['logs' => $logs]);
    }
}
