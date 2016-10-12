<?php

namespace Archel\RedPencilKata\Entities;

use Archel\RedPencilKata\Entities\Interfaces\Goods;
use Archel\RedPencilKata\Provider\Interfaces\DateProvider;

/**
 * Class Product
 * @package Archel\RedPencilKata
 */
class Product implements Goods
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var array
     */
    protected $priceHistory;

    /**
     * @var DateProvider
     */
    protected $dateProvider;


    /**
     * Product constructor.
     * @param string $name
     * @param float $price
     * @param DateProvider $dateProvider
     */
    public function __construct(string $name, float $price, DateProvider $dateProvider) {
        $this->price = $price;
        $this->name = $name;
        $this->priceHistory = [];
        $this->dateProvider = $dateProvider;
    }

    /**
     * @return float
     */
    public function price() : float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function name() : string
    {
        return $this->name;
    }

    /**
     * @param float $price
     * @return $this
     */
    public function changePrice(float $price)
    {
        if($price <= 0) {
            throw new \InvalidArgumentException('This value can\'t be lower than 0');
        }

        $type = $this->price < $price ? PriceChange::RISE : PriceChange::REDUCE;
        $this->priceHistory[] = new PriceChange($this->price(), $this->dateProvider->now(), $type);

        $this->price = $price;

        return $this;
    }

    /**
     * @return array
     */
    public function priceHistory() : array
    {
        return $this->priceHistory;
    }
}