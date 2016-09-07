<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use UserRepository;
use Auth;


class IndexController extends Controller
{

    public function index()
    {

        return view('admin.index.index');
    }


    /**
     * 锁屏
     *
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
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    public function dataTableI18n()
    {

        return trans('pagination.i18n');
    }
}
