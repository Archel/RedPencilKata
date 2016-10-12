<?php

namespace Archel\RedPencilKata\Entities;

/**
 * Class PriceReduction
 *
 * @package Archel\RedPencilKata\Entities
 */
class PriceChange
{
    /**
     * Constants
     */
    const RISE = 1;

    const REDUCE = 2;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var \DateTimeInterface
     */
    protected $applyDate;

    /**
     * @var int
     */
    protected $type;

    /**
     * PriceReduction constructor.
     * @param float $price
     * @param \DateTimeInterface $applyDate
     * @param integer $type
     */
    public function __construct(float $price, \DateTimeInterface $applyDate, int $type)
    {
        if(!in_array($type, [self::RISE, self::REDUCE])) {
            throw new \InvalidArgumentException('Type not valid');
        }

        $this->price = $price;
        $this->applyDate = $applyDate;
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function price() : float
    {
        return $this->price;
    }

    /**
     * @return \DateTimeInterface
     */
    public function applyDate() : \DateTimeInterface
    {
        return $this->applyDate;
    }

    /**
     * @return int
     */
    public function type()
    {
        return $this->type;
    }
}