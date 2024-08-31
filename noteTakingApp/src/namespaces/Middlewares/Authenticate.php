<?php

namespace Middlewares;

use App\App;
use App\Database;
use Middlewares\Middleware;

class Authenticate extends Middleware
{
    public const run = [self::class, 'resolve'];
    public static function resolve(mixed $optionalCallback = null)
    {
        $user = $_SESSION['user'] ?? null;

        if (!isset($user)) {
            header("Location: /login");
            exit();
        }

        $db = App::resolve(Database::class);
        $user = $db->query("SELECT * FROM users WHERE id = :id", [
            'id' => $user,
        ])->fetch();
        if (!$user || !isset($user)) {
            header("Location: /login");
            exit();
        }
        unset($user['password']);

        $_SESSION['userDetails'] = $user;

        if (is_callable($optionalCallback)) {
            call_user_func($optionalCallback);
        }
    }
}
