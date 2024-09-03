<?php

namespace Core\Middlewares;

use Core\App;
use Core\Database;
use Core\Middlewares\Middleware;

class Authenticate extends Middleware
{
    public const handle = [self::class, 'resolve'];
    public static function resolve(array $params = [])
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

        foreach ($params as $param) {
            if (is_callable($param)) {
                call_user_func($param);
            }
        }
    }
}
