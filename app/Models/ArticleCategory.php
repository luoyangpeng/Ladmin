<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use ActionAttributeTrait;
    protected $table = "article_category";

    protected  $fillable = ['name'];
    protected $action = "articleCategory";


    public function article()
    {
        $this->hasMany('App\Models\Article','category_id','id');
    }
}
