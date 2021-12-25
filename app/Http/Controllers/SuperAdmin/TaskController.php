<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function taskList(){
        return view('super_admin.task.task_list')->with([
            'tasks'=> Task::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function taskSuggest(){
        return view('super_admin.task.suggest')->with([
            'task_id'=> request('task_id'),
            'members'=> Member::orderBy('name', 'asc')->get(),
        ]);
    }

    public function taskSuggetionSend(Request $request){
        try {
            DB::table('task_assigns')->insert([
                'task_id'=> $request->task_id,
                'member_id'=> $request->member_id,
            ]);
        } catch (\Exception $th) {
            Session::flash('message', 'Task already suggested to this Member');
            return redirect()->back();
        }

        return redirect()->route('super_admin.task.list');
    }
}
