<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
        if ($this->method() == 'POST') {

            return [
                'name' => 'required|unique:products,name',
                'category_id' => 'required',
                'subcategory_id' => 'required',
            ];

        }else{
            return 'something is wrong';

        }
    }


    public function messages()
    {
        return [
            'name.required' => 'This field is required',
            'name.unique' => 'This name is already exists',
            'category_id.required' => 'Please select a category',
            'subcategory_id.required' => 'Please select a sub-category',
        ];
    }


}
