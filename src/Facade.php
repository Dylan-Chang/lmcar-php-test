<?php

namespace App;

use Exception;

class Facade
{
    public static function getFacadeRoot()
    {
        $facadeAccessor = static::getFacadeAccessor();
        $obj = Ioc::resolve($facadeAccessor);
        return $obj();
    }

    /**
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments)
    {

        $instance = static::getFacadeRoot();

        if (! $instance) {
            throw new Exception('A facade root has not been set.');
        }
        return $instance->$name(...$arguments);
    }
}