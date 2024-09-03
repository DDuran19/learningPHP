<?php

use Core\Response;
use Core\Router;

function dd($var = null)
{
    echo "<pre>";
    // $var ? 
    var_dump($var);
    //  : var_dump($_SERVER);
    echo "</pre>";
    die();
};

function getUri(): string
{
    return $_SERVER['REQUEST_URI'];
};
function getPathname(): string
{
    return parse_url(getUri(), PHP_URL_PATH);
};
function authorize(bool $condition, $statusCode = Response::FORBIDDEN): void
{
    if (!$condition) {

        Router::abort($statusCode);
    }
}
function getValueIfKeyExists($array, $key)
{
    return $array[$key] ?? '';
}

function renderView(string $view, array $data = [], bool $exit = false)
{
    extract($data);
    require VIEWS . $view . '/view.php';
    if ($exit) {
        return exit();
    }
}
function redirect(string $path)
{
    header("Location: $path");
    exit();
}
