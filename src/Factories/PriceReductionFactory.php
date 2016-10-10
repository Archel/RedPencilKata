<?php

namespace Archel\RedPencilKata\Factories;


use Archel\RedPencilKata\Entities\PriceReduction;
use Archel\RedPencilKata\Provider\DateTimeProvider;

class PriceReductionFactory
{
    public function make(float $percent) : PriceReduction
    {
        $dateTimeProvider = new DateTimeProvider();
        return new PriceReduction($percent, $dateTimeProvider->now());
    }
}