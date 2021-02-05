<?php

use App\Core\App;
use App\Core\Connection;
use App\Core\QueryBuilder;

App::bind('config', require '../'.APP_PATH."/config/app.php");

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));
