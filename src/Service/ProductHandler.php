<?php

namespace App\Service;

class ProductHandler
{
    private $products;
    const PRODUCT_TYPE_DESSERT = 'Dessert';

    public function __construct($products)
    {
        $this->products = $products;
    }

    /**
     * 计算商品总金额
     * @return int|mixed
     */
    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }
        return $totalPrice;
    }


    /**
     * 商品 金额排序并筛选
     * @return array
     */
    public function sortDessert():array
    {
        $productsDessert = [];

        $productsSorted = $this->quickSort($this->products);

        //筛选Dessert商品
        foreach ($productsSorted as $product) {
            if($product['type'] == self::PRODUCT_TYPE_DESSERT){
                $productsDessert[] = $product;
            }
        }

        return $productsDessert;
    }

    /**
     * 商品 日期转换为unix timestamp
     * @return mixed
     */
    public  function dateConversion(){
        foreach ($this->products as &$product) {
            $product['create_at'] = strtotime($product['create_at']);
        }
        return $this->products;
    }

    /**
     * 快速排序
     * @param $arr
     * @return mixed
     */
    function quickSort($arr)
    {
        #判断是否继续
        if (count($arr) <= 1) {
            return $arr;
        }
        //选择第一个元素作为基准
        $baseValue = $arr[0];

        //设置所有两个空数组
        $left = [];
        $right = [];

        for ($i = 1; $i < count($arr); $i++) {
            if ($baseValue['price'] >= $arr[$i]['price']) {
                //放入右侧数组
                $right[] = $arr[$i];
            } else {
                //放入左侧数组
                $left[] = $arr[$i];
            }
        }
        //递归排序两边数组
        $left = self::quickSort($left);
        $right = self::quickSort($right);
        // 合并排序后的数据，别忘了合并中间值
        return array_merge($left, array($baseValue), $right);
    }

}