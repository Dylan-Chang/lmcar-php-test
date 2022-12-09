<?php

namespace App\Support;

interface ILog
{
    /**
     * @param $message
     * @return mixed
     */
    public  function info($message = '');

    /**
     * @param $message
     * @return mixed
     */
    public function debug($message = '');

    /**
     * @param $message
     * @return mixed
     */
    public function error($message = '');
}