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

function getloggedInFreelancer(int $userId, object $freelancer): int 
{
    $freelancer = $freelancer->getByUserId($userId);
    return $freelancer_id = $freelancer[0]->id;
}

function dd(mixed $data) {
    echo '<pre>';
        print_r($data);
    echo '</pre>';
}