<?php

namespace Scraper;

class Config
{
    public function get()
    {
        return [
            'database' => [
                'params'  => [
                    'host'     => 'localhost',
                    'username' => 'root',
                    'password' => '',
                    'dbname'   => 'scraper',
                ],
            ],
        ];
    }
}
