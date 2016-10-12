<?php

namespace Archel\RedPencilKata\Services;

use Archel\RedPencilKata\Entities\Interfaces\Goods;
use Archel\RedPencilKata\Entities\Product;
use Archel\RedPencilKata\Factories\GoodsFactory;
use Archel\RedPencilKata\Provider\Interfaces\DateProvider;
use Archel\RedPencilKata\Services\Interfaces\PriceCalculator;

/**
 * Class Catalog
 * @package Archel\RedPencilKata\Services
 */
class Catalog
{
    /**
     * @var GoodsFactory
     */
    protected $goodsFactory;

    /**
     * @var PriceCalculator
     */
    protected $priceCalculator;

    /**
     * @var array
     */
    protected $products;

    /**
     * @var DateProvider
     */
    protected $dateProvider;


    /**
     * Catalog constructor.
     * @param GoodsFactory $goodsFactory
     * @param PriceCalculator $priceCalculator
     * @param DateProvider $dateProvider
     */
    public function __construct(GoodsFactory $goodsFactory, PriceCalculator $priceCalculator, DateProvider $dateProvider)
    {
        $this->goodsFactory = $goodsFactory;
        $this->priceCalculator = $priceCalculator;
        $this->products = [];
        $this->dateProvider = $dateProvider;
    }

    /**
     * @param string $name
     * @param float $price
     * @return Goods
     */
    public function addProductToCatalog(string $name, float $price) : Goods
    {
        $product = $this->goodsFactory->make($name, $price);
        $this->products[] = $product;

        return $product;
    }

    /**
     * @param Product $product
     * @return mixed
     */
    public function calculatePrice(Product $product) : float
    {
        return $this->priceCalculator->calculate($product);
    }
}