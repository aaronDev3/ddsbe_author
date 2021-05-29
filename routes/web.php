<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// unsecure routes
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/authors',['uses' => 'UserController@getUsers']);
});

// more simple routes
$router->get('/authors', 'UserController@index'); // get all users records
$router->post('/authors', 'UserController@addUser'); // create new user record
$router->get('/authors/{id}', 'UserController@show'); // get user by id
$router->put('/authors/{id}', 'UserController@update'); // update user record
$router->patch('/authors/{id}', 'UserController@update'); // update user record
$router->delete('/authors/{id}', 'UserController@delete'); // delete record

