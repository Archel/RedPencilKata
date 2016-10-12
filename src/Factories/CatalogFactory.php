<?php


namespace Archel\RedPencilKata\Factories;


use Archel\RedPencilKata\Provider\DateTimeProvider;
use Archel\RedPencilKata\Services\Catalog;
use Archel\RedPencilKata\Services\PromotionPriceCalculator;

/**
 * Class CatalogFactory
 * @package Archel\RedPencilKata\Factories
 */
class CatalogFactory
{
    public function make()
    {
        $dateProvider = new DateTimeProvider();
        $productFactory = new ProductFactory();
        $priceCalculator = new PromotionPriceCalculator();

        return new Catalog($productFactory, $priceCalculator, $dateProvider);
    }
}