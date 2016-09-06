<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class postAdminInfoRequest extends Request
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
            'email' => 'required|email',
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
            'email' => trans('validation.email'),


        ];
    }

    public function attributes()
    {
        return [

            'name' => trans('validation.attributes.name'),
            'email' => trans('validation.attributes.email'),
        ];
    }
}
