<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wechat extends Model
{
    protected $table = 'wechats';
    //
    protected $fillable = [
        'txt', 'vid', 'vname', 'openid', 'appid', 'nickname', 'token'
    ];
}
