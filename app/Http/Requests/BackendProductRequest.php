<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendProductRequest extends FormRequest
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
            'pro_name'        => 'required|unique:products,pro_name,' . $this->id,
            'pro_price'       => 'required',
            'pro_category_id' => 'required',
            'pro_number'      => 'required',
            'pro_description' => 'required',
        ];
    }

    public function message()
    {
        return [
            'pro_name.required'        => 'This field is require. Please fill it.',
            'pro_name.unique'          => 'This data has been exist. Please choose another one.',
            'pro_price.required'       => 'This field is require. Please fill it.',
            'pro_category_id.required' => 'This field is require. Please fill it.',
            'pro_number.required'      => 'This field is require. Please fill it.',
            'pro_description.required' => 'This field is require. Please fill it.',
        ];
    }
}
