<?php

namespace Test\App;

use App\App\Demo;
use App\Service\AppLogger;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;


class DemoTest extends TestCase
{
    /**
     * 题目2 测试foo方法
     * ./vendor/bin/phpunit ./tests/App/DemoTest.php
     * @return void
     */
    public function test_foo()
    {
        $logger = new AppLogger('log4php');
        $req = new HttpRequest();
        $demo = new Demo($logger, $req);
        $foo = $demo->foo();
        $this->assertEquals('bar', $foo);
    }

    /**
     * 题目2 测试get_user_info方法
     * ./vendor/bin/phpunit ./tests/App/DemoTest.php
     * @dataProvider user_info
     * @return void
     */
    public function test_get_user_info($userInfoData)
    {
        $logger = new AppLogger('log4php');
        $req = new HttpRequest();
        $demo = new Demo($logger, $req);
        //$userInfo = $demo->get_user_info();

        if($userInfoData){
            $this->assertEquals('0', $userInfoData['error']);
            $this->assertIsArray($userInfoData['data']);
            $this->assertIsInt($userInfoData['data']['id']);
            $this->assertIsString($userInfoData['data']['username']);
        }
    }

    public function user_info(){
        $data = json_decode('{"error":0,"data":{"id":1,"username":"hello world"}}',true);
        return [[$data]];
    }
}
