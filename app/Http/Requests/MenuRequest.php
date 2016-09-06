<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MenuRequest extends Request
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
            'name' => 'required',
            'pid' => 'required|numeric',
            'language' => 'required',
            'slug' => 'required',
            'url' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'numeric' => trans('validation.numeric'),
            'required' => trans('validation.required'),
        ];
    }

    public function attributes()
    {
        return [
            'name' => trans('labels.menu.name'),
            'pid' => trans('labels.menu.pid'),
            'language' => trans('labels.menu.language'),
            'slug' => trans('labels.menu.slug'),
            'url' => trans('labels.menu.url'),
            'status' => trans('labels.menu.status'),
        ];
    }
}
