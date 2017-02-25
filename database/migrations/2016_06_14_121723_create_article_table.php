<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('article')) {
            Schema::create('article', function (Blueprint $table) {
                $table->increments('id');
                $table->string("title",100)->comment('文章标题');
                $table->string("author",50)->comment('文章作者');
                $table->string("from",50)->comment('文章来源');
                $table->string("desc")->comment('文章描述');
                $table->integer("category_id")->comment('分类id');
                $table->text("content")->comment('文章内容');
                $table->string("thumb",100)->comment('封面');
                $table->integer("status")->comment("文章状态");
                $table->integer("view_count")->default(0)->comment("浏览数");  
                $table->timestamps();
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('article');
    }
}
