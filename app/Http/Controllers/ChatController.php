<?php

namespace App\Http\Controllers;

use App\Jobs\wechats;
use App\Wechat;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ChatRepositoryInterface;

class ChatController extends Controller
{
    private $chatRepository;

    public function __construct(ChatRepositoryInterface $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }

    public function index($id)
    {
        return response()->json(['result' => $this->chatRepository->getById($id)]);
    }

    /**
     * redis异步消息队列处理客户聊天数据
     * @param Request $request
     */
    public function store(Request $request)
    {
        $txt = $request->txt . getRandomStr(8,false);
        $vid = $request->vid;
        $vname = $request->vname;
        $openid = $request->openid;
        $appid = $request->appid;
        $nickname = $request->nickname;
        $token = $request->token;
        $message = [$txt,$vid,$vname,$openid,$appid,$nickname,$token];
        $res = $this->dispatch(new wechats(implode("|",$message)));
        return response()->json(['res' => $res]);
    }
}
