<?php

namespace App\Repositories;

use App\Models\ArticleCategory;

class ArticleCategoryRepository {

    public function cateGoryDataTable()
    {

        $draw = request('draw', 1);/*获取请求次数*/
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
        $length = request('length', config('admin.golbal.list.length')); ///*获取条数*/

        $search_pattern = true; /*是否启用模糊搜索*/

        $name = request('name' ,'');

        $created_at_from = request('created_at_from' ,'');
        $created_at_to = request('created_at_to' ,'');


        $category = new ArticleCategory();
        /*title搜索*/
        if($name){
            if($search_pattern){
                $category = $category->where('name', 'like', '%'.$name.'%');
            }else{
                $category = $category->where('name', $name);
            }
        }

        /*创建时间搜索*/
        if($created_at_from){
            $category = $category->where('created_at', '>=', getTime($created_at_from));
        }
        if($created_at_to){
            $category = $category->where('created_at', '<=', getTime($created_at_to, false));
        }


        $count = $category->count();


        $category = $category->offset($start)->limit($length);
        $category = $category->orderBy("id", "desc")->get();

        if ($category) {
            foreach ($category as &$v) {
                $v['actionButton'] = $v->getActionButtonAttribute(true);
            }
        }

        return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $category,
        ];

    }

    public function store($data)
    {
        $article_category = new ArticleCategory();
        $res = $article_category->fill($data)->save();
        return $res;
    }

    /**
     * 获取所有分类
     * @itas
     * @DateTime 2016-09-01
     * @return   array
     */
    public function getAll()
    {
        $category_list = ArticleCategory::all()->toArray();
        return $category_list;
    }

}