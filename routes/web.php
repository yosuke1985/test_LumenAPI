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
    return $router->app->version();
});

//Product
$router->get('/products', 'ProductController@index');
$router->post('/product','ProductController@create');
$router->get('/product/{id}','ProductController@show');
$router->put('/product/{id}', 'ProductController@update');
$router->delete('/product/{id}','ProductController@destroy');
$router->get('/product/page/{id}','ProductController@pageShow');

//Article
$router->get('/articles', 'ArticleController@index');
$router->get('/articles/{id}','UserController@showUserAllArticle');
$router->post('/article','ArticleController@create');
$router->get('/article/{id}','ArticleController@show');
$router->put('/article/{id}', 'ArticleController@update');
$router->delete('/article/{id}','ArticleController@destroy');
$router->get('/article/page/{id}','ArticleController@pageShow');


//User
$router->get('/users', 'UserController@index');
$router->post('/user','UserController@create');
$router->get('/user/{id}','UserController@show');
$router->put('/user/{id}', 'UserController@update');
$router->delete('/user/{id}','UserController@destroy');
$router->get('/user/page/{id}','UserController@pageShow');

