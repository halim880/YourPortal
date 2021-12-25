<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->isClient();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=> ['required', 'string'],
            'description'=> ['nullable', 'string'],
        ];
    }

    public function store(){
        Task::create($this->toArray());
    }

    public function toArray()
    {
        return [
            'title'=> $this->title,
            'description'=>$this->description,
            'client_id'=> Auth::user()->client_id,
        ];
    }
}
