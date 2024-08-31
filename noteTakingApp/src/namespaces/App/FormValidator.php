<?php

namespace App;

class FormValidator
{
    public static function string(string $value, int $min = 3, int $max = INF): bool
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}
