<?php

namespace App\Models;

use App\Exceptions\TaskAlreadySuggested;
use Doctrine\DBAL\Query\QueryException;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'description', 
        'user_id', 
        'client_id'
    ];

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

    public static function suggest(int $task_id, int $member_id):bool{
        try {
            DB::table('task_assigns')->insert([
                'task_id'=> $task_id,
                'member_id'=> $member_id,
            ]);
        } catch (Exception $th) {
            throw new TaskAlreadySuggested("Task already suggested to this Member", 1);
            return false;
        }
        return true;
    }

    public static function suggestedForMember(int $member_id){
        return self::getAssignedTasks($member_id);
    }

    public static function assign(int $task_id, int $member_id, int $user_id) :bool{
        try {
            DB::table('task_assigns')
                ->where('task_id', $task_id)
                ->where('member_id', $member_id)
                ->update(['assigned_user_id'=> $user_id]);
            return true;

        } catch (\Throwable $th) {
            //throw $th;
        }
        return false;
    }

    public static function assignedForUser(User $user, int $member_id){
        return self::getAssignedTasks($member_id, $user->id);
    }

    private static function getAssignedTasks(int $member_id, int $user_id = null){
        return DB::table('task_assigns')
            ->join('tasks', 'tasks.id', 'task_assigns.task_id')
            ->select(['tasks.id','tasks.title', 'tasks.description'])
            ->where('task_assigns.member_id', $member_id)
            ->where('assigned_user_id', $user_id)
            ->get();
    }
}
