<?php

/**
 * Created by PhpStorm.
 * User: changdi
 * Date: 2022/12/9
 * Time: 下午12:07
 */
namespace App\Support;
use think\facade\Log;

class ThinkLog implements ILog
{
    const name = 'think-log';

    public function __construct()
    {
        Log::init([
            'default'	=>	'file',
            'channels'	=>	[
                'file'	=>	[
                    'type'	=>	'file',
                    'path'	=>	'./logs/',
                ],
            ],
        ]);
    }

    public function info($message = '')
    {
        echo strtoupper($message);
        Log::info(strtoupper($message));
    }

    public function debug($message = '')
    {
        echo strtoupper($message);
        // TODO: Implement debug() method.
        Log::debug(strtoupper($message));
    }

    public function error($message = '')
    {
        echo strtoupper($message);
        // TODO: Implement error() method.
        Log::error(strtoupper($message));
    }
}