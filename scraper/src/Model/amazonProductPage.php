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

    public function getASIN()
    {
        $foundElements = $this->elements->find('div.s-result-item div.sg-col-inner h2.s-line-clamp-2 a.a-link-normal', 0);

        if (empty($foundElements)) {
            return null;
        } else {
            return $foundElements->plaintext;
        }
    }

    public function getTitle()
    {
        $foundElements = $this->elements->find('div.s-result-item div.sg-col-inner h2.s-line-clamp-2 a.a-link-normal', 0);

        if (empty($foundElements)) {
            return null;
        } else {
            return $foundElements->plaintext;
        }
    }

    public function getPrice()
    {
        $foundElements = $this->elements->find('div.s-result-item div.sg-col-inner h2.s-line-clamp-2 a.a-link-normal', 0);

        if (empty($foundElements)) {
            return null;
        } else {
            return $foundElements->plaintext;
        }
    }

    public function getRatings()
    {
        $foundElements = $this->elements->find('div.s-result-item div.sg-col-inner h2.s-line-clamp-2 a.a-link-normal', 0);

        if (empty($foundElements)) {
            return null;
        } else {
            return $foundElements->plaintext;
        }
    }

    public function getAverageRating()
    {
        $foundElements = $this->elements->find('div.s-result-item div.sg-col-inner h2.s-line-clamp-2 a.a-link-normal', 0);

        if (empty($foundElements)) {
            return null;
        } else {
            return $foundElements->plaintext;
        }
    }
}
