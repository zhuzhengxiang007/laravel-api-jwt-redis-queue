<?php

namespace App\Http\Controllers;

use App\Wechat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class WechatController extends Controller
{
    /**
     * 获取客服系统中客户输入信息
     * @param Request $request
     */
    public function store(Request $request)
    {
        //需要处理一下,redis publish message need string
        $txt = $request->txt . getRandomStr(8,false);
        $vid = $request->vid;
        $vname = $request->vname;
        $openid = $request->openid;
        $appid = $request->appid;
        $nickname = $request->nickname;
        $token = $request->token;
        $message = [$txt,$vid,$vname,$openid,$appid,$nickname,$token];
        //接收到的客户信息需要存入数据库，这边交给redis队列处理，这里主要处理用户发来的信息如何应答
        Redis::publish('wechat-channel',implode("|",$message));
        return response()->json(['txt' => $txt]);
    }
}
