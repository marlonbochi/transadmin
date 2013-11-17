<?php

class SimuladorController extends BaseController {
	
	public function showWelcome()
	{
		Asset::add('/comum/js/simulador.js');
		$view = View::make('simulador.index');
		$this->layout->title = 'TransAdmin - Simulador';		
		$this->layout->content = $view;
		
		$new_modulo = New Comum();
	
		$entregas = DB::select('select * from entrega inner join cliente on entrega.id_cliente = cliente.id_cliente
					where data_entrega >= DATE(now()) and data_entrega <= DATE(now()) + 7 and efetuada_entrega = "N"
					Order By data_entrega ASC');
		

		$view->title_pagina = 'Simulador de Entregas';
		$view->entregas = $entregas;
	}

	public function insert_simulador()
	{
		//endereco de origem
		Session::put('logradouro_origem_endereco', Input::get('logradouro_origem_endereco'));
		Session::put('cep_origem_endereco', Input::get('cep_origem_endereco'));
		Session::put('numero_origem_endereco', Input::get('numero_origem_endereco'));
		Session::put('complemento_origem_endereco', Input::get('complemento_origem_endereco'));
		Session::put('bairro_origem_endereco', Input::get('bairro_origem_endereco'));
		Session::put('cidade_origem_endereco', Input::get('cidade_origem_endereco'));
		Session::put('uf_origem_endereco', Input::get('uf_origem_endereco'));

		//endereco de destino
		Session::put('logradouro_destino_endereco', Input::get('logradouro_destino_endereco'));
		Session::put('cep_destino_endereco', Input::get('cep_destino_endereco'));
		Session::put('numero_destino_endereco', Input::get('numero_destino_endereco'));
		Session::put('complemento_destino_endereco', Input::get('complemento_destino_endereco'));
		Session::put('bairro_destino_endereco', Input::get('bairro_destino_endereco'));
		Session::put('cidade_destino_endereco', Input::get('cidade_destino_endereco'));
		Session::put('uf_destino_endereco', Input::get('uf_destino_endereco'));

		//restante do formulario
		Session::put('data_entrega', Input::get('data_entrega'));
		Session::put('valor_km_entrega', Input::get('valor_km_entrega'));
		Session::put('km_percorrido_entrega', Input::get('km_percorrido_entrega'));
		Session::put('valor_entrega', Input::get('valor_entrega'));

		return Redirect::action('EntregaController@action_insert');
	}
}