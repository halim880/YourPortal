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
        'admin_limit',
        'user_limit'
    ];

    /******************** Getters *******************/
    public function getName() :  string {
        return $this->name;
    }

    public function getAdminLimit() : int {
        return (int) $this->admin_limit;
    }

    public function getUserLimit() : int {
        return (int) $this->user_limit;
    }

}
