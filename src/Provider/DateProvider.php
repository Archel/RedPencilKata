<?php

namespace Archel\RedPencilKata\Provider;

/**
 * Class DateProvider
 * @package Archel\RedPencilKata\Provider
 */
class DateProvider
{
    public function now()
    {
        return new \DateTime();
    }
}