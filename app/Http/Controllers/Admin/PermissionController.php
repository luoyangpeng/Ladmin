<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PermissionRepository;
use App\Http\Requests\PermissionRequest;
class PermissionController extends Controller
{
    public function index()
    {
    	return view('admin.permission.list');
    }

    public function ajaxIndex()
    {
    	$data = PermissionRepository::ajaxIndex();
    	return response()->json($data);
    }
    /**
     * 添加权限视图
     * @author 晚黎
     * @date   2016-04-12T09:56:23+0800
     * @return [type]                   [description]
     */
    public function create()
    {
    	return view('admin.permission.create');
    }

    /**
     * 添加权限
     * @author 晚黎
     * @date   2016-04-12T13:20:45+0800
     * @param  PermissionRequest        $request [description]
     * @return [type]                            [description]
     */
    public function store(PermissionRequest $request)
    {
    	PermissionRepository::store($request);
    	return redirect('admin/permission');
    }

    /**
     * 修改权限视图
     * @author 晚黎
     * @date   2016-04-12T17:51:46+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function edit($id)
    {
    	$permission = PermissionRepository::edit($id);
    	return view('admin.permission.edit')->with(compact('permission'));
    }
    /**
     * 修改权限
     * @author 晚黎
     * @date   2016-04-12T17:51:35+0800
     * @param  PermissionRequest        $request [description]
     * @param  [type]                   $id      [description]
     * @return [type]                            [description]
     */
    public function update(PermissionRequest $request,$id)
    {
    	PermissionRepository::update($request,$id);
    	return redirect('admin/permission');
    }

    /**
     * 修改权限状态
     * @author 晚黎
     * @date   2016-04-13T09:35:06+0800
     * @param  [type]                   $id     [description]
     * @param  [type]                   $status [description]
     * @return [type]                           [description]
     */
    public function mark($id,$status)
    {
    	PermissionRepository::mark($id,$status);
        return redirect('admin/permission');
    }

    /**
     * 删除权限
     * @author 晚黎
     * @date   2016-04-13T11:04:52+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function destroy($id)
    {
        PermissionRepository::destroy($id);
        return redirect('admin/permission');
    }
}
