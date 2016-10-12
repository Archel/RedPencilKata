<?php

namespace Archel\RedPencilKata\Services\Interfaces;
use Archel\RedPencilKata\Entities\Product;

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
    public function isPromoted(Product $product) : bool;
}