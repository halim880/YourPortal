<?php

namespace App\Http\Requests;

use App\Events\UserCreatedEvent;
use App\Helpers\UserRole;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class InivitedUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'member_id'=>['required'],
            'name'=> ['required', 'string'],
            'email'=> ['email', 'unique:users'],
            'password'=> ['required']
        ];
    }

    public function storeUser(){
        try {
            $user = User::create($this->toArray());
            $user->assignRole(UserRole::MEMBER_USER);
            $user->members()->attach($this->member_id);
            // UserCreatedEvent::dispatch($user);
            
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    public function toArray()
    {
        return [
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=> bcrypt($this->password),
        ];
    }
}
