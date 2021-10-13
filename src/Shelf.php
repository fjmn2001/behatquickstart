<?php

declare(strict_types=1);

namespace Medine\Behatquickstart;

final class Shelf
{
    private array $priceMap = [];

    public function setProductPrice($product, $price): void
    {
        $this->priceMap[$product] = $price;
    }

    public function getProductPrice($product)
    {
        return $this->priceMap[$product];
    }
}