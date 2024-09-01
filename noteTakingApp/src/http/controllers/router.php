<?php

$currentPath = getPathname();

$router = requireConstants("routes.php");
$router->render($currentPath);
