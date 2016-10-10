<?php

namespace Archel\RedPencilKata\Entities;
use Archel\RedPencilKata\Factories\PriceReductionFactory;

/**
 * Class Product
 * @package Archel\RedPencilKata
 */
class Product
{
    /**
     * @var float
     */
    protected $price;

    /**
     * @var array
     */
    protected $pricesReduction;

    /**
     * Product constructor.
     * @param float $price
     */
    public function __construct(float $price) {
        $this->price = $price;
        $this->pricesReduction = [];
    }

    /**
     * @return float
     */
    public function price() : float
    {
        return $this->price;
    }

    /**
     * @param float $priceReductionPercent
     * @throws \InvalidArgumentException
     */
    public function addPriceReduction(float $priceReductionPercent)
    {
        if($priceReductionPercent > 100) {
            throw new \InvalidArgumentException('This value can\'t be greater than 100');
        }

        $priceReductionFactory = new PriceReductionFactory();
        $this->pricesReduction[] = $priceReductionFactory->make($priceReductionPercent);
    }

    public function priceReductions() : array
    {
        if(count($this->pricesReduction) === 0) {
            return null;
        }

        return $this->pricesReduction;
    }
}