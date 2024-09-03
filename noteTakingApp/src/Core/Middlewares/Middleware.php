<?php

namespace Core\Middlewares;

class Middleware
{
    public const run = [self::class, 'resolve'];
    public static function resolve(array $params = [])
    {
        dd("Middleware not implemented yet");
    }
}
