<?php

use Core\Response;
use Core\Session;

/**
 * @param $val
 * @return void
 */
function dd($val)
{
    echo "<pre style='display:flex;justify-content:center;padding:8px;background:#292c33;color:#80aaff'>";
    var_dump($val);
    echo "</pre>";
    die();
}

/**
 * @param $value
 * @return bool
 */
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] == $value;
}

/**
 * @param int $code
 * @return void
 */
function abort(int $code = 404): void
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function authorized($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

/**
 * @param $path
 * @return string
 */
function base_path($path)
{
    return BASE_PATH . $path;
}

/**
 * @param $path
 * @param array $attr
 * @return string
 */
function view($path, $attr = [])
{
    extract($attr);
    require base_path('views/' . $path);
}

/**
 * @param $path
 * @return void
 */
function redirect($path)
{
    header("location: $path");
    exit();
}

function oldInput($key, $default = null)
{
    return Session::get('oldInput')[$key] ?? $default;
}