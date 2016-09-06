<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleCategoryRepository;
use App\Http\Requests\ArticleCategoryRequest;
use Flash;
class ArticleCategoryController extends Controller {

    protected $category_repository;
    public function __construct(ArticleCategoryRepository $category_repository)
    {
        $this->category_repository = $category_repository;
    }

    public function index()
    {
        if(request()->ajax()) {
            $data =  $this->category_repository->cateGoryDataTable();
            return response()->json($data);
        }
        return view("admin.article_category.list");
    }

    public function create()
    {
        $category_list = $this->category_repository->getAll();
        return view("admin.article_category.create",compact('category_list'));
    }


    public function store(ArticleCategoryRequest $request)
    {
        $data = $request->all();
        $res = $this->category_repository->store($data);
        if($res) {
            Flash::success(trans('alerts.article_category.created_success'));
        } else {
            Flash::error(trans('alerts.serviceBusy'));
        }
        return redirect(url("/admin/ae_category/create"));
    }    

    public function edit($id)
    {
        return view("admin.article_category.edit");
    }

    public function update(ArticleCategoryRequest $request)
    {
        
    }

    public function destroy($id)
    {
        
    }



}