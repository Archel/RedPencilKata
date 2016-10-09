<?php

namespace Archel\RedPencilKata\Provider;

use Archel\RedPencilKata\Provider\Interfaces\DateProvider;

/**
 * Class DateProvider
 * @package Archel\RedPencilKata\Provider
 */
class DateTimeProvider implements DateProvider
{
    public function now() : \DateTimeInterface
    {
        return new \DateTime();
    }
}