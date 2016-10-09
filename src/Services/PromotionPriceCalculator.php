<?php

namespace Archel\RedPencilKata\Services;

use Archel\RedPencilKata\Entities\Product;
use Archel\RedPencilKata\Services\Interfaces\PriceCalculator;

class PromotionPriceCalculator implements PriceCalculator
{

    public function calculate(Product $product)
    {
        $price = $product->price();

        if($priceReductions = $product->priceReductions()) {
            foreach($priceReductions as $priceReduction) {
                $price = $price / (1 + ($priceReduction['percent'] / 100));
            }
        }

        return round($price, 2);
    }
}