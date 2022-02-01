<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'details', 'priority'
    ];

    public function getPriority() : string {
        $priority = "";
        if ($this->priority==1) {
            $priority = "High";
        }
        else if ($this->priority==2) {
            $priority = "Medium";
        }
        else {
            $priority = "Low";
        }

        return $priority;
    }
}
