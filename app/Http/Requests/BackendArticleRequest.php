<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendArticleRequest extends FormRequest
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
            'a_name'        => 'required|unique:articles,a_name,' . $this->id,
            'a_menu_id'     => 'required',
            'a_description' => 'required',
            'a_content'     => 'required',
        ];
    }

    public function messages() {
        return [
            'a_name.required'        => 'This field is require. Please fill it.',
            'a_name.unique'        => 'This data has been exist. Please choose another one.',
            'a_menu_id'     => 'required',
            'a_description' => 'required',
            'a_content'     => 'required',
        ];
    }
}
