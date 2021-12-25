<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'user_id', 'client_id'];

    public function isAssigned(){
        if ($this->getAssignedUserId()==null) {
            return false;
        }
        return true;
    }

    private function getAssignedUserId(){
        $r = DB::table('tasks')
            ->join('task_assigns', 'tasks.id', '=', 'task_assigns.task_id')
            ->select('assigned_user_id')
            ->where('assigned_user_id', '!=', null)
            ->get()->first();
    }
}
