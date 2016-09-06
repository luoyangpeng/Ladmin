<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ResetPasswordRequest extends Request
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
            'id' => 'required|numeric',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'numeric' => trans('validation.numeric'),
            'min' => trans('validation.min.string'),
            'max' => trans('validation.max.string'),
            'confirmed' => trans('validation.confirmed'),
        ];
    }

    public function attributes()
    {
        return [
            'id' => trans('labels.id'),
            'password' => trans('validation.attributes.password'),
            'password_confirmation' => trans('validation.attributes.password_confirmation'),
        ];
    }
}
