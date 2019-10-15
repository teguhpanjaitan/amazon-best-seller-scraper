<?php

namespace Scraper\Model;

use Scraper\Model\AmazonProductPage;
use Scraper\Model\Database;

class Product
{
    private $productPage;

    public function load(AmazonProductPage $productPage)
    {
        $this->productPage = $productPage;
    }

    public function save()
    {
        $link = $this->productPage->getUrl();
        $asin = $this->productPage->getASIN();
        $title = $this->productPage->getTitle();
        $price = $this->productPage->getPrice();
        $ratings = $this->productPage->getRatings();
        $avgRating = $this->productPage->getAverageRating();
        $bestSellerRank = $this->productPage->getBestSellerRank();
        $date = date("Y-m-d H:i:s");
        $productId = null;

        $db = new Database();
        $stm = $db->getMysqlPdo()->prepare("SELECT * FROM product WHERE ASIN = ?");
        $stm->bindValue(1, $asin);
        $stm->execute();

        $row = $stm->fetch(\PDO::FETCH_ASSOC);

        if (empty($row)) {
            $queryString = "INSERT INTO `product` (`link`, `ASIN`, `title`, `price`, `best_seller_rank`, `ratings`, `avg_rating`, `created_on`, `updated_on`) ";
            $queryString .= "VALUES (?,?,?,?,?,?,?,?,?)";
            $stm = $db->getMysqlPdo()->prepare($queryString);
            $stm->bindValue(1, $link);
            $stm->bindValue(2, $asin);
            $stm->bindValue(3, $title);
            $stm->bindValue(4, $price);
            $stm->bindValue(5, $bestSellerRank);
            $stm->bindValue(6, $ratings);
            $stm->bindValue(7, $avgRating);
            $stm->bindValue(8, $date);
            $stm->bindValue(9, $date);
            $stm->execute();

            $productId = $db->getMysqlPdo()->lastInsertId();

            if (DEBUG) {
                echo "New product #$productId\r\n";
            }
        } else {
            $queryString = "UPDATE `product` SET `title`=?, `link`=?, `price`=?, `best_seller_rank`=?, `ratings`=?, `avg_rating`=?, `updated_on`=? WHERE `id`=?";
            $stm = $db->getMysqlPdo()->prepare($queryString);
            $stm->bindValue(1, $title);
            $stm->bindValue(2, $link);
            $stm->bindValue(3, $price);
            $stm->bindValue(4, $bestSellerRank);
            $stm->bindValue(5, $ratings);
            $stm->bindValue(6, $avgRating);
            $stm->bindValue(7, $date);
            $stm->bindValue(8, $row['id']);
            $stm->execute();

            $productId = $row['id'];

            if (DEBUG) {
                echo "Update product #$productId\r\n";
            }
        }

        if (DEBUG) {
            var_dump($link, $asin, $title, $price, $ratings, $avgRating, $bestSellerRank, $date);
            echo "\r\n";
        }

        return $productId;
    }
}
