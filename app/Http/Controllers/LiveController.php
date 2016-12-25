<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LiveController extends Controller
{
	/**
	 * 直播列表
	 * 
	 * @itas
	 * @DateTime 2016-12-25
	 * @return   [type]     [description]
	 */
    public function liveList() {
		$seo = [
            'title'    => 'Ladmin 直播列表',
            'desc'     => 'Ladmin 直播列表页面',
            'keywords' => 'Ladmin,Ladmin博客，直播',
        ];

    	return view('web.live.list', compact('seo'));
    }

    /**
     * 直播页面
     * 
     * @itas
     * @DateTime 2016-12-25
     * @param    string    $roomId 房间id
     * @return   [type]             [description]
     */
    public function liveInfo($roomId)
    {
    	$seo = [
            'title'    => 'Ladmin 直播房间',
            'desc'     => 'Ladmin 直播房间页面',
            'keywords' => 'Ladmin,Ladmin博客，直播',
        ];

        if(isMobile()) {
        	return view('web.live.wap', compact('seo','roomId'));
        } else {
        	return view('web.live.info', compact('seo','roomId'));
        }

    	
    }
}
