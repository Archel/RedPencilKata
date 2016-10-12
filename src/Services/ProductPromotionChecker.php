<?php

namespace Archel\RedPencilKata\Services;


use Archel\RedPencilKata\Entities\PriceChange;
use Archel\RedPencilKata\Entities\Product;
use Archel\RedPencilKata\Provider\Interfaces\DateProvider;
use Archel\RedPencilKata\Services\Interfaces\PromotionChecker;

/**
 * Class ProductPromotionChecker
 *
 * @package Archel\RedPencilKata\Services
 */
class ProductPromotionChecker implements PromotionChecker
{

    /**
     *  Constants
     */
    const MAX_PERCENT = 30;
    const MIN_PERCENT = 5;
    const DAYS_FOR_STABLE_PRICE = 30;

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
     * @param Product $product
     * @return bool
     */
    public function isPromoted(Product $product) : bool
    {
        $priceHistory = $product->priceHistory();
        $lastPriceChange = current($priceHistory);

        if(empty($lastPriceChange)) {
            return false;
        }

        $now = $this->dateProvider->now();
        $date = $lastPriceChange->applyDate();
        $type = $lastPriceChange->type();
        $price = $lastPriceChange->price();

        if($type !== PriceChange::REDUCE) {
            return false;
        }

        $percent = (abs($price - $product->price()) / $price) * 100;

        $days = $now->diff($date)->format("%a");

        if($percent >= static::MIN_PERCENT && $percent <= self::MAX_PERCENT && $days >= self::DAYS_FOR_STABLE_PRICE) {
            return true;
        }

        return false;
    }
}