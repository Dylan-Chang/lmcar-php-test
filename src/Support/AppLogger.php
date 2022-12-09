<?php
/**
 * Created by PhpStorm.
 * User: changdi
 * Date: 2022/12/9
 * Time: 下午12:07
 */
namespace App\Support;

class AppLogger
{
    const TYPE_LOG4PHP = 'log4php';
    const THINK_LOG = 'think-log';

    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        //工厂模式
        if ($type == self::TYPE_LOG4PHP) {
            $this->logger = new Log4php();
        }elseif($type == self::THINK_LOG){
            $this->logger = new ThinkLog();
        }
    }

    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }
}