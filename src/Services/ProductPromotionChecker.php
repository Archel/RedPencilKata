<?php

namespace Archel\RedPencilKata\Services;


use Archel\RedPencilKata\Provider\Interfaces\DateProvider;
use Archel\RedPencilKata\Services\Interfaces\PromotionChecker;

/**
 * Class ProductPromotionChecker
 *
 * @author Daniel J. Pérez <danieljordi@bab-soft.com>
 * @package Archel\RedPencilKata\Services
 */
class ProductPromotionChecker implements PromotionChecker
{

    /**
     *  Constants
     */
    const MAX_PERCENT = 30;
    const MIN_PERCENT = 5;
    const DAYS_FOR_PRICE_STABLE = 30;

    /**
     * @var DateProvider
     */
    protected $dateProvider;

    /**
     * ProductPromotionChecker constructor.
     * @param DateProvider $dateProvider
     */
    public function __construct(DateProvider $dateProvider)
    {
        $this->dateProvider = $dateProvider;
    }

    /**
     * @return bool
     */
    public function isPromoted() : bool
    {
        // TODO: Implement isPromoted() method.
    }
}