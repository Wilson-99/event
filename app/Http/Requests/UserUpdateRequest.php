<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'photo' => 'mimes:jpeg,jpg,png,PNG,JPG',
            'email' => 'email|unique:users,email'.$this->id,
            'phone' => 'numeric|between:min:9,max:15',
            'city'  => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'photo.mimes' => ':attribute must be a file type:(jpeg,jpg,png,PNG,JPG)',
            'email.unique' => ':attribute already exits',
            'email.email' => ':attribute must be a valid email',
            'required' => ':attribute required field',
            'city.string' => ':attribute must be a text',
            'phone' => ':attribute must be numeric',
        ];
    }
}
