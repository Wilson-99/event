<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'email|unique:users',
            'phone' => 'numeric',
            'city'  => 'required',
            'password' => 'required',
            'user_type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => ':attribute already exits',
            'email.email' => ':attribute must be a valid email',
            'required' => ':attribute required field',
            'city.string' => ':attribute must be a text',
            'phone' => ':attribute must be numeric',
        ];
    }
}
