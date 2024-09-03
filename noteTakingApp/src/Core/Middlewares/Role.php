<?php

namespace Core\Middlewares;

use Core\Middlewares\Middleware;

class Role extends Middleware
{
    public const handle = [self::class, 'resolve'];

    public static function resolve(array $params = [])
    {
        $hasCookies = $_SESSION['user'] ?? false;
        if ($params['role'] === "guest" && $hasCookies) {
            header("Location: {$params['path']}");
            exit();
        }
    }
}
