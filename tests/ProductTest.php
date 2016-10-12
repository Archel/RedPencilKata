<?php

namespace Archel\RedPencilKata\Tests;

use Archel\RedPencilKata\Entities\Product;
use Archel\RedPencilKata\Factories\CatalogFactory;
use Archel\RedPencilKata\Factories\PriceReductionFactory;
use Archel\RedPencilKata\Factories\ProductFactory;
use Archel\RedPencilKata\Provider\DateTimeProvider;
use Archel\RedPencilKata\Services\Catalog;
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
     * @var Catalog
     */
    protected $catalog;

    /**
     * @var Product
     */
    protected $product;

    public function setUp()
    {
        $catalogFactory = new CatalogFactory();
        $this->catalog = $catalogFactory->make();
        $this->product = $this->catalog->addProductToCatalog('red pencil', 3);
    }

    /**
     * @test
     */
    public function productPriceWithNoReduction()
    {
        $this->assertEquals($this->catalog->calculatePrice($this->product), 3);
    }

    /**
     * @test
     */
    public function productPriceWithReduction()
    {

        $this->product->changePrice(2.50);
        $this->assertEquals($this->catalog->calculatePrice($this->product), 2.50);
    }

    /**
     * @test
     */
    public function productIsPromoted()
    {
        $this->assertEquals($this->catalog->isPromoted(), true);
    }
}
