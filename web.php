<?php

/** @var \Laravel\Lumen\Routing\Router $router */



$router->post('/registration', 'RegistrationController@OnRegistration');

$router->post('/login', 'LoginController@OnLogin');

$router->post('/test', ['middleware'=>'auth','uses'=>'LoginController@TokenTest']);
