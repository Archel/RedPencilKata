<?php

namespace Archel\RedPencilKata\Tests;

use Archel\RedPencilKata\Entities\Product;
use Archel\RedPencilKata\Services\PromotionPriceCalculator;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductTest
 * @package Archel\RedPencilKata\Tests
 */
class ProductTest extends TestCase
{
    protected $product;

    public function setUp()
    {
        $this->product = new Product(3);
    }

    /**
     * @return bool
     * @test
     */
    public function productIsPromoted()
    {
        $priceCalculator = new PromotionPriceCalculator();
        $this->assertEquals($priceCalculator->calculate($this->product), 3);
    }
}
