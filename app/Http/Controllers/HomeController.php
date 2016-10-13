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

        return view('web.index');
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
