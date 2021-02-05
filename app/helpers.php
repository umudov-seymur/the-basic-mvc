<?php

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
if (!function_exists('redirect')) {
    function redirect($url)
    {
        header("Location: $url");
    }
}

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
if (!function_exists('view')) {
    function view($viewName, $data = [])
    {
        extract($data);
        require __DIR__ . './views/' . str_replace(".php", "", $viewName) . ".php";
    }
}
