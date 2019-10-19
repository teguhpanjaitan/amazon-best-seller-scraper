<?php

namespace Scraper\Model;

use Scraper\Model\AmazonProductPage;
use Scraper\Model\Database;

class ProductLog
{
    private $productPage;

    public function load(AmazonProductPage $productPage)
    {
        $this->productPage = $productPage;
    }

    public function save($productId = 0)
    {
        $price = $this->productPage->getPrice();
        $ratings = $this->productPage->getRatings();
        $avgRating = $this->productPage->getAverageRating();
        $bestSellerRank = $this->productPage->getBestSellerRank();
        $date = date("Y-m-d");

        if ($productId == 0 || empty($productId)) {
            return;
        }

        if (!SILENT) {
            echo "Save product log\r\n";
            var_dump($productId, $price, $bestSellerRank, $ratings, $avgRating, $date);
            echo "\r\n";
        }

        $db = new Database();
        $queryString = "INSERT INTO `product_log` (`product_id`,`price`,`best_seller_rank`,`ratings`,`avg_rating`,`created_on`) ";
        $queryString .= "VALUES (?,?,?,?,?,?)";
        $stm = $db->getMysqlPdo()->prepare($queryString);
        $stm->bindValue(1, $productId);
        $stm->bindValue(2, $price);
        $stm->bindValue(3, $bestSellerRank);
        $stm->bindValue(4, $ratings);
        $stm->bindValue(5, $avgRating);
        $stm->bindValue(6, $date);
        $stm->execute();

        $id = $db->getMysqlPdo()->lastInsertId();
    }
}
