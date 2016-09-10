<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use UserRepository;
use Auth;


class IndexController extends Controller
{
	/**
	 * 后台首页
	 * 
	 * @itas
	 * @DateTime 2016-09-07
	 * @return   [type]     [description]
	 */
    public function index()
    {
        return view('admin.index.index');
    }


    /**
     * 锁屏
     * 
     * @itas
     * @DateTime 2016-09-07
     * @return   [type]     [description]
     */
    public function lockScreen()
    {
        request()->session()->put("lock", 'ok');
        $name = auth()->user()->name;
        return view('auth.lock', ['name' => $name]);
    }

    /**
     * 解锁
     * 
     * @itas
     * @DateTime 2016-09-07
     * @return   [type]     [description]
     */
    public function unlock()
    {

        $uid = auth()->user()->id;
        $user_info = UserRepository::getUserInfoById($uid);

        $password = Input::get("password");

        if (Auth::attempt(['email' => $user_info->email, 'password' => $password])) {
            request()->session()->forget("lock");
            return redirect('/admin');
        } else {
            return redirect('/admin/lock');
        }

    }

    /**
     * datatable 多语言
     * 
     * @itas
     * @DateTime 2016-09-07
     * @return   [type]     [description]
     */
    public function dataTableI18n()
    {
        return trans('pagination.i18n');
    }
}
