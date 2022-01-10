<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Double;

class Package extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'name',
        'renewal',
        'day_limit',
        'price',
        'admin_limit',
        'user_limit'
    ];

    /******************** Getters *******************/
    public function getName() :  string {
        return $this->name;
    }

    public function getRenwal() : string {
        return $this->renewal;
    }

    public function getDayLimit() : int {
        return (int) $this->day_limit;
    }

    public function getPrice() : int {
        return (int) $this->price;
    }

    public function getAdminLimit() : int {
        return (int) $this->admin_limit;
    }

    public function getUserLimit() : int {
        return (int) $this->user_limit;
    }

}
