<?php

namespace Archel\RedPencilKata\Services\Interfaces;

/**
 * Class PromotionChecker
 *
 * @package Archel\RedPencilKata\Services\Interfaces
 */
interface PromotionChecker
{
    /**
     * @return bool
     */
    public function isPromoted() : bool;
}