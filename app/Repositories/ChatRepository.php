<?php
namespace App\Repositories;

use App\Wechat;
use App\Repositories\Interfaces\ChatRepositoryInterface;

class ChatRepository implements ChatRepositoryInterface
{
    public function all()
    {
        // TODO: Implement all() method.
        return Wechat::all();
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        return Wechat::where('id',$id)->get();
    }

    public function save(array $message)
    {
        // TODO: Implement save() method.
    }

    public function update(int $id, array $message)
    {
        // TODO: Implement update() method.
    }

    public function getByArr(array $arr)
    {
        // TODO: Implement getByArr() method.
    }
}

