<?php

namespace Scraper\Model;

use Sunra\PhpSimple\HtmlDomParser;

class AmazonProductPage
{
    private $elements;
    private $dom;

    public function __construct()
    {
        $this->dom = new HtmlDomParser();
    }

    public function loadPage($url)
    {
        $this->elements = $this->dom->file_get_html($url, false, null, 0);
    }

    public function getTitle()
    {
        $foundElements = $this->elements->find('#productTitle', 0);

        if (empty($foundElements)) {
            return null;
        } else {
            $temp = trim(preg_replace('/\s+/', ' ', $foundElements->plaintext));
            return $temp;
        }
    }

    public function getPrice()
    {
        $foundElements = $this->elements->find('#priceblock_ourprice', 0);

        if (empty($foundElements)) {
            return null;
        } else {
            $temp = trim(preg_replace('/\s+/', ' ', $foundElements->plaintext));
            $temp = str_replace("$","",$temp);
            return $temp;
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
            return null;
        } else {
            $temp = trim(preg_replace('/\s+/', ' ', $foundElements->plaintext));
            return $temp;
        }
    }

    public function getAverageRating()
    {
        $foundElements = $this->elements->find('#acrPopover', 0);

        if (empty($foundElements)) {
            return null;
        } else {
            $temp = trim(preg_replace('/\s+/', ' ', $foundElements->title));
            return $temp;
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
                return $temp;
            }
        }
    }
}
