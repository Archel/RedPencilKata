<?php

namespace Archel\RedPencilKata\Factories;

use Archel\RedPencilKata\Entities\Interfaces\Goods;

/**
 * Interface GoodFactory
 * @package Archel\RedPencilKata\Factories
 */
interface GoodsFactory
{
    public function make(string $name, float $price) : Goods;
}