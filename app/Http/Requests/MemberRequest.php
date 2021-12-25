<?php

namespace App\Http\Requests;

use App\Events\UserCreatedEvent;
use App\Models\Member;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class MemberRequest extends FormRequest
{
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
            'member_email'=> ['required', 'email'],
            'member_phone'=> ['required'],
            'member_logo'=> ['nullable'],
            'admin_name'=> ['required', 'string'],
            'admin_email'=> ['required', 'email', 'unique:users,email', 'unique:member_applications,admin_email'],
            'password'=> ['required', 'confirmed'],
        ];
    }

    public function store(){
        DB::transaction(function (){
            $user = User::create($this->toUserArray());
            Member::create($this->toMemberArray());
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

    private function toMemberArray(){
        return [
            'name'=> request('name'),
            'member_email'=> request('member_email'),
            'member_phone'=> request('member_phone'),
        ];
    }
}
