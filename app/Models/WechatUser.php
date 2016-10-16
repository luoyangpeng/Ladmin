<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WechatUser extends Model {

	protected $table = 'wechat_user';

	protected $fillable = ['openid','nickname','sex','province','city','country','headimgurl'];

}
