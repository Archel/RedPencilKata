<?php

namespace Archel\RedPencilKata\Provider;

use Archel\RedPencilKata\Provider\Interfaces\DateProvider;

/**
 * Class DateTimeTestProvider
 * @package Archel\RedPencilKata\Provider
 */
class DateTimeTestProvider implements DateProvider
{
    /**
     * @return \DateTimeInterface
     */
    public function now() : \DateTimeInterface
    {
        $date = new \DateTime();
        $date->modify('-30 days');

        return $date;
    }
}