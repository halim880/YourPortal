<?php

namespace App\Http\Requests;

use App\Events\Bussiness\BussinessApplicationCreatedEvent;
use App\Models\Bussiness\BussinessApplication;
use Illuminate\Foundation\Http\FormRequest;

class StoreBussinessApplicationRequest extends FormRequest
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
            //
        ];
    }

    public function toArray()
    {
        return [
            'name'=> request('name'),
            'bussiness_email'=> request('bussiness_email'),
            'bussiness_phone'=> request('bussiness_phone'),
            'admin_name'=> request('admin_name'),
            'admin_email'=> request('admin_email'),
        ];
    }

    public function store(){
        $application = BussinessApplication::create($this->toArray());
        BussinessApplicationCreatedEvent::dispatch($application);
        return $application;
    }
}
