<?php

namespace Archel\RedPencilKata\Entities;

/**
 * Class PriceReduction
 *
 * @package Archel\RedPencilKata\Entities
 */
class PriceReduction
{
    /**
     * @var float
     */
    protected $percent;

    /**
     * @var \DateTimeInterface
     */
    protected $applyDate;

    /**
     * PriceReduction constructor.
     * @param float $percent
     * @param \DateTimeInterface $applyDate
     */
    public function __construct(float $percent, \DateTimeInterface $applyDate)
    {
        $this->percent = $percent;
        $this->applyDate = $applyDate;
    }
}