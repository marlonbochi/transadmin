<?php

class ClientesController extends BaseController 
{
	public function action_index($mensagem = null)
	{

		$view = View::make('clientes.index');
		$this->layout->title = 'CMS - Clientes';

		//acoes da pagina
		$view->title_pagina = 'Clientes';
		$view->link_pagina = URL::to('clientes');
		$view->acao = 'Busca';
		$view->link_acao =  URL::to('clientes');

		$new_modulo = new Comum();
		$nome_tabela = 'cliente';

		$clientes = $new_modulo->select_table($nome_tabela, null, null, 15);

		$view->clientes = $clientes;
		$view->mensagem = $mensagem;
		$this->layout->content = $view;

	}

	public function action_insert()
	{

		$view = View::make('clientes.insert');
		$this->layout->title = 'CMS - Clientes::Inserção';

		//acoes da pagina
		$view->title_pagina = 'Clientes';
		$view->link_pagina = URL::to('clientes');
		$view->acao = 'Inserção';
		$view->link_acao =  URL::to('clientes/insert');

		$new_modulo = new Comum();

		if(Input::has('nome_cliente')){

			$dados = array(
					'endereco' => Input::get('endereco'),
					'cep_endereco' => Input::get('cep_endereco'),
					'numero_endereco' => Input::get('numero_endereco'),
					'complemento_endereco' => Input::get('complemento_endereco'),
					'bairro_endereco' => Input::get('bairro_endereco'),
					'cidade_endereco' => Input::get('cidade_endereco'),
					'telefone_endereco' => Input::get('telefone_endereco')
				);
			$id_endereco = $new_modulo->insert_table('endereco',$dados, 'SIM');

			$dados = array(
					'nome_cliente' => Input::get('nome_cliente'),
					'email_cliente' => Input::get('email_cliente'),
					'senha_cliente' => md5(Input::get('senha_cliente')),
					'sexo_cliente' => Input::get('sexo_cliente'),
					'data_nascimento_cliente' => date("Y/m/d", strtotime(Input::get('data_nascimento_cliente'))),
					'cpf_cliente' => Input::get('cpf_cliente'),
					'tel_residencial_cliente' => Input::get('tel_residencial_cliente'),
					'tel_comercial_cliente' => Input::get('tel_comercial_cliente'),
					'celular_cliente' => Input::get('celular_cliente'),
					'id_endereco_cliente' => $id_endereco
				);
			$new_modulo->insert_table('cliente',$dados);
			return Redirect::action('ClientesController@action_index', 'Cliente inserido com sucesso!');
		}

		$view->cliente = null;
		$view->endereco = null;
		$this->layout->content = $view;

	}

	public function action_update($id_cliente)
	{

		$view = View::make('clientes.update');
		$this->layout->title = 'CMS - Clientes::Edição';

		//acoes da pagina
		$view->title_pagina = 'Clientes';
		$view->link_pagina = URL::to('clientes');
		$view->acao = 'Edição';
		$view->link_acao =  URL::to('clientes/update/'.$id_cliente);

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
					'endereco' => Input::get('endereco'),
					'cep_endereco' => Input::get('cep_endereco'),
					'numero_endereco' => Input::get('numero_endereco'),
					'complemento_endereco' => Input::get('complemento_endereco'),
					'bairro_endereco' => Input::get('bairro_endereco'),
					'cidade_endereco' => Input::get('cidade_endereco'),
					'telefone_endereco' => Input::get('telefone_endereco')
				);
			$where[] = array('parametro1' => 'id_endereco',
						 'sinal' => '=',
						 'parametro2' => Input::get('id_endereco'));
			$new_modulo->update_table('endereco', $dados, $where);

			if(Input::has('senha_cliente')){
				$senha = md5(Input::get('senha_cliente'));
			}else{
				$senha = $cliente->senha_cliente;
			}
			$where = null;
			$dados = array(
					'nome_cliente' => Input::get('nome_cliente'),
					'email_cliente' => Input::get('email_cliente'),	
					'senha_cliente' => $senha,					
					'sexo_cliente' => Input::get('sexo_cliente'),
					'data_nascimento_cliente' => date("Y-m-d", strtotime(str_replace('/', '-', Input::get('data_nascimento_cliente')))),
					'cpf_cliente' => Input::get('cpf_cliente'),
					'tel_residencial_cliente' => Input::get('tel_residencial_cliente'),
					'tel_comercial_cliente' => Input::get('tel_comercial_cliente'),
					'celular_cliente' => Input::get('celular_cliente')
				);
			$where[] = array('parametro1' => 'id_cliente',
							 'sinal' => '=',
							 'parametro2' => $id_cliente);
			$new_modulo->update_table('cliente', $dados, $where);
			return Redirect::action('ClientesController@action_index', 'Cliente editado com sucesso!');
		}

		$view->cliente = $cliente;
		$view->endereco = $endereco;
		$view->id_cliente = $id_cliente;
		$this->layout->content = $view;

	}

	public function action_delete($id_cliente)
	{

		$view = View::make('clientes.index');
		$this->layout->title = 'CMS - Clientes::Exclusão';

		//acoes da pagina
		$view->title_pagina = 'Clientes';
		$view->link_pagina = URL::to('clientes');
		$view->acao = 'Exclusão';
		$view->link_acao =  URL::to('clientes');

		$new_modulo = new Comum();
		$where[] = array('parametro1' => 'id_cliente',
						'sinal' => '=',
						'parametro2' => $id_cliente);

		$new_modulo->delete_table('cliente', $where);

		return Redirect::action('ClientesController@action_index', 'Cliente excluido com sucesso!');

	}
}