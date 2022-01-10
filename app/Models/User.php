<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Helpers\UserRole;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'u_role'
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




    // Roles
    public function assignRole(int $role){
        $this->u_role=$role;
        $this->save();
        return $this;
    }

    public function hasRole(int $role) : bool{
        return $this->u_role == $role;
    }

    public function isSystemAdmin() : bool{
        return $this->hasRole(UserRole::SYSTEM_ADMIN);
    }
    public function isSuperAdmin() : bool{
        return $this->hasRole(UserRole::MEMBER_SUPER_ADMIN);
    }
    public function isAdmin() : bool{
        return $this->hasRole(UserRole::MEMBER_ADMIN);
    }
    public function isUser() : bool{
        return $this->hasRole(UserRole::MEMBER_USER);
    }
    public function isClient() : bool{
        return $this->hasRole(UserRole::CLIENT);
    }
    public function getClientIdAttribute() : int {
        return $this->client->id;
    }

    public function getRoleAttribute() : string{
        return UserRole::getName($this->u_role);
    }
}
