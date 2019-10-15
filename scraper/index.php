<?php

require "vendor/autoload.php";

use Scraper\Scraper;

define('MAX_FILE_SIZE', 10000000);

$scraper = new Scraper();
$scraper->execute();