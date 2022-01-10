<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'member_email', 
        'member_phone', 
        'admin_email', 
        'first_name', 
        'last_name', 
        'subscription_name', 
        'plan_name'
    ];

    public function getAdminNameAttribute(){
        return $this->first_name." ".$this->last_name;
    }
}
