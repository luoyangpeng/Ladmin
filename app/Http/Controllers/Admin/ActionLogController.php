<?php
/**
 * 用户操作日志
 * @author :luoyangpeng1122@163.com
 *
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use ActionLogRepository;

class ActionLogController extends  Controller {

    /**
     * 操作日志页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actionList() {

        return view("admin.action.list");
    }

    /**
     * 获取操作日志列表
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxIndex()
    {
        $data = ActionLogRepository::ajaxIndex();
        return response()->json($data);
    }


}