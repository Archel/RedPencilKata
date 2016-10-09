<?php

namespace Archel\RedPencilKata\Services\Interfaces;


use Archel\RedPencilKata\Entities\Product;

interface PriceCalculator
{
    public function calculate(Product $product);
}