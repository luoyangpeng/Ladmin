<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    use ActionAttributeTrait;

    protected $table = "article";

    protected $action = "article";

    protected $fillable = [
        'title','desc','category_id','content','thumb','author','from','status'
    ];

    //文章分类的对应关系
    public function category()
    {
        $this->belongsTo('App\Models\ArticleCategory','category_id');
    }

}
