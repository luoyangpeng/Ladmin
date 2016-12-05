<?php

namespace App\Services;

class ApiResponseService {

	public static function success($data,$code,$message)
	{
		$result = [
			'data' 		=> $data,
			'code' 		=> $code,
			'message' 	=> $message	
		];
		return response()->json($result);
	}


	public static function fail($data)
	{
		return response()->json($data);
	}
}


