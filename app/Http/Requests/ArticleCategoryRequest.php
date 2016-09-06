<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleCategoryRequest extends Request
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
            'status' =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => trans('validation.required'),
        ];
    }

    public function attributes()
    {
        return [
            'name' => trans('labels.article_category.name'),
            'status' => trans('labels.article_category.status'),
        ];
    }
}


