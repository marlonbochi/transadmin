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

Route::any('/', 'HomeController@showWelcome');
//modulo de clientes
Route::any('cliente/insert', 'ClienteController@action_insert');
Route::any('cliente/update/{id}', 'ClienteController@action_update');
Route::any('cliente/delete/{id}', 'ClienteController@action_delete');
Route::any('cliente/{mensagem?}', 'ClienteController@action_index');
//modulo de entrega
Route::any('entrega/insert', 'EntregaController@action_insert');
Route::any('entrega/update/{id}', 'EntregaController@action_update');
Route::any('entrega/delete/{id}', 'EntregaController@action_delete');
Route::any('entrega/{mensagem?}', 'EntregaController@action_index');
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
//modulo do Simulador
Route::any('simulador/insert', 'SimuladorController@insert_simulador');
Route::any('simulador', 'SimuladorController@showWelcome');

Route::any('busca_grafico', function(){

	$entregas_grafico = DB::select('select count(*) as qtd_entrega, data_entrega from entrega group by data_entrega');

	foreach ($entregas_grafico as $value) {
		$rows[] = array('c' => array(
	        array('v' => date("d/m/Y", strtotime($value->data_entrega))),
	        array('v' => (int)$value->qtd_entrega)
	    ));
	}

	
	$grafico = array(
	    'dados' => array(
	        'cols' => array(
	            array('type' => 'string', 'label' => 'Data'),
	            array('type' => 'number', 'label' => 'Entregas')
	        ),  
	        'rows' => $rows
	    ),
	    'config' => array(
	        'title' => 'Quantidades de Entregas por Data',
		    'width' =>   700,
		    'height' =>  300
	    )
	);

	return json_encode($grafico);

});