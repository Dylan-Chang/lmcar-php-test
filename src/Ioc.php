<?php

namespace App;

class Ioc
{
    public static $instance = [];

    /**
     * 注入容器
     * @param string $name
     * @param \Closure $closure
     */
    public static function register(string $name,\Closure $reslove)
    {
        static::$instance[$name]=$reslove;
    }

    /**
     * 返回实例
     * @param string $name
     * @return mixed
     */
    public static function resolve(string $name){
        if(static::$instance[$name] instanceof \Closure){
            return static::$instance[$name];
        }else{
            new $name;
        }
    }
}