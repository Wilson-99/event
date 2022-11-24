<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
            'photo' => 'file|image',
            'title' => 'required|unique:events,title,'.$this->id.'min:3',
            'description' => 'required',
            'city' => 'required',
            'date' => 'required',
            'time' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'photo.image' => 'The file must be an image (jpeg, png, svg, jpg, jfif or webp)',
            'required' => ':attribute required field',
            'title.unique' => 'This name already exists',
            'title.min' => ':attribute must contain at least 3 character',
        ];

    }
}
