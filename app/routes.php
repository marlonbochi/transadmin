<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');
//modulo de clientes
Route::get('clientes', 'ClientesController@action_index');
Route::get('clientes/insert', 'ClientesController@action_insert');

//modulo de login
Route::any('login', 'LoginController@showWelcome');
Route::any('logar', 'LoginController@action_logar');
Route::any('logout', 'LoginController@action_logout');