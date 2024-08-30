<?php

class FormValidator
{
    public static function string($value, $min = 3, $max = INF): bool
    {
        $value = trim($value);

        var_dump($min, $max, strlen($value));

        var_dump(strlen($value) >= $min && strlen($value) <= $max);
        return strlen($value) >= $min && strlen($value) <= $max;
    }
}
