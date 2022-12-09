<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\ProductHandler;

/**
 * Class ProductHandlerTest
 */
class ProductHandlerTest extends TestCase
{
    private $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];
    /*
    public function testGetTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }

        $this->assertEquals(143, $totalPrice);
    }
    */

    /**
     * 题目1 需求1 编写一个函数计算商品总金额
     * ./vendor/bin/phpunit ./tests/Service/ProductHandlerTest.php
     * @return void
     */
    public  function testGetTotalPrice(){
        $productHandler = new ProductHandler($this->products);
        $totalPrice = $productHandler->getTotalPrice();
        $this->assertEquals(143, $totalPrice);
    }

    /**
     * 题目1 需求2 把商品以金额排序（由大至小），并筛选商品种类是"dessert" 种类
     * ./vendor/bin/phpunit ./tests/Service/ProductHandlerTest.php
     * @return void
     */
    public  function testSortDessert(){
        $productHandler = new ProductHandler($this->products);
        $products = $productHandler->sortDessert();
        $productsDessert = [];
        foreach ($products as $product){
            //测试类型为Dessert
            $this->assertEquals(ProductHandler::PRODUCT_TYPE_DESSERT, $product['type']);
            if($product['type'] == ProductHandler::PRODUCT_TYPE_DESSERT){
                $productsDessert[] = $product;
            }
        }

        //测试数组
        $this->assertEqualsCanonicalizing($productsDessert, $products);
    }

    /**
     * 题目1 需求3 创建日期转换为unix timestamp
     * ./vendor/bin/phpunit ./tests/Service/ProductHandlerTest.php
     * @return void
     */
    public function  testDateConversion(){
        $productHandler = new ProductHandler($this->products);
        $products = $productHandler->dateConversion();
        foreach ($products as $product){
            $this->assertTrue($this->isTimestamp($product['create_at']));
        }
    }

    //判断是不是时间戳
    public function isTimestamp(int $timestamp):bool
    {
        if(strtotime(date('Y-m-d H:i:s', $timestamp)) === $timestamp) {
            return true;
        }else{
            return false;
        }
    }



}