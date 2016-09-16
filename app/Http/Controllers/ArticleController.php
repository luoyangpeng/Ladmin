<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;

class ArticleController extends Controller {

    public function  index(ArticleRepository $articleRepository)
    {
        $article_list = $articleRepository->getAll();
        return view("web.article.index",compact('article_list'));
    }

    public function show($id ,ArticleRepository $articleRepository)
    {
        $article = $articleRepository->getArticleById($id);

        return view("web.article.show",compact("article"));
    }
}