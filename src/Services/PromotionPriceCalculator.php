<?php

namespace Archel\RedPencilKata\Services;

use Archel\RedPencilKata\Entities\Product;
use Archel\RedPencilKata\Services\Interfaces\PriceCalculator;

/**
 * Class PromotionPriceCalculator
 *
 * @package Archel\RedPencilKata\Services
 */
class PromotionPriceCalculator implements PriceCalculator
{

    /**
     * @param Product $product
     * @return float
     */
    public function calculate(Product $product) : float
    {
        $price = $product->price();

        return round($price, 2);
    }
}