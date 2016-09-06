<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use RoleRepository;
use App\Http\Requests\RoleRequest;
use PermissionRepository;
class RoleController extends Controller
{	
	/**
	 * 角色列表
	 * @author 晚黎
	 * @date   2016-04-13T11:25:38+0800
	 * @return [type]                   [description]
	 */
    public function index()
    {
    	return view('admin.role.list');
    }

   	/**
   	 * datatable 获取数据
   	 * @author 晚黎
   	 * @date   2016-04-13T11:25:58+0800
   	 * @return [type]                   [description]
   	 */
    public function ajaxIndex()
    {
    	$data = RoleRepository::ajaxIndex();
    	return response()->json($data);
    }
    /**
     * 添加角色视图
     * @author 晚黎
     * @date   2016-04-13T11:26:16+0800
     * @return [type]                   [description]
     */
    public function create()
    {
    	$permissions = PermissionRepository::findPermissionWithArray();
    	return view('admin.role.create')->with(compact('permissions'));
    }

    /**
     * 添加角色
     * @author 晚黎
     * @date   2016-04-13T11:26:35+0800
     * @param  RoleRequest        $request [description]
     * @return [type]                            [description]
     */
    public function store(RoleRequest $request)
    {
    	RoleRepository::store($request);
    	return redirect('admin/role');
    }

    /**
     * 修改角色视图
     * @author 晚黎
     * @date   2016-04-13T11:26:42+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function edit($id)
    {
    	$role = RoleRepository::edit($id);
    	$permissions = PermissionRepository::findPermissionWithArray();
    	return view('admin.role.edit')->with(compact(['role','permissions']));
    }
    /**
     * 修改角色
     * @author 晚黎
     * @date   2016-04-13T11:26:57+0800
     * @param  RoleRequest        $request [description]
     * @param  [type]                   $id      [description]
     * @return [type]                            [description]
     */
    public function update(RoleRequest $request,$id)
    {
    	RoleRepository::update($request,$id);
    	return redirect('admin/role');
    }

    /**
     * 修改角色状态
     * @author 晚黎
     * @date   2016-04-13T11:27:23+0800
     * @param  [type]                   $id     [description]
     * @param  [type]                   $status [description]
     * @return [type]                           [description]
     */
    public function mark($id,$status)
    {
    	RoleRepository::mark($id,$status);
        return redirect('admin/role');
    }

    /**
     * 删除角色
     * @author 晚黎
     * @date   2016-04-13T11:27:34+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function destroy($id)
    {
        RoleRepository::destroy($id);
        return redirect('admin/role');
    }
    /**
     * 查看角色权限
     * @author 晚黎
     * @date   2016-04-13T17:08:46+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function show($id)
    {
    	$permissions = RoleRepository::show($id);
    	return view('admin.role.show')->with(compact('permissions'));
    }
}
