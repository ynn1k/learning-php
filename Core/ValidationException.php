<?php

namespace Core;

class ValidationException extends \Exception
{
    public readonly array $errors;
    public readonly array $oldInput;

    public static function throw($errors, $oldInput)
    {
        $instance = new static;
        $instance->errors = $errors;
        $instance->oldInput = $oldInput;

        throw $instance;
    }
}