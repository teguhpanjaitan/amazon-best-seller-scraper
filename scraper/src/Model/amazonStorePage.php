<?php

namespace Scraper\Model;

use Sunra\PhpSimple\HtmlDomParser;

class AmazonStorePage
{
    private $elements;
    private $dom;
    private $domain = "https://www.amazon.com";

    public function __construct()
    {
        $this->dom = new HtmlDomParser();
    }

    public function loadPage($url)
    {
        $this->elements = $this->dom->file_get_html($url, false, null, 0);
    }

    public function getNextPageLink()
    {
        $foundElements = $this->elements->find('ul.a-pagination li.a-last a');

        if (empty($foundElements)) {
            return null;
        } else {
            foreach ($foundElements as $element) {
                if (empty($element->href)) {
                    return null;
                } else {
                    return $this->domain . $element->href;
                }
            }
        }
    }

    public function getProductUrls()
    {
        $urls = [];
        $foundElements = $this->elements->find('div.s-result-item div.sg-col-inner h2.s-line-clamp-2 a.a-link-normal');

        if (empty($foundElements)) {
            return null;
        } else {
            foreach ($foundElements as $element) {
                if (!empty($element->href)) {
                    $urls[] = $this->domain . $element->href;
                }
            }
        }

        return $urls;
    }
}
