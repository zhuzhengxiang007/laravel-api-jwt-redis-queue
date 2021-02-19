<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customerform extends Model
{
    protected $table = 'customerform';//指向数据库表
    //
    /*protected $fillable = [
        'sid','formid','vid','data','timespan','fdata','ip','avatar','nickname','openid','sex','country','province','city','lastaccesstime','submitcount','create_time','update_time'
    ];*/
    protected $fillable = [
        'sid','formid','vid'
    ];

    public $timestamps=false;//禁用时间戳
}
