<?php
use App\Http\Middleware\LogUserActivity;



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


    $router->get('/weather', 'WeatherApiController@current');
    $router->get('/forecast', 'WeatherApiController@forecast');
    $router->get('/history', 'WeatherApiController@history');

    $router->post('/detect', 'TranslateController@detect');
    $router->get('/languages', 'TranslateController@languages');
    $router->post('/translate', 'TranslateController@translate');

    $router->get('/getloc', 'NavController@getByLatLng');
    $router->get('/getPlace', 'NavController@getByPlaceId');
    $router->get('/getAddress', 'NavController@getByAddress');


//for sign up and login
$router->post('register', 'AuthController@register');
$router->post('login', 'AuthController@login');

//CRUD routes
$router->get('/users', 'UserController@index');
$router->post('/users', 'UserController@store');
$router->get('/users/{id}', 'UserController@show');
$router->put('/users/{id}', 'UserController@update');
$router->delete('/users/{id}', 'UserController@destroy');