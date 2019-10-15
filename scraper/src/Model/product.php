<?php

namespace Scraper\Model;

use Scraper\Model\AmazonProductPage;

class Product
{
    private $productPage;

    public function load(AmazonProductPage $productPage)
    {
        $this->productPage = $productPage;
    }

    public function update()
    {
        $asin = $this->productPage->getASIN();
        $title = $this->productPage->getTitle();
        $price = $this->productPage->getPrice();
        $ratings = $this->productPage->getRatings();
        $avgRating = $this->productPage->getAverageRating();

        var_dump($asin,$title,$price,$ratings,$avgRating);
    }
}
