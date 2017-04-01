<?php

use Carbon\Carbon;

if(!function_exists('getTime')){
	function getTime($time, $status = True){
		$newTime = new Carbon($time);

		if($status){
			return $newTime->startOfDay();
		}
		return $newTime->endOfDay();
	}
}

/**
 * 判断是否为多维数组
 */
if(!function_exists('isDoubleArray')){
	function isDoubleArray($array){
		if (is_array($array)) {
			foreach ($array as $v) {
				if (is_array($v)) {
					return true;
					break;
				}
			}
			return false;
		}
		return false;
	}
}
/**
 * 验证邮箱
 */
if(!function_exists('confirmEmail')){
	function confirmEmail($confirm){
		if ($confirm == config('admin.global.status.active')) {
			return trans('labels.user.active');
		}
		return trans('labels.user.audit');
	}
}

if(!function_exists('curlRequest')){
	 function curlRequest($url, $postData = array(), $launch = 'post', $contentType = 'text/html') {
		$result = "";
		try {
			$header = array("Content-Type:" . $contentType . ";charset=utf-8");
			if (!empty($_SERVER['HTTP_USER_AGENT'])) {		//是否有user_agent信息
				$user_agent = $_SERVER['HTTP_USER_AGENT'];
			}
			$cur = curl_init();
			curl_setopt($cur, CURLOPT_URL, $url);
			curl_setopt($cur, CURLOPT_HEADER, 0);
 			curl_setopt($cur, CURLOPT_HTTPHEADER, $header);
			curl_setopt($cur, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($cur, CURLOPT_TIMEOUT, 30);
			//https
			curl_setopt($cur, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($cur, CURLOPT_SSL_VERIFYHOST, FALSE);
			if (isset($user_agent)) {
				curl_setopt($cur, CURLOPT_USERAGENT, $user_agent);
			}
			curl_setopt($cur, CURLOPT_ENCODING, 'gzip');
			if (is_array($postData)) {
				if ($postData && count($postData) > 0) {
					$params = http_build_query($postData);
					if ($launch=='get') {		//发送方式选择
						curl_setopt($cur, CURLOPT_HTTPGET, $params);
					} else {
						curl_setopt($cur, CURLOPT_POST, true);
						curl_setopt($cur, CURLOPT_POSTFIELDS, $params);
					}
				}
			} else {
				if (!empty($postData)) {
					$params = $postData;
					if ($launch=='post') {
						curl_setopt($cur, CURLOPT_POST, true);
						curl_setopt($cur, CURLOPT_POSTFIELDS, $params);
					}
				}
			}
			$result = curl_exec($cur);
			curl_close($cur);
		} catch (Exception $e) {

		}
		return $result;
	}
}

if(! function_exists('isMobile')){
	function isMobile()
	{ 
	    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
	    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
	    {
	        return true;
	    } 
	    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	    if (isset ($_SERVER['HTTP_VIA']))
	    { 
	        // 找不到为flase,否则为true
	        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
	    } 
	    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
	    if (isset ($_SERVER['HTTP_USER_AGENT']))
	    {
	        $clientkeywords = array ('nokia',
	            'sony',
	            'ericsson',
	            'mot',
	            'samsung',
	            'htc',
	            'sgh',
	            'lg',
	            'sharp',
	            'sie-',
	            'philips',
	            'panasonic',
	            'alcatel',
	            'lenovo',
	            'iphone',
	            'ipod',
	            'blackberry',
	            'meizu',
	            'android',
	            'netfront',
	            'symbian',
	            'ucweb',
	            'windowsce',
	            'palm',
	            'operamini',
	            'operamobi',
	            'openwave',
	            'nexusone',
	            'cldc',
	            'midp',
	            'wap',
	            'mobile'
	            ); 
	        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
	        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
	        {
	            return true;
	        } 
	    } 
	    // 协议法，因为有可能不准确，放到最后判断
	    if (isset ($_SERVER['HTTP_ACCEPT']))
	    { 
	        // 如果只支持wml并且不支持html那一定是移动设备
	        // 如果支持wml和html但是wml在html之前则是移动设备
	        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
	        {
	            return true;
	        } 
	    } 
	    return false;
	} 
}


if(! function_exists('isEmail')) {
	function isEmail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
}

