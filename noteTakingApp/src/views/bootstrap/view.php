<?php

use App\Container;
use App\Database;
use App\App;

$container = new Container();

$container->bind(Database::class, function () {
    return new Database();
});

$db = $container->resolve(Database::class);

App::setContainer($container);
