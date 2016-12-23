<?php
namespace App\Lib;

class Code {
	const NORMAL_ERROR					= 1;				//报错
	const UNLOGIN						= -1;				//未登陆
	const SUCCESS						= 0;				//成功
	const FATAL_ERROR					= 40000;			//致命错误
	const SIGN_ERROR 					= 40001;			//参数sign错误
	const HTTP_REQUEST_METHOD_ERROR		= 40002;			//请求method错误
	const HTTP_REQUEST_PARAM_ERROR		= 40003;			//请求参数错误
	const WEIXIN_APP_PATNENT_ERROR		= 40004;			//您没有APP支付权限
	


	const PAY_ALI = 1;    // 支付方式 支付宝安装
	const PAY_WEIXIN = 7;    // 支付方式 微信支付
	
	public static function errMsg() {
		return array(
			self::NORMAL_ERROR					=>	'接口错误',
			self::UNLOGIN						=>	'未登陆',
			self::SUCCESS						=>	'success',
			self::FATAL_ERROR					=>	'接口错误,请联系管理员',
			self::SIGN_ERROR 					=>	'签名错误',
			self::HTTP_REQUEST_METHOD_ERROR		=>	'api请求方式错误',
			self::HTTP_REQUEST_PARAM_ERROR		=>	'api请求参数错误',
			self::WEIXIN_APP_PATNENT_ERROR      =>  '您没有APP支付权限'
		);
	}
	

	
	public static function getErrorMsg($code) {
		$msgArray = self::errMsg();
		return $msgArray[$code];
	}
}