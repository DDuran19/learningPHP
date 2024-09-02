<?php

namespace Core;

class Session
{
    public static function start()
    {
        session_start();
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }
    public static function getFlash(string $key, $default = null)
    {

        return $_SESSION['__flash'][$key] ?? $default;
    }
    public static function setOldFlash(string $key, $value)
    {
        return $_SESSION['__flash']['old'][$key] = $value;
    }
    public static function getOldFlash(string $key, $default = null)
    {
        return $_SESSION['__flash']['old'][$key] ?? $default;
    }

    public static function has(string $key)
    {
        return (bool) static::get($key);
    }

    public static function flash(string $key, $value)
    {
        $_SESSION['__flash'][$key] = $value;
    }
    public static function unFlash()
    {
        unset($_SESSION['__flash']);
    }
    public static function flush()
    {
        return $_SESSION = [];
    }

    public static function old(string $key, $default = null)
    {
        return $_SESSION['__flush']['old'][$key] ?? $default;
    }
}
