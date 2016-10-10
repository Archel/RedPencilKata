<?php

namespace Archel\RedPencilKata\Factories;

use Archel\RedPencilKata\Entities\Product;
use Archel\RedPencilKata\Provider\DateTimeProvider;

/**
 * Class ProductFactory
 *
 * @author Daniel J. Pérez <danieljordi@bab-soft.com>
 * @package Archel\RedPencilKata\Factories
 */
class ProductFactory
{
    /**
     * @param float $price
     * @return Product
     */
    public function make(float $price) : Product
    {
        return new Product($price);
    }
}