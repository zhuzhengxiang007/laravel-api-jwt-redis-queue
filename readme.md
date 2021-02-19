启动
php artisan serve --port=80
清除缓存
php artisan config:clear

redis启动：
cd /usr/local/redis-6.0.8/src
./redis-server /usr/local/redis-6.0.8/redis.conf

laravel-admin
composer require encore/laravel-admin
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
php artisan admin:install

redis
https://learnku.com/docs/laravel/5.8/redis/3930
redis消息发布订阅
\App\Console\Commands\RedisSubscribe.php handle()方法处理订阅消息
php artisan make:command RedisSubscribe
启动监听才可以发布事件才能响应
php artisan redis:RedisSubscribe
subscribe 方法设置频道监听器。我们将这个方法调用放在 Artisan 命令 中，因为调用 subscribe 方法会启动一个长时间运行的进程
postman 测试并发结果有丢失消息情况
解决方案https://blog.csdn.net/luyaoying001/article/details/80264347

发布消息
Redis::publish('test-channel','hello world');

集成JWT
https://learnku.com/laravel/t/27760

控制器
php artisan make:controller ChatController

微信客户信息model
php artisan make:model Wechat -mc

任务机制 redis 异步消息队列
视频资料https://www.bilibili.com/video/av91338236

.env
QUEUE_DRIVER=redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=******
REDIS_PORT=6379

config/queue.php
return [
    'default' => env('QUEUE_DRIVER', 'redis'),//修改队列驱动，使用redis
    'connections' => [
        'sync' => [
            'driver' => 'sync',
        ],
        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
            'retry_after' => 90,
        ],
        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => 'localhost',
            'queue' => 'default',
            'retry_after' => 90,
        ],
        'sqs' => [
            'driver' => 'sqs',
            'key' => env('SQS_KEY', 'your-public-key'),
            'secret' => env('SQS_SECRET', 'your-secret-key'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'your-queue-name'),
            'region' => env('SQS_REGION', 'us-east-1'),
        ],
        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
            'queue' => 'default',
            'retry_after' => 90,
            'block_for' => null,
        ],
    ],
    'failed' => [
        'database' => env('DB_CONNECTION', 'mysql'),//队列执行失败 存放的数据库
        'table' => 'failed_jobs',//队列执行失败 存放的表
    ],
]

config/database.php
'redis' => [
    'client' => 'predis',
    'default' => [
        'host' => env('REDIS_HOST', '127.0.0.1'),
        'password' => env('REDIS_PASSWORD', null),
        'port' => env('REDIS_PORT', 6379),
        'database' => 0,//选择使用的redis库
    ],
],

php artisan make:job wechats

php artisan queue:work —-queue=wechats
php artisan queue:work --daemon //守护所有进程

异步消息队列 postman并发测试没有丢失数据

公共函数放到哪里
1）可以在app/composer.json中找到autoload项，在里面添加如下内容：
    "files":[
        "app/Helper/functions.php"
    ]
2）创建app/Helper目录，创建functions.php文件
3）写自己常用的函数
4）在项目目录下执行composer dump-auto
以后就可以直接在项目中使用这些已经定义好的函数。

laravel Repository模式
https://www.php.cn/phpkj/laravel/459178.html
Repository->数据层的抽象
App\Repositories 仓储目录




