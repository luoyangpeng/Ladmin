<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('images')) {
            Schema::create('images', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('category_id')->default(1)->comment("分类id 1:广告图片 2:文章图片 3:其他");
                $table->string('path')->comment('图片地址');
                $table->string('file_id',50)->comment('文件id');

                $table->timestamps();
                $table->index('category_id');
                $table->index('file_id');
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
        Schema::drop('images');
    }
}
