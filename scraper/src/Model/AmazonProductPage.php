<?php

namespace Scraper\Model;

use Sunra\PhpSimple\HtmlDomParser;

class AmazonProductPage
{
    private $elements;
    private $dom;
    private $url;

    public function __construct()
    {
        $this->dom = new HtmlDomParser();
    }

    public function loadPage($url)
    {
        global $config;
        $stream = null;
        $this->url = $url;
        $proxy = new \Scraper\Helper\Proxy();

        if ($config->proxy->get("force", false) && empty($stream)) {
            $stream = $proxy->rotate();
        }

        $this->elements = $this->dom->file_get_html($url, false, $stream, 0);

        $title = $this->elements->find('title', 0)->plaintext;
        if (strpos(strtolower($title), 'sorry') !== false) {
            $stream = $proxy->rotate();
            $this->elements = $this->dom->file_get_html($url, false, $stream, 0);
        }
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getTitle()
    {
        $foundElements = $this->elements->find('#productTitle', 0);

        if (empty($foundElements)) {
            return null;
        } else {
            $temp = $this->removeSpaceFromWord($foundElements->plaintext);
            return $temp;
        }
    }

    public function getPrice()
    {
        $foundElements = $this->elements->find('#priceblock_ourprice', 0);

        if (empty($foundElements)) {
            $foundElements = $this->elements->find('#priceblock_saleprice', 0);

            if (empty($foundElements)) {
                return 0;
            } else {
                $temp = $this->removeSpaceFromWord($foundElements->plaintext);
                $temp = str_replace("$", "", $temp);
                return doubleval($temp);
            }
        } else {
            $temp = $this->removeSpaceFromWord($foundElements->plaintext);
            $temp = str_replace("$", "", $temp);
            return doubleval($temp);
        }
    }

    public function getASIN()
    {
        $foundElements = $this->elements->find('#productDetails_detailBullets_sections1 tbody tr td', 4);

        if (empty($foundElements)) {
            return null;
        } else {
            $temp = preg_replace('/\s+/', '', $foundElements->plaintext);
            return $temp;
        }
    }

    public function getRatings()
    {
        $foundElements = $this->elements->find('#acrCustomerReviewText', 0);

        if (empty($foundElements)) {
            return 0;
        } else {
            $temp = $this->removeSpaceFromWord($foundElements->plaintext);
            return $this->getRatingsValue($temp);
        }
    }

    private function removeSpaceFromWord($word)
    {
        return trim(preg_replace('/\s+/', ' ', $word));
    }

    private function getRatingsValue($word = "")
    {
        $temp = explode(" ", $word);
        if (isset($temp[0])) {
            return intval($temp[0]);
        } else {
            return 0;
        }
    }

    public function getAverageRating()
    {
        $foundElements = $this->elements->find('#acrPopover', 0);

        if (empty($foundElements)) {
            return 0;
        } else {
            $temp = trim(preg_replace('/\s+/', ' ', $foundElements->title));
            return $this->getAverageRatingValue($temp);
        }
    }

    private function getAverageRatingValue($word = "")
    {
        $temp = explode(" ", $word);
        if (isset($temp[0])) {
            return floatval($temp[0]);
        } else {
            return floatval(0);
        }
    }

    public function getBestSellerRank()
    {
        $foundElements = $this->elements->find('#productDetails_detailBullets_sections1 tbody tr td', 7);

        if (empty($foundElements)) {
            return null;
        } else {
            $foundElements = $foundElements->find("span span", 0);

            if (empty($foundElements)) {
                return null;
            } else {
                $temp = trim(preg_replace('/\s+/', ' ', $foundElements->plaintext));
                return $this->getBestSellerRankValue($temp);
            }
        }
    }

    private function getBestSellerRankValue($word = "")
    {
        $temp = explode(" ", str_replace("#", "", $word));
        if (isset($temp[0])) {
            return intval($temp[0]);
        } else {
            return 0;
        }
    }
}
