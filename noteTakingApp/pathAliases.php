<?php

define('ROOT_DIR', __DIR__);
define('SOURCE', ROOT_DIR . "/src");
define('CONTROLLERS', SOURCE . "/http/controllers/");
define('VIEWS', SOURCE . "/views/");
define('COMPONENTS', SOURCE . "/components/");
define('CONSTANTS', SOURCE . "/constants/");
define('VALIDATORS', SOURCE . "/utils/validators/");

function requireControllers(string $path, array $vars = [])
{
    extract($vars);
    return require(CONTROLLERS . $path);
}
/**
 * Requires a component file and extracts variables.
 * 
 * @param string $path The path to the component file.
 * @param array $vars An associative array of variables to extract into the component.
 * 
 * @return mixed
 */
function requireComponents(string $path, array $vars = [])
{
    extract($vars);
    return require(COMPONENTS . $path);
}

function requireConstants(string $path, array $vars = [])
{
    extract($vars);
    return require(CONSTANTS . $path);
}

function requireValidators(string $path, array $vars = [])
{
    extract($vars);
    return require(VALIDATORS . $path);
}
function requireClasses()
{
    spl_autoload_register(function ($class) {

        $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
        require(SOURCE . "/namespaces/" . $class . ".php");
    });
}
