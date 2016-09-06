<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request
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
            'id' => 'numeric',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->id,
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'numeric' => trans('validation.numeric'),
            'required' => trans('validation.required'),
            'unique' => trans('validation.unique'),
            'email' => trans('validation.email'),
        ];
    }

    public function attributes()
    {
        return [
            'id' => trans('labels.id'),
            'name' => trans('labels.user.name'),
            'email' => trans('labels.user.email'),
            'status' => trans('labels.user.status'),
        ];
    }
}
