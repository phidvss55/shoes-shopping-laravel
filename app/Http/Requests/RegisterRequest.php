<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email'    => 'required|unique:users,email,' . $this->id,
            'name'     => 'required',
            'password' => 'required',
            'phone'    => 'required|numeric|unique:users,phone,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'This field is required. Please fill it.',
            'email.unique'      => 'This value already exist. Please choose another one.',
            'name.required'     => 'This field is required. Please fill it.',
            'password.required' => 'This field is required. Please fill it.',
            'phone.required'    => 'This field is required. Please fill it.',
            'phone.unique'      => 'This value already exist. Please choose another one.',
            'phone.numeric'     => 'This field require value is number. Please check again.',
        ];
    }
}
