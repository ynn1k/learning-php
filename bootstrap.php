<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function () {
    $cfg = require base_path('config.php');
    return new Database($cfg['database']);
});

App::setContainer($container);
