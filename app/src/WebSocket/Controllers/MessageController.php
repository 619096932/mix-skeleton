<?php

namespace App\WebSocket\Controllers;

use Swoole\Coroutine\Channel;
use Mix\Redis\Pool\ConnectionPool;
use App\WebSocket\Exceptions\ExecutionException;
use App\WebSocket\Forms\MessageForm;
use App\WebSocket\Helpers\JsonRpcHelper;
use App\WebSocket\Libraries\SessionStorage;

/**
 * Class MessageController
 * @package App\WebSocket\Controllers
 * @author liu,jian <coder.keda@gmail.com>
 */
class MessageController
{

    /**
     * 发送消息
     * @param Channel $sendChan
     * @param SessionStorage $sessionStorage
     * @param $params
     * @return array
     */
    public function emit(Channel $sendChan, SessionStorage $sessionStorage, $params)
    {
        // 使用模型
        $attributes = [
            'text' => array_shift($params),
        ];
        $model      = new MessageForm($attributes);
        $model->setScenario('emit');
        // 验证失败
        if (!$model->validate()) {
            throw new ExecutionException($model->getError(), 100001);
        }

        // 获取加入的房间id
        if (empty($sessionStorage->joinRoomId)) {
            // 给当前连接发送消息
            throw new ExecutionException("You didn't join any room", 100002);
        }

        // 给当前加入的房间发送消息
        xgo(function () use ($model, $sessionStorage) {
            $message = JsonRpcHelper::notification('message.update', [
                $model->text,
                $sessionStorage->joinRoomId,
            ]);
            /** @var ConnectionPool $pool */
            $pool  = context()->get('redisPool');
            $redis = $pool->getConnection();
            $redis->publish("room_{$sessionStorage->joinRoomId}", $message);
            $redis->release();
        });

        // 给当前连接发送消息
        return [
            'status' => 'success',
        ];
    }

}
