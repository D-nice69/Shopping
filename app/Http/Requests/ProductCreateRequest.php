<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name' => "bail|required|unique:products,name,NULL,id,deleted_at,NULL|max:255",
            'price' => 'required',
            'category_id' => 'required',
            'contents' => 'required',
            // 'feature_image_path' => 'image'
        ];
    }
    public function messages()
    {
        return [
            'name.unique' => 'The name must be unique',
            'name.max' => 'The name cant be longer than 250 chars',
            'category_id.required' => 'Category must be required',
            'name.required' => 'A name must be required',
            'price.required' => 'A price must be required',
            'contents.required' => 'A content must be required',
        ];
    }
}
