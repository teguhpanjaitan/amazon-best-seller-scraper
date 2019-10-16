<?php

namespace Scraper;

class Config
{
    public function get()
    {
        return [
            'database' => [
                'host'     => 'localhost',
                'username' => 'root',
                'password' => '',
                'dbname'   => 'scraper',
            ],
            'useragents' => [
                'default' => 'Mozilla/5.0 (Linux; Android 7.0; SM-A520F Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/65.0.3325.109 Mobile Safari/537.36',
                'chrome' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.79 Safari/537.36'
            ]
        ];
    }
}
