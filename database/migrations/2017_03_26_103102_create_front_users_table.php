<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('front_users')) {
             Schema::create('front_users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('username',50)->unique()->comment('用户名');
                $table->string('password',100)->comment('密码');
                $table->string('email',50)->unique()->comment('email');
                $table->integer('sex')->default(1)->comment('性别');
                $table->integer('age')->comment('年龄');
                $table->string('avatar',150)->comment('头像');
                $table->integer('last_time')->comment('最后一次登录时间');
                $table->integer('last_ip')->comment('最后一次登录ip');
                $table->integer('status')->comment('用户状态');
                $table->string('type')->comment('用户类型');
                $table->string('remember_token')->comment('remember_token');

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
        Schema::drop('front_users');
    }
}
