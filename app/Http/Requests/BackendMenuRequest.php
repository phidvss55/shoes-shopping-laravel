<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendMenuRequest extends FormRequest
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
            'mn_name' => 'required|unique:menus,mn_name,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'mn_name.required' => 'This field is require. Please fill it.',
            'mn_name.unique'   => 'This data has been exist. Please choose another one.',
        ];
    }
}
