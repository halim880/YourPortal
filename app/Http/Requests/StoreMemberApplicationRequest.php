<?php

namespace App\Http\Requests;

use App\Events\Bussiness\BussinessApplicationCreatedEvent;
use App\Models\Member\MemberApplication;
use Illuminate\Foundation\Http\FormRequest;

class StoreMemberApplicationRequest extends FormRequest
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
            'member_email'=> ['required', 'email'],
            'member_phone'=> ['required'],
            'member_logo'=> ['nullable'],
            'admin_name'=> ['required', 'string'],
            'admin_email'=> ['required', 'email', 'unique:users,email', 'unique:member_applications,admin_email'],
        ];
    }

    public function toArray()
    {
        return [
            'name'=> request('name'),
            'member_email'=> request('member_email'),
            'member_phone'=> request('member_phone'),
            'admin_name'=> request('admin_name'),
            'admin_email'=> request('admin_email'),
        ];
    }

    public function store(){
        $application = MemberApplication::create($this->toArray());
        // BussinessApplicationCreatedEvent::dispatch($application);
        return $application;
    }
}
