<?php

namespace Archel\RedPencilKata\Services;

use Archel\RedPencilKata\Entities\Product;
use Archel\RedPencilKata\Services\Interfaces\PriceCalculator;

class PromotionPriceCalculator implements PriceCalculator
{

    public function calculate(Product $product)
    {
        return $product->price();
    }
}