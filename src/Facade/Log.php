<?php
/**
 */
namespace App\Facade;

use App\Facade;

class Log extends Facade
{
    public static function getFacadeAccessor():string
    {
        return 'log';
    }
}