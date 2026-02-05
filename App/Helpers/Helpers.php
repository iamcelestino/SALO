<?php
use App\Core\Config; 

function config($key, $default = null): mixed
{
    static $config;

    if (!$config) {
        return Config::get($key, $default);
    }

    return $config[$key] ?? $default;
}

function dd(mixed $data) {
    echo '<pre>';
        print_r($data);
    echo '</pre>';
}