<?php

namespace Archel\RedPencilKata\Entities\Interfaces;

/**
 * Interface GoodInterface
 */
interface Goods
{
    /**
     * @return string
     */
    public function name() : string;

    /**
     * @return float
     */
    public function price() : float;
}