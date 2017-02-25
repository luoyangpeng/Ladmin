<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateActionLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('action_log')) {
            Schema::create('action_log', function (Blueprint $table) {
                $table->increments('id');
                $table->string("uid")->comment("用户id");
                $table->string("username")->comment("姓名");
                $table->string("type","50")->comment("操作类型");
                $table->string("ip","50")->comment("操作者ip");
                $table->string("browser",150)->comment("浏览器");
                $table->string("system",50)->comment("操作系统");
                $table->string("url",150)->comment('url');
                $table->text("data")->comment("操作描述");

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
        Schema::drop('action_log');
    }
}
