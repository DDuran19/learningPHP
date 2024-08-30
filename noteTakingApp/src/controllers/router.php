<?php

// use App\Response;

$currentPath = getPathname();

$router = requireConstants("routes.php");
$router->render($currentPath);

// $routes = require(CONSTANTS . "routes.php");
// function routeToController($currentPath, $routes)
// {
//     if (array_key_exists($currentPath, $routes)) {
//         return ROOT_DIR . $routes[$currentPath];
//     } else {
//         abort();
//     }
// }
// function abort($code = 404)
// {
//     http_response_code($code);
//     routeError($code);
//     die();
// };

// function routeError($code = 404)
// {
//     $errorRoutes = [
//         Response::FORBIDDEN => "/routes/errors/403.php",
//         Response::NOT_FOUND => "/routes/errors/404.php",
//     ];
//     if (array_key_exists($code, $errorRoutes)) {
//         require(ROOT_DIR . $errorRoutes[$code]);
//     } else {
//         require(ROOT_DIR . "/routes/errors/404.php");
//     }
// }
// $pathExists = array_key_exists($currentPath, $routes);

// require(routeToController($currentPath, $routes));
