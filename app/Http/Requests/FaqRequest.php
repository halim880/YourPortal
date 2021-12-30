<?php

namespace App\Http\Requests;

use App\Models\Faq;
use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'question'=> ['required', 'string'],
            'answer'=> ['required', 'string'],
            'priority'=> ['nullable', 'numeric']
        ];
    }

    public function store(){
        Faq::create($this->toArray());
    }

    public function toArray()
    {
        return [
            'question'=> request('question'),
            'answer'=> request('answer'),
            'priority'=> request('priority'),
        ];
    }
}
