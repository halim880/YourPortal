<?php

namespace App\Models\Bussiness;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussinessApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'bussiness_email', 'bussiness_phone', 'admin_email', 'admin_name'
    ];
}
