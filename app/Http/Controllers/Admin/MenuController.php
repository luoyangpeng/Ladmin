<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use MenuRepository;
use App\Http\Requests\MenuRequest;
class MenuController extends Controller
{
	/**
	 * 菜单首页
	 * @author 晚黎
	 * @date   2016-04-19T10:50:12+0800
	 * @return [type]                   [description]
	 */
    public function index()
    {
    	$menus = MenuRepository::index();

    	return view('admin.menu.list')->with(compact('menus'));
    }
    /**
     * 获取菜单数据
     * @author 晚黎
     * @date   2016-04-20T10:35:37+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function edit($id)
    {
    	$menu = MenuRepository::edit($id);
    	return response()->json($menu);
    }
    /**
     * 修改菜单
     * @author 晚黎
     * @date   2016-04-20T14:20:46+0800
     * @param  MenuRequest              $request [description]
     * @param  [type]                   $id      [description]
     * @return [type]                            [description]
     */
    public function update(MenuRequest $request,$id)
    {
    	MenuRepository::update($request,$id);
    	return redirect('admin/menu');
    }
    /**
     * 添加菜单
     * @author 晚黎
     * @date   2016-04-20T14:33:10+0800
     * @param  MenuRequest              $request [description]
     * @return [type]                            [description]
     */
    public function store(MenuRequest $request)
    {
    	MenuRepository::store($request);
    	return redirect('admin/menu');
    }
    /**
     * 菜单排序
     * @author 晚黎
     * @date   2016-04-20T15:36:17+0800
     * @return [type]                   [description]
     */
    public function sort()
    {
    	$result = MenuRepository::sort();
    	return response()->json($result);
    }

    /**
     * 删除菜单
     * @author 晚黎
     * @date   2016-04-20T16:52:42+0800
     * @param  [type]                   $id [description]
     * @return [type]                       [description]
     */
    public function destroy($id)
    {
    	MenuRepository::destroy($id);
    	return redirect('admin/menu');
    }
}
