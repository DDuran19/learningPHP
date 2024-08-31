<?php

namespace Middlewares;

class Middleware
{
    public const run = [self::class, 'resolve'];
    public static function resolve()
    {
        dd("Middleware not implemented yet");
    }
}
