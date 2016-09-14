<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
            'title' => 'required',
            'desc' => 'required',
          	'author' => 'required',
            'from' => 'required',
            'content' => 'required',
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
            'title' => trans('labels.article.title'),
            'desc' => trans('labels.article.desc'),
            'author' => trans('labels.article.author'),
            'from' => trans('labels.article.from'),
            'content' => trans('labels.article.content'),
            'status' => trans('labels.article.status'),
        ];
    }
}


