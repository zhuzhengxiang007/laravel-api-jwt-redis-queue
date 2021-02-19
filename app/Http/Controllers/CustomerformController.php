<?php

namespace App\Http\Controllers;

use App\Repositories\CustomerformRepository;
use App\Customerform as cf;
use Illuminate\Http\Request;
use App\Jobs\customerform;

class CustomerformController extends Controller
{
    public function store(Request $request)
    {
        //访客对同一个表单ID(formid)和访客ID(vid)与数据库一致的话，则是更新操作
        //防止数据丢失，多米客POST过来的数据，交由异步消息队列处理，防止并发造成数据丢失
        $message = [
            $request->data,
            $request->session
        ];
        $res = $this->dispatch(new customerform($message));
        return response()->json(['res' => $res]);
    }
}
