<?php

namespace App\Jobs;

use App\Wechat;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class wechats implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $message = explode("|",$this->message);
        $wechat = new Wechat();
        $wechat->txt = $message[0];
        $wechat->vid = $message[1];
        $wechat->vname = $message[2];
        $wechat->openid = $message[3];
        $wechat->appid = $message[4];
        $wechat->nickname = $message[5];
        $wechat->token = $message[6];
        $wechat->save();
    }
}
