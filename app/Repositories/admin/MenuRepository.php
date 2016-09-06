<?php
namespace App\Repositories\admin;
use App\Models\Menu;
use Cache;
use Flash;
class MenuRepository
{
	/**
	 * 获取菜单数据
	 * @author 晚黎
	 * @date   2016-04-20T17:10:54+0800
	 * @return [type]                   [description]
	 */
	public function index()
	{
		//判断是否缓存menu数据
		if (Cache::has('menuList')) {
			return Cache::get('menuList');
		}
		$menuList = $this->setMenuListCache();
		return $menuList;
	}
	/**
	 * 递归迭代菜单关系
	 * @author 晚黎
	 * @date   2016-04-20T10:36:20+0800
	 * @param  [type]                   $menus [description]
	 * @param  integer                  $pid   [description]
	 * @return [type]                          [description]
	 */
	private function sortMenu($menus,$pid = 0){
		$arr = [];
		foreach($menus as $k =>  $v){
			if($v['pid'] == $pid){
	            $arr[$k] = $v;
	            $arr[$k]['child'] = self::sortMenu($menus,$v['id']);
	        }
	    }
		return $arr;
	}
	/**
	 * 缓存菜单数据
	 * @author 晚黎
	 * @date   2016-04-20T13:10:53+0800
	 */
	public function setMenuListCache()
	{
		$menus = Menu::where('language',config('app.locale'))
						->orderBy('sort','desc')
						->orderBy('id','asc')
						->get()
						->toArray();
		if ($menus) {
			$menuList = $this->sortMenu($menus);
			//子菜单进行排序
			foreach ($menuList as &$v) {
	    		if ($v['child']) {
	    			$sort = array_column($v['child'],'sort');
	    			arsort($sort);
	    			array_multisort($sort,SORT_DESC,$v['child']);
	    		}
	    	}
			//缓存数据
			Cache::forever('menuList', $menuList);
			return $menuList;
		}
		return [];
	}
	/**
	 * 获取菜单数据
	 * @author 晚黎
	 * @date   2016-04-20T10:37:38+0800
	 * @param  [type]                   $id [description]
	 * @return [type]                       [description]
	 */
	public function edit($id)
	{
		$menu = Menu::find($id)->toArray();
		if ($menu) {
			$menu['update'] = url('admin/menu/'.$id);
    		$menu['msg'] = trans('alerts.menus.laod_success');
			return $menu;
		}
		abort(404);
	}
	/**
	 * 修改菜单数据
	 * @author 晚黎
	 * @date   2016-04-20T14:05:54+0800
	 * @param  [type]                   $request [description]
	 * @param  [type]                   $id      [description]
	 * @return [type]                            [description]
	 */
	public function update($request,$id)
	{
		$menu = Menu::find($id);
		if ($menu) {
			$pid = $menu->pid;
			$sort = $menu->sort;
			$isUpdate = $menu->fill($request->all())->save();
			if ($isUpdate) {
				$this->setMenuListCache();
				Flash::success(trans('alerts.menus.updated_success'));
				return true;
			}
			Flash::error(trans('alerts.menus.updated_error'));
			return false;
		}
		abort(404);
	}
	/**
	 * 添加菜单
	 * @author 晚黎
	 * @date   2016-04-20T14:32:54+0800
	 * @param  [type]                   $request [description]
	 * @return [type]                            [description]
	 */
	public function store($request)
	{
		$menu = new Menu;
		if ($menu->fill($request->all())->save()) {
			// 菜单发生变化，更新菜单数组
			$this->setMenuListCache();
			Flash::success(trans('alerts.menus.created_success'));
			return true;
		}
		Flash::error(trans('alerts.menus.created_error'));
		return false;
	}

	/**
	 * 菜单排序
	 * @author 晚黎
	 * @date   2016-04-20T15:43:19+0800
	 * @return [type]                   [description]
	 */
	public function sort()
	{
		$currentItemId = request('currentItemId',0);
		$itemParentId = request('itemParentId',0);

		if (!$currentItemId) {
			return ['status' => false,'msg' => trans('alerts.menus.currentItem_error')];
		}
		$menu = Menu::find($currentItemId);
		if ($menu) {
			$menu->pid = $itemParentId;
			if ($menu->save()) {
				//更新菜单缓存数据
				$this->setMenuListCache();
				return ['status' => true,'msg' => trans('alerts.menus.updated_success')];
			}
			return ['status' => false,'msg' => trans('alerts.menus.updated_error')];
		}
		abort(404);
	}
	/**
	 * 删除菜单
	 * @author 晚黎
	 * @date   2016-04-20T16:52:27+0800
	 * @param  [type]                   $id [description]
	 * @return [type]                       [description]
	 */
	public function destroy($id)
	{
		$isDestroy = Menu::destroy($id);
		if ($isDestroy) {
			//更新缓存数据
			$this->setMenuListCache();
			Flash::success(trans('alerts.menus.deleted_success'));
			return true;
		}
		Flash::error(trans('alerts.menus.deleted_error'));
		return false;
	}
}