<?php
/**
* 文章控制器
* @author :luoyangpeng1122@163.com
*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;
use App\Http\Requests\ArticleRequest;
use Flash;

class ArticleController extends Controller {


    public function index( ArticleRepository $repository)
    {
        if(request()->ajax()) {
            $data = $repository->ajaxIndex();
            return response()->json($data);
        }

        return view('admin.article.list');
    }

    public function create(ArticleCategoryRepository $categoryRepository)
    {
        $category_list = $categoryRepository->getAll();
       return view("admin.article.create",compact("category_list"));
    }

    public function show($id ,ArticleRepository $articleRep){

        $article = $articleRep->getArticleById($id);

        return view("admin.article.show",compact("article"));
    }

    public function edit($id , ArticleRepository $articleRep,ArticleCategoryRepository $categoryRepository)
    {
        $article = $articleRep->getArticleById($id);
        $category_list = $categoryRepository->getAll();

        return view("admin.article.edit",compact('article','category_list'));
    }

    public function update(ArticleRequest $request , ArticleRepository $article)
    {
        $id = request('id');
        $result = $article->update($request,$id);
        if($result) {
            Flash::success(trans("alerts.article.updated_success"));
        }else{
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/admin/article/'.$id."/edit");
    }

    public function store(ArticleRequest $request , ArticleRepository $article)
    {

        $result = $article->store($request);
        if( $result) {
            Flash::success(trans("alerts.article.created_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect(url("/admin/article/create"));
    }

    public function destroy($id , ArticleRepository $article)
    {
        $result = $article->delete($id);
        if($result) {
            Flash::success(trans("alerts.article.soft_deleted_success"));
        }else {
            Flash::error(trans("alerts.serviceBusy"));
        }
        return redirect('/admin/article');
    }
}
