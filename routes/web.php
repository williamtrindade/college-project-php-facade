<?php
/** @var Router $router */

use Laravel\Lumen\Routing\Router;

$router->post('/mail', 'UserController@mail');
