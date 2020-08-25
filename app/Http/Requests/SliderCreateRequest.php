<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class SliderCreateRequest extends FormRequest
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
            'name' => "bail|required|unique:sliders,name,NULL,id,deleted_at,NULL|max:255",
            'description' => 'required|unique:sliders,description,NULL,id,deleted_at,NULL',
            'image_path' =>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'name.max' => 'The name cant be longer than 250 chars',
            'description.min' => 'The description must have more than 20 chars',
            'description.required' => 'A description is required',
            'image_path.required' => 'An image is required',
        ];
    }
}
