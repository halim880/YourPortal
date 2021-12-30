<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function suggested(){
        $tasks = Task::suggestedForMember(request('member_id'));
        
        return view('member.task.suggested')->with([
            'tasks'=> $tasks,
        ]);
    }

    public function assign(){
        Task::assign(request('task_id'), request('member_id'), request('user_id'));
        Session::flash('message', "Task is Assigned");
        return redirect()->back();
    }

    public function assignedTasks(){
        $user = Auth::user();
        $member_id = $user->member()->id;

        return view('member.user.task.assigned')->with([
            'tasks'=> Task::assignedForUser($user, $member_id),
        ]);
    }

    public function taskAssignForm(int $task_id){
        return view('member.task.assign_form')->with([
            'task_id'=> $task_id,
            'users'=> Auth::user()->member()->users,
        ]);
    }
}
