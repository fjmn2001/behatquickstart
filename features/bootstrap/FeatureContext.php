<?php

use Behat\Behat\Context\Context;
use Medine\Behatquickstart\Basket;
use Medine\Behatquickstart\Shelf;
use Webmozart\Assert\Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private Shelf $shelf;
    private Basket $basket;

    public function __construct()
    {
        $this->shelf = new Shelf();
        $this->basket = new Basket($this->shelf);
    }

    /**
     * @Given there is a :product, which costs £:price
     */
    public function thereIsAWhichCostsPs($product, $price): void
    {
        $this->shelf->setProductPrice($product, floatval($price));
    }

    /**
     * @When I add the :product to the basket
     */
    public function iAddTheToTheBasket($product): void
    {
        $this->basket->addProduct($product);
    }

    /**
     * @Then I should have :count product(s) in the basket
     */
    public function iShouldHaveProductInTheBasket($count): void
    {
        Assert::same(
            (int)$count,
            count($this->basket)
        );
    }

    /**
     * @Then the overall basket price should be £:price
     */
    public function theOverallBasketPriceShouldBePs($price): void
    {
        Assert::same(
            (float)$price,
            $this->basket->getTotalPrice()
        );
    }
}
