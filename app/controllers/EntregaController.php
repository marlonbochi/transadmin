<?php

class EntregaController extends BaseController 
{
	public function action_index($mensagem = null)
	{

		$view = View::make('entrega.index');
		$this->layout->title = 'TransAdmin - Entregas';

		//acoes da pagina
		$view->title_pagina = 'Entregas';
		$view->link_pagina = URL::to('entrega');
		$view->acao = 'Busca';
		$view->link_acao =  URL::to('entrega');

		$new_modulo = new Comum();
                $Join[] = array('tabela_join' => 'cliente',
                                'parametro1' => 'cliente.id_cliente',
                                'sinal' => '=',
                                'parametro2' => 'entrega.id_cliente');
		$entregas = $new_modulo->select_table('entrega', null, null, 15, null, $Join);

		$view->entregas = $entregas;
		$view->mensagem = $mensagem;
		$this->layout->content = $view;

	}

	public function action_insert()
	{
		Asset::add('/comum/js/entrega.js');
		$view = View::make('entrega.insert');
		$this->layout->title = 'TransAdmin - Entregas::Inserção';


		//acoes da pagina
		$view->title_pagina = 'Entregas';
		$view->link_pagina = URL::to('entrega');
		$view->acao = 'Inserção';
		$view->link_acao =  URL::to('entrega/insert');

		$new_modulo = new Comum();

		if(Input::has('id_cliente')){

			$dados = array(
					'logradouro_endereco' => Input::get('logradouro_endereco'),
					'cep_endereco' => Input::get('cep_endereco'),
					'numero_endereco' => Input::get('numero_endereco'),
					'complemento_endereco' => Input::get('complemento_endereco'),
					'bairro_endereco' => Input::get('bairro_endereco'),
					'cidade_endereco' => Input::get('cidade_endereco'),
                                        'uf_endereco' => Input::get('uf_endereco')
				);
			$id_endereco = $new_modulo->insert_table('endereco',$dados, 'SIM');

			$dados = array(
					'nome_cliente' => Input::get('nome_cliente'),
					'email_cliente' => Input::get('email_cliente'),
					'data_nascimento_cliente' => date("Y-m-d", strtotime(Input::get('data_nascimento_cliente'))),
					'cpf_cliente' => Input::get('cpf_cliente'),
                                        'rg_cliente' => Input::get('rg_cliente'),
					'telefone_cliente' => Input::get('telefone_cliente'),
					'celular_cliente' => Input::get('celular_cliente'),
					'id_endereco_cliente' => $id_endereco
				);
			$new_modulo->insert_table('cliente',$dados);
			return Redirect::action('ClienteController@action_index', 'Registro inserido com sucesso!');
		}

		$clientes = $new_modulo->select_table('cliente');

		$view->clientes = $clientes;
		$view->endereco = null;
		$this->layout->content = $view;

	}

	public function action_update($id_cliente)
	{

		$view = View::make('cliente.update');
		$this->layout->title = 'TransAdmin - Clientes::Edição';

		//acoes da pagina
		$view->title_pagina = 'Clientes';
		$view->link_pagina = URL::to('cliente');
		$view->acao = 'Edição';
		$view->link_acao =  URL::to('cliente/update/'.$id_cliente);

		$new_modulo = new Comum();

		$where[] = array('parametro1' => 'id_cliente',
						 'sinal' => '=',
						 'parametro2' => $id_cliente);
		$cliente = $new_modulo->select_table('cliente', $where, null, 1);
		//zerando o where
		$where = null;
		$where[] = array('parametro1' => 'id_endereco',
						 'sinal' => '=',
						 'parametro2' => $cliente->id_endereco_cliente);
		$endereco = $new_modulo->select_table('endereco', $where, null, 1);

		if(Input::has('nome_cliente')){

			$dados = array(
					'logradouro_endereco' => Input::get('logradouro_endereco'),
					'cep_endereco' => Input::get('cep_endereco'),
					'numero_endereco' => Input::get('numero_endereco'),
					'complemento_endereco' => Input::get('complemento_endereco'),
					'bairro_endereco' => Input::get('bairro_endereco'),
					'cidade_endereco' => Input::get('cidade_endereco'),
					'uf_endereco' => Input::get('uf_endereco')
				);
			$where[] = array('parametro1' => 'id_endereco',
						 'sinal' => '=',
						 'parametro2' => Input::get('id_endereco'));
			$new_modulo->update_table('endereco', $dados, $where);

			$where = null;
			$dados = array(
					'nome_cliente' => Input::get('nome_cliente'),
					'email_cliente' => Input::get('email_cliente'),	
					'data_nascimento_cliente' => date("Y-m-d", strtotime(str_replace('/', '-', Input::get('data_nascimento_cliente')))),
					'cpf_cliente' => Input::get('cpf_cliente'),
                                        'rg_cliente' => Input::get('rg_cliente'),
					'telefone_cliente' => Input::get('telefone_cliente'),
					'celular_cliente' => Input::get('celular_cliente')
				);
			$where[] = array('parametro1' => 'id_cliente',
							 'sinal' => '=',
							 'parametro2' => $id_cliente);
			$new_modulo->update_table('cliente', $dados, $where);
			return Redirect::action('ClienteController@action_index', 'Registro editado com sucesso!');
		}

		$view->cliente = $cliente;
		$view->endereco = $endereco;
		$view->id_cliente = $id_cliente;
		$this->layout->content = $view;

	}

	public function action_delete($id_cliente)
	{
		$new_modulo = new Comum();
                $where[] = array('parametro1' => 'id_cliente',
						 'sinal' => '=',
						 'parametro2' => $id_cliente);
		$cliente = $new_modulo->select_table('cliente', $where, null, 1);
                $where = null;
		$where[] = array('parametro1' => 'id_cliente',
						'sinal' => '=',
						'parametro2' => $id_cliente);

		$new_modulo->delete_table('cliente', $where);
                $where = null;                
                $where[] = array('parametro1' => 'id_endereco',
						'sinal' => '=',
						'parametro2' => $cliente->id_endereco_cliente);

		$new_modulo->delete_table('endereco', $where);

		return Redirect::action('ClienteController@action_index', 'Registro excluido com sucesso!');

	}
}