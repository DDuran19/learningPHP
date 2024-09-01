<?php

namespace Middlewares;

use App\App;
use App\Database;
use Middlewares\Middleware;

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
