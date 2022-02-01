<?php

namespace App\Models\Member;

use App\Models\Package;
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
        'package_id', 
        'plan_id'
    ];

    public function getAdminNameAttribute(){
        return $this->first_name." ".$this->last_name;
    }

    public function package(){
        return $this->belongsTo(Package::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function getPackageName() : string {
        return $this->package->name;
    }

    public function getPlanName() : string {
        return $this->plan->name;
    }
}
