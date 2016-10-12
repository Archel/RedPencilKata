<?php

namespace Archel\RedPencilKata\Tests;

use Archel\RedPencilKata\Entities\Product;
use Archel\RedPencilKata\Factories\CatalogTestFactory;
use Archel\RedPencilKata\Services\Catalog;
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
        $catalogFactory = new CatalogTestFactory();
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
        $this->product->changePrice(2.50);
        $this->assertEquals($this->catalog->isProductPromoted($this->product), true);
    }
}
