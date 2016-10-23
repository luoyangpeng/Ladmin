<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seo = [
            'title'    => 'Ladmin Laravel 后台管理系统',
            'desc'     => 'Lmyadmin是一个免费开源的后台管理系统，使用html5响应式设计，兼容多客户端友好使用.',
            'keywords' => 'Ladmin,Laravel,后台管理系统,开源Laravel后台管理系统',
        ];
        return view('web.index',compact('seo'));
    }


    /**
     * 打赏
     * @itas
     * @DateTime 2016-10-13
     * @return   [type]     [description]
     */
    public function reward()
    {
    	return view('web.reward');
    }
    
}
