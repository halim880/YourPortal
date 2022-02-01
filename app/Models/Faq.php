<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question', 'answer', 'priority'
    ];

    public function getPriority() : string {
        $priority = "";
        if ($this->priority=="1") {
            $priority = "High";
        }
        else if ($this->priority=="2") {
            $priority = "Medium";
        }
        else {
            $priority = "Low";
        }

        return $priority;
    }
}
