<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pricing extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'package_id', 'plan_id', 'currency_id', 'price'
    ];

    public function package(){
        return $this->belongsTo(Package::class);
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function getPackageName() : string{
        return strtoupper($this->package->name);
    }

    public function getPlanName() : string{
        return strtoupper($this->plan->name);
    }

    public function getCurrencyName() : string{
        return strtoupper($this->currency->name);
    }
}
