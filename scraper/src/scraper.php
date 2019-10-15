<?php

namespace Scraper;

use Scraper\Model\AmazonStorePage;

class Scraper
{
    private $shopUrl = "https://www.amazon.com/s?me=A1MHVA9P45JS92";

    public function execute()
    {
        global $debug;
        $debug = false;
        if (isset($_SERVER['argv'][1])) {
            if ($_SERVER['argv'][1] == "debug") {
                $debug = true;
            }
        }

        $productUrls = $this->getProductUrls();
        $productDatas = $this->getProductPageDatas($productUrls);

        foreach ($productDatas as $val) {
            echo $val;
        }
    }

    private function getProductUrls()
    {
        global $debug;
        $productUrls = [];
        $nextPage = $this->shopUrl;
        $storePage = new AmazonStorePage();

        do {
            $storePage->loadPage($nextPage);

            $productUrls = array_merge($productUrls, $storePage->getProductUrls());
            $nextPage = $storePage->getNextPageLink();

            if ($debug) {
                var_dump($productUrls);
                echo "\r\n";
                echo $nextPage . "\r\n";
                break;
            }
        } while (!empty($nextPage));

        return $productUrls;
    }

    private function getProductPageDatas(array $urls = [])
    {

        foreach($urls as $url){

        }
    }
}
