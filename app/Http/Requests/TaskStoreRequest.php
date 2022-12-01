<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
            'title' => 'required|unique:tasks,title,'.$this->id.'min:3',
            'subject' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute required field',
            'title.uniques' => ':attribute already exists'
        ];
    }
}
