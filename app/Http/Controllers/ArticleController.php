<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller {

    public function  index(ArticleRepository $articleRepository ,ArticleCategoryRepository $categoryRepository)
    {
        $article_list = $articleRepository->getAll();
        $category_list = $categoryRepository->getAll();

        return view("web.article.index",compact('article_list','category_list'));
    }

    public function show($id ,ArticleRepository $articleRepository ,ArticleCategoryRepository $categoryRepository)
    {
        $article = $articleRepository->getArticleById($id);
        $category_list = $categoryRepository->getAll();

        //更新文章浏览数
        $articleRepository->updateViewCount($id);

        return view("web.article.show",compact("article","category_list"));
    }
}