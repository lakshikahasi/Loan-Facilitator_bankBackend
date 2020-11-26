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
$router->post('/updateLoan/{loan_id}', 'LoanController@updateLoan');

$router->get('/getLoans/{bank_id}','LoanController@getLoans');
$router->get('/getLoanDetails/{loan_id}','LoanController@getLoanDetails');
$router->get('/getFarmerDetails/{id}','RequestController@getFarmerDetails');
$router->get('/getApplicationDetails/{loan_id}', 'RequestController@getApplicationDetails');
$router->get('/getApplicantDetails/{app_id}', 'RequestController@getApplicantDetails');

$router->get('/getObtainedDetails/{loan_id}', 'ObtainedLoansController@getObtainedDetails');
$router->get('/getObtainedFarmerDetails/{id}', 'ObtainedLoansController@getObtainedFarmerDetails');


$router->get('getFarmerLoans/{nic}/{bank_id}', 'PaymentController@getFarmerLoans');//to obtain loan details using nic and bank id
