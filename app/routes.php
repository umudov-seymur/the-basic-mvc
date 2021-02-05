<?php

$router->get('', 'PagesController@home');
$router->get('tasks', 'PagesController@tasks');
$router->get('contact', 'PagesController@contact');
$router->post('form', 'FormController@store');