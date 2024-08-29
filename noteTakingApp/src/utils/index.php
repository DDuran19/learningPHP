<?php

use App\Response;

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
function authorize($condition, $statusCode = Response::FORBIDDEN): void
{
    if (!$condition) {

        abort($statusCode);
    }
}
function getValueIfKeyExists($array, $key)
{
    return $array[$key] ?? '';
}
