<?php

namespace App\Controllers;

/**
 * Class Controller
 * @package App\Controllers
 */
class Controller
{
    protected function request(string $key, ?string $default = null)
    {
        return $_REQUEST[$key] ?? $default;
    }

    protected function json(array $data): string
    {
        header('Content-Type: application/json; charset=UTF-8');
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}