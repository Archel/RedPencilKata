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
     * @param float $percent
     * @param \DateTimeInterface $applyDate
     * @param integer $type
     */
    public function __construct(float $percent, \DateTimeInterface $applyDate, int $type)
    {
        if(!in_array($type, [self::RISE, self::REDUCE])) {
            throw new \InvalidArgumentException('Type not valid');
        }

        $this->percent = $percent;
        $this->applyDate = $applyDate;
        $this->type = $type;
    }

    public function percent() : float
    {
        return $this->percent;
    }

    public function applyDate() : \DateTimeInterface
    {
        return $this->applyDate;
    }

    public function type()
    {
        return $this->type;
    }
}