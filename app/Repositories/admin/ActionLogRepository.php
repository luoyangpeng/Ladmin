<?php
namespace App\Repositories\admin;

use App\Models\ActionLog;
use App\Services\ClientService;
use Auth;

class ActionLogRepository {


    /**
     * 记录用户操作日志
     * @param $type
     * @param $content
     * @param
     * @return bool
     */
    public function createActionLog($type,$data)
    {
        $actionLog = new ActionLog();

        if(auth()->check()){
            $actionLog->uid = auth()->user()->id;
            $actionLog->username = auth()->user()->name;
        }else{
            $actionLog->uid=0;
            $actionLog->username ="访客";
        }

        if(isset($_SERVER['HTTP_USER_AGENT'])) {
            $actionLog->browser = clientService::getBrowser($_SERVER['HTTP_USER_AGENT'],true);
            $actionLog->system = clientService::getPlatForm($_SERVER['HTTP_USER_AGENT'],true);
        } else{
            $actionLog->browser = '';
            $actionLog->system = '';
        }
        
        $actionLog->url   = request()->getRequestUri();
        $actionLog->ip    = request()->getClientIp();
        $actionLog->type  = $type;
        $actionLog->data  = $data;
        $res = $actionLog->save();

        return $res;
    }

    /**
     * ajax 获取操作日志列表
     * @return array
     */
    public  function ajaxIndex()
    {
        $draw = request('draw', 1);/*获取请求次数*/
        $start = request('start', config('admin.golbal.list.start')); /*获取开始*/
        $length = request('length', config('admin.golbal.list.length')); ///*获取条数*/

        $search_pattern = request('search.regex', true); /*是否启用模糊搜索*/

        $username = request('username' ,'');
        $type = request('type' ,'');
        $url = request('url' ,'');
        $ip = request('ip' ,'');
        $browser = request('browser' ,'');
        $system = request('system' ,'');
        $created_at_from = request('created_at_from' ,'');
        $created_at_to = request('created_at_to' ,'');
        $updated_at_from = request('updated_at_from' ,'');
        $updated_at_to = request('updated_at_to' ,'');
        $orders = request('order', []);

        $actionLog = new ActionLog();

        /*用户名称搜索*/
        if($username){
            if($search_pattern){
                $actionLog = $actionLog->where('username', 'like', $username);
            }else{
                $actionLog = $actionLog->where('username', $username);
            }
        }

        /*类型*/
        if($type){
            if($search_pattern){
                $actionLog = $actionLog->where('type', 'like', $type);
            }else{
                $actionLog = $actionLog->where('type', $type);
            }
        }
        /*url*/
        if($url){
            if($search_pattern){
                $actionLog = $actionLog->where('url', 'like', $url);
            }else{
                $actionLog = $actionLog->where('url', $url);
            }
        }

        if($browser){
            if($search_pattern){
                $actionLog = $actionLog->where('browser', 'like', $browser);
            }else{
                $actionLog = $actionLog->where('browser', $browser);
            }
        }

        if($system){
            if($search_pattern){
                $actionLog = $actionLog->where('system', 'like', $system);
            }else{
                $actionLog = $actionLog->where('system', $system);
            }
        }


        /*创建时间搜索*/
        if($created_at_from){
            $actionLog = $actionLog->where('created_at', '>=', getTime($created_at_from));
        }
        if($created_at_to){
            $actionLog = $actionLog->where('created_at', '<=', getTime($created_at_to, false));
        }



        $count = $actionLog->count();


        $actionLog = $actionLog->offset($start)->limit($length);
        $actionLogs = $actionLog->orderBy("id", "desc")->get();

        if ($actionLogs) {
            foreach ($actionLogs as &$v) {

                $v['actionButton'] = $v->getActionButtonAttribute(true);
            }
        }

        return [
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $actionLogs,
        ];
    }



}