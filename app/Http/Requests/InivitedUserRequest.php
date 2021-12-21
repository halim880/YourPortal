<?php

namespace App\Http\Requests;

use App\Events\UserCreatedEvent;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

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
            'name'=> ['required', 'string'],
            'email'=> ['email', 'unique:users'],
            'password'=> ['required']
        ];
    }

    public function storeUser(){
        try {
            $user = User::create($this->toArray());
            $user->assignRole('user');
            $user->bussinesses()->attach($this->bussiness_id);
            UserCreatedEvent::dispatch($user);
            
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
