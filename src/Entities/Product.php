<?php

namespace Archel\RedPencilKata\Entities;
use Archel\RedPencilKata\Provider\Interfaces\DateProvider;

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
     * @var \DateTime|null
     */
    protected $lastPriceUpdate;

    /**
     * @var DateProvider
     */
    protected $dateProvider;

    /**
     * Product constructor.
     * @param float $price
     * @param DateProvider $dateProvider
     */
    public function __construct(float $price, DateProvider $dateProvider) {
        $this->price = $price;
        $this->pricesReduction = [];
        $this->lastPriceUpdate = null;
        $this->dateProvider = $dateProvider;
    }

    /**
     * @return float
     */
    public function price()
    {
        return $this->price;
    }

    /**
     * @param float $priceReductionPercent
     */
    public function addPriceReduction(float $priceReductionPercent)
    {
        if($priceReductionPercent > 100) {
            throw new \InvalidArgumentException('This value can\'t be greater than 100');
        }

        $this->lastPriceUpdate = $this->dateProvider->now();

        $this->pricesReduction[] = [
            'percent' => $priceReductionPercent,
            'date' => $this->dateProvider->now()
        ];
    }

    public function priceReductions()
    {
        if(count($this->pricesReduction) === 0) {
            return null;
        }

        return $this->pricesReduction;
    }
}