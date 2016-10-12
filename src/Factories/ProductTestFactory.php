<?php

namespace Archel\RedPencilKata\Factories;
use Archel\RedPencilKata\Entities\Interfaces\Goods;
use Archel\RedPencilKata\Entities\Product;
use Archel\RedPencilKata\Provider\DateTimeTestProvider;

/**
 * Class ProductTestFactory
 * @package Archel\RedPencilKata\Factories
 */
class ProductTestFactory implements GoodsFactory
{
    /**
     * @param string $name
     * @param float $price
     * @return Goods
     */
    public function make(string $name, float $price) : Goods
    {
        $dateProvider = new DateTimeTestProvider();
        return new Product($name, $price, $dateProvider);
    }
}