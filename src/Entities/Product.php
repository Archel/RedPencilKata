<?php

namespace Archel\RedPencilKata\Entities;

/**
 * Class Product
 * @package Archel\RedPencilKata
 */
class Product
{
    /**
     * @var
     */
    protected $price;

    protected $pricesReduction;

    /**
     * Product constructor.
     * @param float $price
     */
    public function __construct(float $price) {
        $this->price = $price;
        $this->pricesReduction = [];
    }

    public function price()
    {
        return $this->price;
    }

    /**
     * @param int $priceReductionPercent
     */
    public function addPriceReduction(int $priceReductionPercent)
    {

    }
}