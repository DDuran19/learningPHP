<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';


$numbers = new Collection([1, 2, 3, 10]);

if ($numbers->contains(10)) {

    die(var_dump($numbers));
}
