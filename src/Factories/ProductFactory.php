<?php

namespace Archel\RedPencilKata\Factories;

use Archel\RedPencilKata\Entities\Interfaces\Goods;
use Archel\RedPencilKata\Entities\Product;
use Archel\RedPencilKata\Provider\DateTimeProvider;

/**
 * Class ProductFactory
 *
 * @package Archel\RedPencilKata\Factories
 */
class ProductFactory implements GoodsFactory
{
    /**
     * @param string $name
     * @param float $price
     * @return Goods
     */
    public function make(string $name, float $price) : Goods
    {
        $dateProvider = new DateTimeProvider();
        return new Product($name, $price, $dateProvider);
    }
}