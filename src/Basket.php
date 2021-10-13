<?php

declare(strict_types=1);

namespace Medine\Behatquickstart;

use Countable;

final class Basket implements Countable
{
    private array $products;
    private float $productsPrice = 0.0;

    public function __construct(
        private Shelf $shelf
    )
    {
    }

    public function addProduct($product): void
    {
        $this->products[] = $product;
        $this->productsPrice += $this->shelf->getProductPrice($product);
    }

    public function getTotalPrice(): float
    {
        return $this->productsPrice
            + ($this->productsPrice * 0.2)
            + ($this->productsPrice > 10 ? 2.0 : 3.0);
    }

    public function count(): int
    {
        return count($this->products);
    }
}