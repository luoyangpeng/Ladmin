<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWechatUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('wechat_user')) {
            Schema::create('wechat_user', function (Blueprint $table) {
                $table->string("openid",100)->comment("微信openid");
                $table->integer("uid")->comment('绑定用id');
                $table->string("nickname",50)->comment("昵称");
                $table->tinyInteger("sex")->comment("0：女 1：男");
                $table->string("province",20)->comment("省份");
                $table->string("city",20)->comment("城市");
                $table->string("country",50)->comment("国家");
                $table->string("headimgurl",100)->comment("头像");

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
        Schema::drop('wechat_user');
    }
}
