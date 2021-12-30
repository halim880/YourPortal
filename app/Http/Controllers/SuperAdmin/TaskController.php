<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Exceptions\TaskAlreadySuggested;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function taskList(){
        return view('system_admin.task.task_list')->with([
            'tasks'=> Task::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function taskSuggest(){
        return view('system_admin.task.suggest')->with([
            'task_id'=> request('task_id'),
            'members'=> Member::orderBy('name', 'asc')->get(),
        ]);
    }

    public function taskSuggetionSend(Request $request){
        try {
            Task::suggest($request->task_id, $request->member_id);
            Session::flash('message', 'Task is suggested');
        } catch (TaskAlreadySuggested $e) {
            Session::flash('message', 'Task already suggested to this Member');
            return redirect()->back();
        }
        return redirect()->route('system_admin.task.list');
    }
}
