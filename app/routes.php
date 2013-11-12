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
Route::get('cliente/insert', 'ClienteController@action_insert');
Route::get('cliente/update/{id}', 'ClienteController@action_update');
Route::get('cliente/delete/{id}', 'ClienteController@action_delete');
Route::get('cliente/{mensagem?}', 'ClienteController@action_index');
//modulo de entrega
Route::get('entrega/insert', 'EntregaController@action_insert');
Route::get('entrega/update/{id}', 'EntregaController@action_update');
Route::get('entrega/delete/{id}', 'EntregaController@action_delete');
Route::get('entrega/{mensagem?}', 'EntregaController@action_index');
//modulo de login
Route::any('login', 'LoginController@showWelcome');
Route::any('logar', 'LoginController@action_logar');
Route::any('logout', 'LoginController@action_logout');
//modulo de usuario
Route::any('usuario/insert', 'UsuarioController@action_insert');
Route::any('usuario/update/{id}', 'UsuarioController@action_update');
Route::any('usuario/delete/{id}', 'UsuarioController@action_delete');
Route::any('usuario/{mensagem?}', 'UsuarioController@showWelcome');
//modulo de perfil
Route::any('perfil/insert', 'PerfilController@action_insert');
Route::any('perfil/update/{id}', 'PerfilController@action_update');
Route::any('perfil/delete/{id}', 'PerfilController@action_delete');
Route::any('perfil/{mensagem?}', 'PerfilController@showWelcome');