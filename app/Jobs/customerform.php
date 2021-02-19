<?php

namespace App\Jobs;

use App\Repositories\CustomerformRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class customerform implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customerformRepository;
    protected $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->customerformRepository = new CustomerformRepository();
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->message[0];
        $session = json_decode($this->message[1],true);
        $datas = [
            $session['sid'],$session['formid'],$session['vid'],$data,$session['timespan'],$session['fdata'],$session['ip'],$session['avatar'],$session['nickname'],$session['openid'],$session['sex'],$session['country'],$session['province'],$session['city'],$session['lastaccesstime'],$session['submitcount'],$session['create_time'],$session['update_time'],
        ];
        //如果这个表单数据已经录入，则需要重新
        $is_haved = $this->customerformRepository->getByArr(['formid'=>$session['formid'],'vid'=>$session['vid']]);
        if ($is_haved->count() > 0){
            $id = $is_haved->toArray()[0]['id'];
            $this->customerformRepository->update($id, $datas);
        } else {
            $this->customerformRepository->save($datas);
        }
    }
}
