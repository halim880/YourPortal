<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bussiness extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bussiness_email',
        'bussiness_phone',
        'bussiness_logo',
    ];
}
