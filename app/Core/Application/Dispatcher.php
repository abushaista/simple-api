<?php

namespace App\Core\Application;

class Dispatcher {
    public function dispatch(object $object)
    {
        $handlerClass = get_class($object) . 'Handler';
        $handler = app($handlerClass);
        return $handler->handle($object);
    }
}