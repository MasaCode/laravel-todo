<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/users/register', 'UserController@register');
Route::post('/users/login', 'UserController@login');
Route::post('/sendEmail', 'ForgotPasswordController@sendResetLinkEmail');
Route::post('/passwordReset', 'ResetPasswordController@reset');

Route::group(['middleware' => 'jwt-auth'], function() {
    Route::get('/tasks', 'TaskController@findAll');
    Route::post('/tasks', 'TaskController@insert');
    Route::delete('/tasks/{id}', 'TaskController@delete');
});