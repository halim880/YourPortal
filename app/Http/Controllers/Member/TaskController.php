<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function suggested(){
        $tasks = DB::table('task_assigns')
                ->join('tasks', 'task_assigns.task_id', 'tasks.id')
                ->where('member_id', request('member_id'))
                ->where('assigned_user_id', null)
                ->select()
                ->get();
        dd($tasks);
    }
}
