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

//$router->get('/', 'TimeTrackerController@index');
$router->options(
    '/{any:.*}',
    [
        'middleware' => ['cors'],
        function (){
            return response(['status' => 'success']);
        }
    ]
);

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api','middleware' => 'cors'], function () use ($router) {
    $router->get('/',  ['uses' => 'TimeTrackerController@index']);
    $router->post('/post_data',  ['uses' => 'TimeTrackerController@postData']);
    $router->get('/get_list',  ['uses' => 'TimeTrackerController@getList']);
});