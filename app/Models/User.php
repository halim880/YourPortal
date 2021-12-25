<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    const IMAGE_PATH = 'images/users/';

    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function members(){
        return $this->belongsToMany(Member::class, 'member_user', 'user_id', 'member_id');
    }

    public function member(){
        return $this->members()->first();
    }

    public function client(){
        return $this->hasOne(Client::class);
    }

    public function isSuperAdmin(){
        return $this->hasRole('super_admin');
    }
    public function isAdmin(){
        return $this->hasRole('admin');
    }
    public function isUser(){
        return $this->hasRole('user');
    }
    public function isClient(){
        return $this->hasRole('client');
    }

    public function getClientIdAttribute(){
        return $this->client->id;
    }
}
