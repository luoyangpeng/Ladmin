<?php

namespace App\Repositories;

use App\Models\WechatUser;

class WechatUserRepository {

    public function store($data)
    {
        $res = WechatUser::firstOrCreate($data);
        return $res;
    }


}