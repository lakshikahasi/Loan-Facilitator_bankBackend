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


$router->post('/createLoan', 'LoanController@createLoan');//to create a new loan scheme from the bank

$router->get('/getLoanDetails/{loan_id}','LoanController@getLoanDetails');//to retrive all details of relavant loan scheme
$router->post('/updateLoan/{loan_id}', 'LoanController@updateLoan');//to update existing loan scheme details
//$router->put('/updateLoan/{loan_id}', 'LoanController@updateLoan');//to update existing loan scheme details


$router->get('/getLoans/{bank_id}','LoanController@getLoans');//retrive all loan schemes from the relavant bank
$router->get('/getApplicationDetails/{loan_id}', 'RequestController@getApplicationDetails');//retrive name & date for view of applicant requests
$router->get('/getFarmerDetails/{id}','RequestController@getFarmerDetails');//retrive farmer details for farmer personal information
$router->get('/getApplicantDetails/{app_id}', 'RequestController@getApplicantDetails');//to retrive every information in a application


$router->get('/getapproveDetailsbyappid/{application_id}', 'approveloansController@getapproveDetailsbyappid');


$router->get('/getObtainedDetails/{loan_id}', 'ObtainedLoansController@getObtainedDetails');
$router->get('/getObtainedFarmerDetails/{id}', 'ObtainedLoansController@getObtainedFarmerDetails');


$router->get('getFarmerLoans2/{nic}', 'PaymentController@getFarmerLoans2');//to obtain loan details using nic and bank id
$router->post('getFarmerLoans/{nic}', 'PaymentController@getFarmerLoans');//to obtain loan details using nic //####use this#####
$router->get('getPayments/{obtain_id}', 'PaymentController@getPayments');//to retrive farmer payment details to a table
