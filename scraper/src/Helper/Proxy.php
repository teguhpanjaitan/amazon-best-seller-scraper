<?php

namespace Scraper\Helper;

use Sunra\PhpSimple\HtmlDomParser;
use Scraper\Config;

class Proxy
{
    private $dom;

    public function __construct()
    {
        $this->dom = new HtmlDomParser();
    }

    public function rotate()
    {
        global $config;

        $result = json_decode(file_get_contents($config->proxy->get("API", "")));
        $context = [
            'http' => [
                'proxy' => 'tcp://' . $result->proxy,
                'user_agent' => $result->randomUserAgent,
                'request_fulluri' => true
            ]
        ];
        $stream = stream_context_create($context);

        if (DEBUG) {
            echo "Rotate proxy and use $result->proxy\r\n";
        }

        return $stream;
    }
}
