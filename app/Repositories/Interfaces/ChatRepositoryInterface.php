<?php
namespace App\Repositories\Interfaces;

interface ChatRepositoryInterface
{
    /**
     * @return mixed
     * 定义接口函数
     */
    public function all();

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * @param array $message
     * @return mixed
     */
    public function save(array $message);

    /**
     * @param int $id
     * @param array $message
     * @return mixed
     */
    public function update(int $id,array $message);

    public function getByArr(array $arr);
}
