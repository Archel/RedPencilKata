<?php

namespace Archel\RedPencilKata\Tests;

use Archel\RedPencilKata\Entities\Product;
use Archel\RedPencilKata\Provider\DateTimeProvider;
use Archel\RedPencilKata\Services\Interfaces\PriceCalculator;
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

    public function setUp()
    {
        $this->product = new Product(3, new DateTimeProvider());
        $this->priceCalculator = new PromotionPriceCalculator();
    }

    /**
     * @test
     */
    public function productPriceWithNoReduction()
    {
        $this->assertEquals($this->priceCalculator->calculate($this->product), 3);
    }

    /**
     * @test
     */
    public function productPriceWithReduction()
    {
        $this->product->addPriceReduction(20);

        $this->assertEquals($this->priceCalculator->calculate($this->product), 2.50);
    }
}
