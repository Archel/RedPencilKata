<?php

namespace Archel\RedPencilKata\Tests;

use Archel\RedPencilKata\Entities\Product;
use Archel\RedPencilKata\Factories\PriceReductionFactory;
use Archel\RedPencilKata\Factories\ProductFactory;
use Archel\RedPencilKata\Provider\DateTimeProvider;
use Archel\RedPencilKata\Services\Interfaces\PriceCalculator;
use Archel\RedPencilKata\Services\ProductPromotionChecker;
use Archel\RedPencilKata\Services\PromotionPriceCalculator;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductTest
 * @package Archel\RedPencilKata\Tests
 */
class ProductTest extends TestCase
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * @var PriceCalculator
     */
    protected $priceCalculator;

    protected $promotionChecker;

    public function setUp()
    {
        $productFactory = new ProductFactory();
        $this->product = $productFactory->make(3);
        $this->priceCalculator = new PromotionPriceCalculator();
        $this->promotionChecker = new ProductPromotionChecker(new DateTimeProvider());
    }

    private function reduceProductPrice()
    {
        $priceReductionFactory = new PriceReductionFactory();
        $priceReduction = $priceReductionFactory->make(20);
        $this->product->addPriceReduction($priceReduction);
    }

    /**
     * @test
     */
    public function productPriceWithNoReduction()
    {
        $this->reduceProductPrice();
        $this->assertEquals($this->priceCalculator->calculate($this->product), 3);
    }

    /**
     * @test
     */
    public function productPriceWithReduction()
    {
        $this->assertEquals($this->priceCalculator->calculate($this->product), 2.50);
    }

    public function productIsPromoted()
    {
        $this->reduceProductPrice();

        $this->assertEquals($this->promotionChecker->isPromoted(), true);
    }
}
