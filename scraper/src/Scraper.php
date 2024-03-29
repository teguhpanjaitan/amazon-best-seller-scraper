<?php

namespace Scraper;

use Scraper\Model\AmazonStorePage;
use Scraper\Model\AmazonProductPage;
use Scraper\Model\Product;
use Scraper\Model\ProductLog;

class Scraper
{
    public function __construct(){
        global $config;
        $tempConfig = new \Scraper\Config();
        $config = new \Zend\Config\Config($tempConfig->get());
    }

    public function execute()
    {
        $mode = getopt("m:");

        if (count($mode) != 0) {
            if (strtolower($mode['m']) == "silent") {
                define('SILENT', true);
            }
            else{
                define('SILENT', false);
            }
        }
        else{
            define('SILENT', false);
        }

        $productUrls = $this->getProductUrls();
        $this->updateData($productUrls);

        echo "Done\r\n";
    }

    private function getProductUrls()
    {
        global $config;
        $productUrls = [];
        $nextPage = $config->storeurl;
        $storePage = new AmazonStorePage();

        do {
            $storePage->loadPage($nextPage);

            $productUrls = array_merge($productUrls, $storePage->getProductUrls());
            $nextPage = $storePage->getNextPageLink();

            if (!SILENT) {
                echo $nextPage . "\r\n";
                // break;
            }
        } while (!empty($nextPage));

        if (!SILENT) {
            echo "All URL\r\n";
            var_dump($productUrls);
            echo "\r\n";
        }

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

            $productId = $product->save();
            $productLog->save($productId);

            if (!SILENT) {
                echo "Finish proceed URL\r\n";
                var_dump($url);
                echo "\r\n";
                // break;
            }
        }
    }
}
