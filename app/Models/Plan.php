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
        'name', 
        'type', /*subscription type, e.g Silver, Golden */
        'days',
        'price'
    ];

    /* returns the Plan type, e.g Monthly, Yearly */
    public function getPlanNameAttribute() : string{
        return $this->name;
    }

    /* returns the subscription type, e.g Silver, Golden */
    public function getSubscriptionTypeAttribute() : string {
        return $this->type;
    }
}
