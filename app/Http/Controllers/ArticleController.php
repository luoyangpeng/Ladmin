<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleCategoryRepository;
use App\Repositories\ArticleRepository;
use App\Services\IdEncryptService;

class ArticleController extends Controller {

    public function  index(ArticleRepository $articleRepository ,ArticleCategoryRepository $categoryRepository)
    {
        $article_list = $articleRepository->getAll();

        foreach ($article_list as $k=>$article) {

            $article_list[$k]['en_id'] = IdEncryptService::encryption_id($article['id']);
        }

        $category_list = $categoryRepository->getAll();

        return view("web.article.index",compact('article_list','category_list'));
    }

    public function show($id ,ArticleRepository $articleRepository ,ArticleCategoryRepository $categoryRepository)
    {
        //解密id
        $id = IdEncryptService::decryption_id($id);
        $article = $articleRepository->getArticleById($id);
        $category_list = $categoryRepository->getAll();

        //更新文章浏览数
        $articleRepository->updateViewCount($id);

        return view("web.article.show",compact("article","category_list"));
    }
}