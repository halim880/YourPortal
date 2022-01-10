<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'type', 
        'text',
        'sender_id',
        'chat_room_id',
        'file'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function getSenderName(){
        return $this->user->name;
    }

    public function getSendingTime(){
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function isSender(User $user) : bool {
        return $this->sender_id == $user->id;
    }
}
