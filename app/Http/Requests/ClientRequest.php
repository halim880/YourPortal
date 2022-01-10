<?php

namespace App\Http\Requests;

use App\Events\UserCreatedEvent;
use App\Helpers\UserRole;
use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name'=> ['required', 'string', 'max:250'],
            'email'=> ['required', 'email', 'unique:users'],
            'phone'=> ['required'],
            'TIN'=> ['nullable'],
            'password'=> ['required'],
        ];
    }
    public function storeClient(){
        $user = User::create([
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=> bcrypt($this->password)
        ]);

        Client::create([
            'user_id'=> $user->id,
            'TIN'=> $this->TIN,
            'phone'=> $this->phone
        ]);
        UserCreatedEvent::dispatch($user);
        $user->assignRole(UserRole::CLIENT);
    }
}
