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

        $seo = [
            'title'    => 'Ladmin 文章列表',
            'desc'     => 'Lmyadmin博客系统.',
            'keywords' => 'Ladmin,Ladmin博客',
        ];

        return view("web.article.index",compact('article_list','category_list','seo'));
    }

    public function show($id ,ArticleRepository $articleRepository ,ArticleCategoryRepository $categoryRepository)
    {
        //解密id
        $id = IdEncryptService::decryption_id($id);
        $article = $articleRepository->getArticleById($id);
        $category_list = $categoryRepository->getAll();

        //更新文章浏览数
        $articleRepository->updateViewCount($id);

        $seo = [
            'title'    => $article['title']."_Ladmin",
            'desc'     => $article['desc'],
            'keywords' => 'Ladmin,'.$article['title'],
        ];

        return view("web.article.show",compact("article","category_list","seo"));
    }
}