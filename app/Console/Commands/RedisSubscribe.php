<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use App\Wechat;
use Illuminate\Http\Request;

class RedisSubscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:RedisSubscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'redis发布订阅';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Redis::subscribe(['wechat-channel'],function($message){
            //存储客户发给客服消息
            $message = explode("|",$message);
            $wechat = new Wechat();
            $wechat->txt = $message[0];
            $wechat->vid = $message[1];
            $wechat->vname = $message[2];
            $wechat->openid = $message[3];
            $wechat->appid = $message[4];
            $wechat->nickname = $message[5];
            $wechat->token = $message[6];
            $wechat->save();
        });
    }
}
