<?php

use App\Core\{Request, Router};

require_once dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/core/bootstrap.php';

try {
    Router::load(ROUTE_PATH)
        ->direct(Request::uri(), Request::method());
} catch (\Throwable $th) {
    echo $th->getMessage() . PHP_EOL;
}
