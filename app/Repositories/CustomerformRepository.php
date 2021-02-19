<?php
namespace App\Repositories;

use App\Customerform;
use App\Repositories\Interfaces\ChatRepositoryInterface;

class CustomerformRepository implements ChatRepositoryInterface
{

    public function all()
    {
        // TODO: Implement all() method.
        return Customerform::all();
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        return Customerform::where('id',$id)->get();
    }

    public function save(array $message)
    {
        // TODO: Implement save() method.
        $customerform = new Customerform();
        $customerform->sid = $message[0];
        $customerform->formid = $message[1];
        $customerform->vid = $message[2];
        $customerform->data = $message[3];
        $customerform->timespan = $message[4];
        $customerform->fdata = $message[5];
        $customerform->ip = $message[6];
        $customerform->avatar = $message[7];
        $customerform->nickname = $message[8];
        $customerform->openid = $message[9];
        $customerform->sex = $message[10];
        $customerform->country = $message[11];
        $customerform->province = $message[12];
        $customerform->city = $message[13];
        $customerform->lastaccesstime = $message[14];
        $customerform->submitcount = $message[15];
        $customerform->create_time = $message[16];
        $customerform->update_time = $message[17];
        return $customerform->save();

    }

    public function update(int $id, array $message)
    {
        // TODO: Implement update() method.
        $customerform = Customerform::find($id);
        $customerform->sid = $message[0];
        $customerform->formid = $message[1];
        $customerform->vid = $message[2];
        $customerform->data = $message[3];
        $customerform->timespan = $message[4];
        $customerform->fdata = $message[5];
        $customerform->ip = $message[6];
        $customerform->avatar = $message[7];
        $customerform->nickname = $message[8];
        $customerform->openid = $message[9];
        $customerform->sex = $message[10];
        $customerform->country = $message[11];
        $customerform->province = $message[12];
        $customerform->city = $message[13];
        $customerform->lastaccesstime = $message[14];
        $customerform->submitcount = $message[15];
        $customerform->create_time = $message[16];
        $customerform->update_time = $message[17];
        return $customerform->save();
    }

    public function getByArr(array $arr)
    {
        // TODO: Implement getByArr() method.
        $customerform = new Customerform();
        return $customerform->where($arr)->get();
    }
}
