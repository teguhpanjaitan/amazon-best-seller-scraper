<?php

namespace Scraper\Model;

use Sunra\PhpSimple\HtmlDomParser;

class AmazonProductPage
{
    private $elements;
    private $dom;

    public function __construct() {
        $this->dom = new HtmlDomParser();
    }

    public function getPage($url)
    {
        $this->elements = $this->dom->file_get_html($url, false, null, 0);
    }

    public function getASIN()
    {
        echo "run scraper";
    }

    public function getTitle()
    {
        echo "run scraper";
    }

    public function getPrice()
    {
        echo "run scraper";
    }

    public function getRatings()
    {
        echo "run scraper";
    }

    public function getAverageRating()
    {
        echo "run scraper";
    }
}
