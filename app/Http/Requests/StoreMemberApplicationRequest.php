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
            'admin_email'=> ['required', 'email', 'unique:users,email', 'unique:member_applications,admin_email'],
            'first_name'=> ['required', 'string'],
            'last_name'=> ['required', 'string'],
            'subscription_name'=> ['required', 'string'],
            'plan_name'=> ['required', 'string']
        ];
    }

    public function toArray()
    {
        return [
            'name'=> request('name'),
            'member_email'=> request('member_email'),
            'member_phone'=> request('member_phone'),
            'admin_email'=> request('admin_email'),
            'first_name'=> request('first_name'),
            'last_name'=> request('last_name'),
            'subscription_name'=> request('subscription_name'),
            'plan_name'=> request('plan_name'),
        ];
    }

    public function store(){
        $application = MemberApplication::create($this->toArray());
        // BussinessApplicationCreatedEvent::dispatch($application);
        return $application;
    }
}
