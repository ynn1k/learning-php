<?php

namespace Core;

class Validator
{
    /**
     * tbw
     *
     * @param $value
     * @param $min
     * @param $max
     * @return bool
     */
    public static function string($value, $min = 8, $max = 255)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

}