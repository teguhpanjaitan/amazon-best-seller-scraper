<?php

namespace Scraper;

use Scraper\Model\AmazonStorePage;
use Scraper\Model\AmazonProductPage;
use Scraper\Model\Product;
use Scraper\Model\ProductLog;

class Scraper
{
    private $shopUrl = "https://www.amazon.com/s?me=A1MHVA9P45JS92";

    public function execute()
    {
        if (isset($_SERVER['argv'][1])) {
            if ($_SERVER['argv'][1] == "debug") {
                define('DEBUG', true);
            }
            else{
                define('DEBUG', false);
            }
        }
        else{
            define('DEBUG', false);
        }

        $productUrls = $this->getProductUrls();
        $this->updateData($productUrls);
    }

    private function getProductUrls()
    {
        $productUrls = [];
        $nextPage = $this->shopUrl;
        $storePage = new AmazonStorePage();

        do {
            $storePage->loadPage($nextPage);

            $productUrls = array_merge($productUrls, $storePage->getProductUrls());
            $nextPage = $storePage->getNextPageLink();

            if (DEBUG) {
                var_dump($productUrls);
                echo "\r\n";
                echo $nextPage . "\r\n";
                break;
            }
        } while (!empty($nextPage));

        return $productUrls;
    }

    private function updateData(array $urls = [])
    {
        $productPage = new AmazonProductPage();
        $product = new Product();
        $productLog = new ProductLog();

        foreach($urls as $url){
            $productPage->loadPage($url);
            
            $product->load($productPage);
            $productLog->load($productPage);

            $product->update();
            $productLog->update();

            if (DEBUG) {
                var_dump($url);
                echo "\r\n";
                break;
            }
        }
    }
}
