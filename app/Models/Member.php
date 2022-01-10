<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';

    protected $fillable = [
        'name',
        'member_email',
        'member_phone',
        'member_logo',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function subscription(){
        return $this->hasOne(Subscription::class);
    }

    public function getCurrentPackageName() : string {
        return $this->subscription->package->name;
    }
}
