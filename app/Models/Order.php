<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $table = 'order';

	protected $fillable = ['goods_name','openid','price','order_number','transaction_id','pay_at','from','prepay_id'];

}
