<?php

namespace App;

class FormValidator
{
    public static function string($value, $min = 3, $max = INF): bool
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }
}
