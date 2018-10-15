<?php

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
  $res['version'] = $router->app->version();
  $res['success'] = true;
  $res['result'] = "Hello, welcome to lumen";
  return response()->json($res, 201);
});
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function() use ($router){
  $router->get('/posts', ['uses' => 'PostController@index']);
  $router->post('/posts', 'PostController@store');
  $router->get('/posts/{id}', 'PostController@show');
  $router->put('/posts/{id}', 'PostController@update');
  $router->delete('/posts/{id}', 'PostController@delete');
});

$router->post('/login', 'LoginController@index');
$router->post('/register', 'UserController@register');
$router->get('/user/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@getUser']);
