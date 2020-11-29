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

$router->get('/bankDetails/{bank_id}', 'BankController@bankDetails');//to retrive bank details using bank id

$router->post('/createLoan', 'LoanController@createLoan');
$router->get('/updateLoan{loan_id}', 'LoanController@updateLoan');

$router->get('/getLoans/{bank_id}','LoanController@getLoans');

//$router->get('/getLoanDetails/{loan_id}','LoanController@getLoanDetails');
$router->get('/getFarmerDetails/{id}','RequestController@getFarmerDetails');
$router->get('/getApplicationDetails/{loan_id}', 'RequestController@getApplicationDetails');
$router->get('/getapplicantdetails/{app_id}', 'RequestController@getapplicantdetails');
$router->post('/rejectedloan', 'rejectloansController@rejectedloan');
$router->post('/approveloan', 'approveloansController@approveloan');
$router->get('/dltreject/{app_id}', 'RequestController@dltreject');
$router->get('/getapproveDetails/{loan_id}', 'approveloansController@getapproveDetails');
$router->get('/getapproveDetailsbyappid/{application_id}', 'approveloansController@getapproveDetailsbyappid');
$router->get('/dltapprove/{app_id}', 'approveloansController@dltapprove');
$router->post('/obtainLoan', 'obtainController@obtainLoan');
