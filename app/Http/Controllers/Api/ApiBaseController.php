<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

/**
 * @SWG\Swagger(
 *     schemes={"http","https"},
 *     host="api.iadmin.com",
 *     basePath="/",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Ladmin API 管理中心",
 *         description="Ladmin API 接口管理中心",
 *         termsOfService="",
 *         @SWG\Contact(
 *             email="652008158@qq.com"
 *         ),
 *        
 *     ),
 *     @SWG\ExternalDocumentation(
 *         description="",
 *         url=""
 *     )
 * )
 */
class ApiBaseController extends Controller {

	public function __construct()
	{
		
	}

}
