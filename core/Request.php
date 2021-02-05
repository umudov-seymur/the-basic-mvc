<?php

namespace App\Core;

use Exception;

class Request
{
    /**
     * Fetch the request URI.
     *
     * @return string
     */
    public static function uri()
    {
        return trim(str_replace(
            ['public', 'index.php'],
            ['', ''],
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        ), '/');
    }

    public static function __callStatic($method, $arguments)
    {
        $method = strtolower($method);
        [$fieldName] = $arguments;

        if (isset($_REQUEST[$fieldName])) {
            return htmlspecialchars($_REQUEST[$fieldName]);
        }

        throw new Exception("$fieldName not found!");
    }

    /**
     * Fetch the request method.
     *
     * @return string
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
