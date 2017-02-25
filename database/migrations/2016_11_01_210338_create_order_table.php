<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('order')) {
            Schema::create('order', function (Blueprint $table) {
                $table->increments('id');
                $table->string("goods_name")->comment("商品名称");
                $table->string("openid")->comment("微信用户openid");
                $table->decimal("price")->comment("价格");
                $table->string("order_number",50)->comment('订单号');
                $table->string("prepay_id",100)->comment('交易号');
                $table->tinyInteger("支付状态")->comment("支付状态 0：未支付 1已支付 -1支付失败");
                $table->timestamp("pay_at")->comment("支付时间");
                $table->string("from")->comment("订单来源");

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
        Schema::drop('order');

    }
}
