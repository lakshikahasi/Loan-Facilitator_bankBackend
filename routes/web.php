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

$router->post('/login', 'LoginController@login');

$router->get('/bankDetails/{bank_id}', 'BankController@bankDetails');

$router->get('/getLoans/{bank_id}','LoanController@getLoans');
$router->get('/getLoanDetails/{loan_id}','LoanController@getLoanDetails');
$router->post('/createLoan', 'LoanController@createLoan');
$router->get('/updateLoan{loan_id}', 'LoanController@updateLoan');
