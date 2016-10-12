<?php


namespace Archel\RedPencilKata\Factories;


use Archel\RedPencilKata\Provider\DateTimeProvider;
use Archel\RedPencilKata\Provider\DateTimeTestProvider;
use Archel\RedPencilKata\Services\Catalog;
use Archel\RedPencilKata\Services\ProductPromotionChecker;
use Archel\RedPencilKata\Services\PromotionPriceCalculator;

class CatalogTestFactory
{
    public function make()
    {
        $dateProvider = new DateTimeProvider();
        $productFactory = new ProductTestFactory();
        $priceCalculator = new PromotionPriceCalculator();
        $promotionChecker = new ProductPromotionChecker($dateProvider);

        return new Catalog($productFactory, $priceCalculator, $dateProvider, $promotionChecker);
    }
}