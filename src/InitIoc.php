<?php
/**
 * Created by PhpStorm.
 * User: changdi
 * Date: 2022/12/9
 * Time: 下午1:45
 */
namespace App;

use App\Support\Log;
use App\Ioc;

//将Log注入容器
Ioc::register('log',function(){
    return new Log();
});