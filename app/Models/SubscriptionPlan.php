<?php

namespace App\Models;

use App\Helpers\PlanType;
use App\Helpers\SubscriptionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;

    public function getNameAttribute(){
        PlanType::getName($this->type);
    }

    public function getSubscriptionTypeAttribute(){
        return SubscriptionType::getName($this->sub_type);
    }
}
