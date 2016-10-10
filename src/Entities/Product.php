<?php

namespace Archel\RedPencilKata\Entities;

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
     * @param PriceReduction $priceReduction
     * @throws \InvalidArgumentException
     */
    public function addPriceReduction(PriceReduction $priceReduction)
    {
        if($priceReduction->percent() > 100) {
            throw new \InvalidArgumentException('This value can\'t be greater than 100');
        }

        $this->pricesReduction[] = $priceReduction;
    }

    /**
     * @return array
     */
    public function priceReductions() : array
    {
        if(count($this->pricesReduction) === 0) {
            return null;
        }

        return $this->pricesReduction;
    }
}