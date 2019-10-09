<?php

namespace App\Common\Listeners;

use Mix\Event\ListenerInterface;
use Mix\Redis\Event\ExecuteEvent;

/**
 * Class RedisListener
 * @package App\Common\Listeners
 * @author liu,jian <coder.keda@gmail.com>
 */
class RedisListener implements ListenerInterface
{

    /**
     * 监听的事件
     * @return array
     */
    public function events(): array
    {
        // TODO: Implement events() method.
        // 要监听的事件数组，可监听多个事件
        return [
            ExecuteEvent::class,
        ];
    }

    /**
     * 处理事件
     * @param object $event
     */
    public function process(object $event)
    {
        // TODO: Implement process() method.
        // 事件触发后，会执行该方法
    }

}
