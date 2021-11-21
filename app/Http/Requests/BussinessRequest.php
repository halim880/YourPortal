<?php

namespace App\Http\Requests;

use App\Events\UserCreatedEvent;
use App\Models\Bussiness;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class BussinessRequest extends FormRequest
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
            // 'bussiness_email'=> ['required', 'email'],
            // 'bussiness_phone'=> ['required', 'numeric'],
            // 'bussiness_logo'=> ['nullable', 'image'],
            // 'admin_name'=> ['required', 'string'],
            // 'admin_email'=> ['required', 'email'],
            // 'password'=> ['required', 'confirmed'],
        ];
    }

    public function store(){
        DB::transaction(function (){
            $user = User::create($this->toUserArray());
            Bussiness::create($this->toBussinessArray());
            UserCreatedEvent::dispatch($user);
        });
    }

    private function toUserArray(){
        return [
            'name'=> request('admin_name'),
            'email'=> request('admin_email'),
            'password'=> bcrypt(request('password')),
        ];
    }

    private function toBussinessArray(){
        return [
            'name'=> request('name'),
            'bussiness_email'=> request('bussiness_email'),
            'bussiness_phone'=> request('bussiness_phone'),
        ];
    }
}
