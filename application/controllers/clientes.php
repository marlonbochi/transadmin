<?php

class Clientes_Controller extends Base_Controller 
{
	public function action_index()
	{

		$view = View::make('clientes.index');
		$this->layout->title = 'Clientes';

		//acoes da pagina
		$view->title_pagina = 'Clientes';
		$view->acao = 'Busca';

		$new_modulo = new Clientes();
		//$mensagem = $new_modulo->cria_novo_modulo(Input::get('nome'));
		//$view->mensagem = $mensagem;

		$this->layout->content = $view;

	}

	public function action_insert()
	{

		$view = View::make('clientes.ins_edt');
		$this->layout->title = 'Clientes > Inserção';

		//acoes da pagina
		$view->title_pagina = 'Clientes';
		$view->acao = 'Inserção';

		if (Input::get('nome')) {
			$new_modulo = new Clientes();
			//$mensagem = $new_modulo->cria_novo_modulo(Input::get('nome'));
			//$view->mensagem = $mensagem;
		}
		

		$this->layout->content = $view;

	}
}