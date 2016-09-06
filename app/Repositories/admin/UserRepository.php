<?php
namespace App\Repositories\admin;
use App\User;
use Carbon\Carbon;
use Flash;
/**
* 用户仓库
*/
class UserRepository
{
	/**
	 * datatable获取数据
	 * @author 晚黎
	 * @date   2016-04-13T21:14:37+0800
	 * @return [type]                   [description]
	 */
	public function ajaxIndex()
	{
		$draw = request('draw', 1);/*获取请求次数*/
		$start = request('start', config('admin.golbal.list.start')); /*获取开始*/
		$length = request('length', config('admin.golbal.list.length')); ///*获取条数*/

		$search_pattern = request('search.regex', true); /*是否启用模糊搜索*/

		$name = request('name' ,'');
		$email = request('email' ,'');
		$confirm_email = request('confirm_email' ,'');
		$status = request('status' ,'');
		$created_at_from = request('created_at_from' ,'');
		$created_at_to = request('created_at_to' ,'');
		$updated_at_from = request('updated_at_from' ,'');
		$updated_at_to = request('updated_at_to' ,'');
		$orders = request('order', []);

		$user = new User;

		/*邮箱名称搜索*/
		if($name){
			if($search_pattern){
				$user = $user->where('name', 'like', $name);
			}else{
				$user = $user->where('name', $name);
			}
		}

		/*权限搜索*/
		if($email){
			if($search_pattern){
				$user = $user->where('email', 'like', $email);
			}else{
				$user = $user->where('email', $email);
			}
		}
		/*验证邮箱搜索*/
		if($confirm_email){
			if($search_pattern){
				$user = $user->where('confirm_email', 'like', $confirm_email);
			}else{
				$user = $user->where('confirm_email', $confirm_email);
			}
		}
		
		/*状态搜索*/
		if ($status) {
			$user = $user->where('status', $status);
		}

		/*权限创建时间搜索*/
		if($created_at_from){
			$user = $user->where('created_at', '>=', getTime($created_at_from));	
		}
		if($created_at_to){
			$user = $user->where('created_at', '<=', getTime($created_at_to, false));	
		}

		/*权限修改时间搜索*/
		if($updated_at_from){
			$uafc = new Carbon($updated_at_from);
			$user = $user->where('created_at', '>=', getTime($updated_at_from));	
		}
		if($updated_at_to){
			$user = $user->where('created_at', '<=', getTime($updated_at_to, false));	
		}

		$count = $user->count();


		if($orders){
			$orderName = request('columns.' . request('order.0.column') . '.name');
			$orderDir = request('order.0.dir');
			$user = $user->orderBy($orderName, $orderDir);
		}

		$user = $user->offset($start)->limit($length);
		$users = $user->get();

		if ($users) {
			foreach ($users as &$v) {
				$v['actionButton'] = $v->getActionButtonAttribute();
			}
		}
		
		return [
			'draw' => $draw,
			'recordsTotal' => $count,
			'recordsFiltered' => $count,
			'data' => $users,
		];
	}

	/**
	 * 添加用户
	 * @author 晚黎
	 * @date   2016-04-14T11:32:04+0800
	 * @param  [type]                   $request [description]
	 * @return [type]                            [description]
	 */
	public function store($request)
	{
		$user = new User;

		$userData = $request->all();
		//密码进行加密
		$userData['password'] = bcrypt($userData['password']);

		if ($user->fill($userData)->save()) {
			//自动更新用户权限关系
			if ($userData['permission']) {
				$user->permission()->sync($userData['permission']);
			}
			// 自动更新用户角色关系
			if ($userData['role']) {
				$user->role()->sync($userData['role']);
			}
			Flash::success(trans('alerts.users.created_success'));
			return true;
		}
		Flash::error(trans('alerts.users.created_error'));
		return false;
	}
	/**
	 * 修改用户视图
	 * @author 晚黎
	 * @date   2016-04-14T15:02:10+0800
	 * @param  [type]                   $id [description]
	 * @return [type]                       [description]
	 */
	public function edit($id)
	{
		$user = User::with(['permission','role'])->find($id);
		if ($user) {
			$userArray = $user->toArray();
			if ($userArray['permission']) {
				$userArray['permission'] = array_column($userArray['permission'],'id');
			}
			if ($userArray['role']) {
				$userArray['role'] = array_column($userArray['role'],'id');
			}
			return $userArray;
		}
		abort(404);
	}
	/**
	 * 修改用户资料
	 * @author 晚黎
	 * @date   2016-04-14T15:17:25+0800
	 * @param  [type]                   $request [description]
	 * @param  [type]                   $id      [description]
	 * @return [type]                            [description]
	 */
	public function update($request,$id)
	{
		$user = User::find($id);
		if ($user) {
			if ($user->fill($request->all())->save()) {
				//自动更新用户权限关系
				if ($request->permission) {
					$user->permission()->sync($request->permission);
				}
				//自动更新用户角色关系
				if ($request->role) {
					$user->role()->sync($request->role);
				}
				Flash::success(trans('alerts.users.updated_success'));

				return true;
			}

			Flash::error(trans('alerts.users.updated_error'));
			return false;
		}
		abort(404);
	}

	/**
	 * 修改用户状态
	 * @author 晚黎
	 * @date   2016-04-14T11:50:45+0800
	 * @param  [type]                   $id     [description]
	 * @param  [type]                   $status [description]
	 * @return [type]                           [description]
	 */
	public function mark($id,$status)
	{
		$user = User::find($id);
		if ($user) {
			$user->status = $status;
			if ($user->save()) {
				Flash::success(trans('alerts.users.updated_success'));
				return true;
			}
			Flash::error(trans('alerts.users.updated_error'));
			return false;
		}
		abort(404);
	}

	/**
	 * 删除角色
	 * @author 晚黎
	 * @date   2016-04-13T11:51:19+0800
	 * @param  [type]                   $id [description]
	 * @return [type]                       [description]
	 */
	public function destroy($id)
	{
		$isDelete = User::destroy($id);
		if ($isDelete) {
			Flash::success(trans('alerts.users.deleted_success'));
			return true;
		}
		Flash::error(trans('alerts.users.deleted_error'));
		return false;
	}

	/**
	 * 查看角色权限
	 * @author 晚黎
	 * @date   2016-04-13T17:09:22+0800
	 * @param  [type]                   $id [description]
	 * @return [type]                       [description]
	 */
	public function show($id)
	{

		$user = User::with(['permission','role'])->findOrFail($id)->toArray();

		if ($user['permission']) {
			$permissionArray = [];
			foreach ($user['permission'] as $v) {
				array_set($permissionArray, $v['slug'], ['name' => $v['name'],'desc' => $v['description']]);
			}
			$user['permission'] = $permissionArray;
		}
		return $user;
	}

	public function resetPassword($request)
	{
		$request = $request->all();
		$request['password'] = bcrypt($request['password']);
		$user = User::find($request['id']);
		if ($user) {
			if ($user->fill($request)->save()) {
				Flash::success(trans('alerts.users.reset_success'));
				return true;
			}
			Flash::error(trans('alerts.users.reset_error'));
			return false;
		}
		abort(404);
	}

	/**
	 * 修改管理员资料
	 */
	public function changeAdminInfoById($request)
	{
		$request = $request->all();
		$user = User::find($request['id']);
		if ($user) {
			if ($user->fill($request)->save()) {
				Flash::success(trans('alerts.users.admin_info_success'));
				return true;
			}
			Flash::error(trans('alerts.users.admin_info_fail'));
			return false;
		}
		abort(404);
	}

	/**
	 * 获取用户信息by email
	 * @param $email
	 */
	public function getUserInfoByEmail($email)
	{
		$user_info = User::where("email",$email)->get();
		return $user_info;
	}

	public function getUserInfoById($id)
	{
		$user_info = User::find($id);
		return $user_info;
	}
}