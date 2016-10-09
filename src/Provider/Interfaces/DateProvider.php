<?php

namespace Archel\RedPencilKata\Provider\Interfaces;

/**
 * Interface DateProvider
 * @package Archel\RedPencilKata\Provider\Interfaces
 */
interface DateProvider
{
    /**
     * @return mixed
     */
    public function now() : \DateTimeInterface;
}