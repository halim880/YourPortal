<?php

namespace App\Models;

use App\Helpers\PlanType;
use App\Helpers\SubscriptionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'name',
        'duration',
    ];

    public $timestamps = false; 
}
