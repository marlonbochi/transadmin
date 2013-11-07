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

Route::any('usuario/insert', 'UsuarioController@action_insert');
Route::any('usuario/update/{id}', 'UsuarioController@action_update');
Route::any('usuario/delete/{id}', 'UsuarioController@action_delete');
Route::any('usuario/{mensagem?}', 'UsuarioController@showWelcome');

Route::any('perfil/insert', 'PerfilController@action_insert');
Route::any('perfil/update/{id}', 'PerfilController@action_update');
Route::any('perfil/delete/{id}', 'PerfilController@action_delete');
Route::any('perfil/{mensagem?}', 'PerfilController@showWelcome');