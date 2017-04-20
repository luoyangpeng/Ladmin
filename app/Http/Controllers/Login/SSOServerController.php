<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;

class SSOServerController extends Controller
{
	/**
     * get userInfo
     * @itas
     * @DateTime 2017-03-29
     * @return   json
     */
    public function getUserInfo()
    {
        $ticket = request()->get('ticket');
        $callback = request()->get('callback');

        if(request()->session()->has($ticket)) {
			return response()->json(session($ticket))->setCallback($callback);
        } else {
            return response()->json(array());
        }
    }
}
