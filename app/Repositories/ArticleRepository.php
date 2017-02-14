<?php

namespace App\Repositories;

use App\Models\Article;
use Mockery\CountValidator\Exception;

class ArticleRepository {

    /**
     * get all article
     *
     * @itas
     * @DateTime 2016-08-27
     * @return   array
     */
    public function getAll()
    {
        return Article::join("article_category as category","category.id","=","article.category_id")
                ->select("article.*","category.name")
                ->orderBy('created_at','desc')
                ->Paginate(10);
    }

    /**
     * article dataTables data
     *
     * @return array
     */
    public function ajaxIndex()
    {
        $draw = request('draw', 1);/*获取请求次数*/
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
        $length = request('length', config('admin.golbal.list.length')); ///*获取条数*/

        $search_pattern = true; /*是否启用模糊搜索*/

        $title = request('title' ,'');
        $desc = request('desc' ,'');
        $author  = request('author','');
        $from = request('from','');



        $created_at_from = request('created_at_from' ,'');
        $created_at_to = request('created_at_to' ,'');
        $updated_at_from = request('updated_at_from' ,'');
        $updated_at_to = request('updated_at_to' ,'');

        $article = new Article();
        /*title搜索*/
        if($title){
            if($search_pattern){
                $article = $article->where('title', 'like', '%'.$title.'%');
            }else{
                $article = $article->where('title', $title);
            }
        }

        /*描述*/
        if($desc){
            if($search_pattern){
                $article = $article->where('desc', 'like','%'. $desc.'%');
            }else{
                $article = $article->where('desc', $desc);
            }
        }

        //作者搜索
        if($author) {
            if($search_pattern){
                $article = $article->where('author', 'like', '%'.$author.'%');
            }else{
                $article = $article->where('author', $author);
            }
        }


        //来源搜索
        if($from) {
            if($search_pattern){
                $article = $article->where('from', 'like', '%'.$from.'%');
            }else{
                $article = $article->where('from', $from);
            }
        }


        /*创建时间搜索*/
        if($created_at_from){
            $article = $article->where('created_at', '>=', getTime($created_at_from));
        }
        if($created_at_to){
            $article = $article->where('created_at', '<=', getTime($created_at_to, false));
        }



        $count = $article->count();


        $article = $article->offset($start)->limit($length);
        $articles = $article->orderBy("id", "desc")->get();

        if ($articles) {
            foreach ($articles as &$v) {
                $v['desc'] = str_limit($v['desc'],18,"...");
                $v['actionButton'] = $v->getActionButtonAttribute(true);
            }
        }

        return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $articles,
        ];
    }

    public function getArticleByCategoryId($category_id)
    {
        $article_list = Article::where("category_id",$category_id)->get();

        return $article_list;
    }

    public function getArticleById($id) {
        try{
           $article = Article::findOrFail($id);

        }catch (Exception $e){
            return 'not find Article';
        }
        return $article->toArray();
    }

    public function store($request)
    {
        $data = $request->all();
        $data['content'] = $data['content'];
        $result = Article::create($data);
        return $result;
    }

    public function delete($id)
    {
        $result = Article::destroy($id);
        
        if($result) {
            return true;
        }else {
            return false;
        }
    }

    public function update($request,$id)
    {
        $article = Article::find($id);
        $data = $request->all();
        $data['content'] = $data['content'];

        $result = $article->fill($data)->save();

        if($result){
            return true;
        } else{
            return false;

        }
    }

    /**
     * 更新文章浏览数
     *
     * @param $article_id
     * @return int
     */
    public function updateViewCount($article_id)
    {
        $res = Article::whereId($article_id)->increment("view_count",1);
        return $res;
    }

}


