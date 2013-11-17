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
		if(Session::has('logradouro_origem_endereco')){
			$view = View::make('entrega.insert_preenchido');
		}else{
			$view = View::make('entrega.insert');
		}
		$this->layout->title = 'TransAdmin - Entregas::Inserção';

		//acoes da pagina
		$view->title_pagina = 'Entregas';
		$view->link_pagina = URL::to('entrega');
		$view->acao = 'Inserção';
		$view->link_acao =  URL::to('entrega/insert');

		$new_modulo = new Comum();

		if(Input::has('id_cliente')){

			$dados = array('logradouro_endereco' => Input::get('logradouro_origem_endereco'),
						   'cep_endereco' => Input::get('cep_origem_endereco'),
						   'numero_endereco' => Input::get('numero_origem_endereco'),
						   'complemento_endereco' => Input::get('complemento_origem_endereco'),
						   'bairro_endereco' => Input::get('bairro_origem_endereco'),
						   'cidade_endereco' => Input::get('cidade_origem_endereco'),
                           'uf_endereco' => Input::get('uf_origem_endereco')
				);
			$id_origem_endereco = $new_modulo->insert_table('endereco', $dados, 'SIM');

			$dados = array('logradouro_endereco' => Input::get('logradouro_destino_endereco'),
						   'cep_endereco' => Input::get('cep_destino_endereco'),
						   'numero_endereco' => Input::get('numero_destino_endereco'),
						   'complemento_endereco' => Input::get('complemento_destino_endereco'),
						   'bairro_endereco' => Input::get('bairro_destino_endereco'),
						   'cidade_endereco' => Input::get('cidade_destino_endereco'),
                           'uf_endereco' => Input::get('uf_destino_endereco')
				           );
			$id_destino_endereco = $new_modulo->insert_table('endereco', $dados, 'SIM');

			$dados = array('id_cliente' => Input::get('id_cliente'),
						'id_origem_endereco' => $id_origem_endereco,
						'id_destino_endereco' => $id_destino_endereco,
						'data_entrega' => implode("-",array_reverse(explode("/",Input::get('data_entrega')))),						
						'km_percorrido_entrega' => str_replace(',', '.', str_replace('.', '', Input::get('km_percorrido_entrega'))),
						'valor_entrega' => str_replace(',', '.', str_replace('.', '', Input::get('valor_entrega'))),
                    	'valor_km_entrega' => str_replace(',', '.', str_replace('.', '', Input::get('valor_km_entrega'))),
						'efetuada_entrega' => Input::get('efetuada_entrega'),
						'observacao_entrega' => Input::get('observacao_entrega')
						);
			$new_modulo->insert_table('entrega',$dados);
			return Redirect::action('EntregaController@action_index', 'Registro inserido com sucesso!');
		}

		$clientes = $new_modulo->select_table('cliente');

		if(Session::has('logradouro_origem_endereco')){
			$entrega = array(
				'logradouro_origem_endereco' => Session::get('logradouro_origem_endereco'),
				'cep_origem_endereco' => Session::get('cep_origem_endereco'),
				'numero_origem_endereco' => Session::get('numero_origem_endereco'),
				'complemento_origem_endereco' => Session::get('complemento_origem_endereco'),
				'bairro_origem_endereco' => Session::get('bairro_origem_endereco'),
				'cidade_origem_endereco' => Session::get('cidade_origem_endereco'),
				'uf_origem_endereco' => Session::get('uf_origem_endereco'),

				//endereco de destino
				'logradouro_destino_endereco' => Session::get('logradouro_destino_endereco'),
				'cep_destino_endereco' => Session::get('cep_destino_endereco'),
				'numero_destino_endereco' => Session::get('numero_destino_endereco'),
				'complemento_destino_endereco' => Session::get('complemento_destino_endereco'),
				'bairro_destino_endereco' => Session::get('bairro_destino_endereco'),
				'cidade_destino_endereco' => Session::get('cidade_destino_endereco'),
				'uf_destino_endereco' => Session::get('uf_destino_endereco'),

				//restante do formulario
				'data_entrega' => Session::get('data_entrega'),
				'valor_km_entrega' => Session::get('valor_km_entrega'),
				'km_percorrido_entrega' => Session::get('km_percorrido_entrega'),
				'valor_entrega' => Session::get('valor_entrega')
			);
			
			//apagando as sessões para não sobrecarregar o servidor
			Session::forget('logradouro_origem_endereco');
			Session::forget('cep_origem_endereco');
			Session::forget('numero_origem_endereco');
			Session::forget('complemento_origem_endereco');
			Session::forget('bairro_origem_endereco');
			Session::forget('cidade_origem_endereco');
			Session::forget('uf_origem_endereco');

			Session::forget('logradouro_destino_endereco');
			Session::forget('cep_destino_endereco');
			Session::forget('numero_destino_endereco');
			Session::forget('complemento_destino_endereco');
			Session::forget('bairro_destino_endereco');
			Session::forget('cidade_destino_endereco');
			Session::forget('uf_destino_endereco');

			$view->entrega = $entrega;
		}

		$view->clientes = $clientes;
		$view->endereco = null;
		$this->layout->content = $view;

	}

	public function action_update($id_entrega)
	{
		Asset::add('/comum/js/entrega.js');
		$view = View::make('entrega.update');
		$this->layout->title = 'TransAdmin - Entregas::Edição';

		//acoes da pagina
		$view->title_pagina = 'Entregas';
		$view->link_pagina = URL::to('entrega');
		$view->acao = 'Edição';
		$view->link_acao =  URL::to('entrega/update/'.$id_entrega);

		$new_modulo = new Comum();

		$clientes = $new_modulo->select_table('cliente');

		$where[] = array('parametro1' => 'id_entrega',
						 'sinal' => '=',
						 'parametro2' => $id_entrega);
		$entrega = $new_modulo->select_table('entrega', $where, null, 1);
		//zerando o where
		$where = null;
		$where[] = array('parametro1' => 'id_endereco',
						 'sinal' => '=',
						 'parametro2' => $entrega->id_origem_endereco);
		$endereco_origem = $new_modulo->select_table('endereco', $where, null, 1);
		//zerando o where
		$where = null;
		$where[] = array('parametro1' => 'id_endereco',
						 'sinal' => '=',
						 'parametro2' => $entrega->id_destino_endereco);
		$endereco_destino = $new_modulo->select_table('endereco', $where, null, 1);

		if(Input::has('id_cliente')){
			$dados = array('logradouro_endereco' => Input::get('logradouro_origem_endereco'),
						   'cep_endereco' => Input::get('cep_origem_endereco'),
						   'numero_endereco' => Input::get('numero_origem_endereco'),
						   'complemento_endereco' => Input::get('complemento_origem_endereco'),
						   'bairro_endereco' => Input::get('bairro_origem_endereco'),
						   'cidade_endereco' => Input::get('cidade_origem_endereco'),
                           'uf_endereco' => Input::get('uf_origem_endereco')
				);
			$where = null;
			$where[] = array('parametro1' => 'id_endereco',
							 'sinal' => '=',
							 'parametro2' => Input::get('id_origem_endereco'));
			$new_modulo->update_table('endereco', $dados, $where);

			$dados = array('logradouro_endereco' => Input::get('logradouro_destino_endereco'),
						   'cep_endereco' => Input::get('cep_destino_endereco'),
						   'numero_endereco' => Input::get('numero_destino_endereco'),
						   'complemento_endereco' => Input::get('complemento_destino_endereco'),
						   'bairro_endereco' => Input::get('bairro_destino_endereco'),
						   'cidade_endereco' => Input::get('cidade_destino_endereco'),
                           'uf_endereco' => Input::get('uf_destino_endereco')
				           );
			$where = null;
			$where[] = array('parametro1' => 'id_endereco',
							 'sinal' => '=',
							 'parametro2' => Input::get('id_destino_endereco'));
			$new_modulo->update_table('endereco', $dados, $where);

			$dados = array('id_cliente' => Input::get('id_cliente'),
							'id_origem_endereco' => Input::get('id_origem_endereco'),
							'id_destino_endereco' => Input::get('id_destino_endereco'),
							'data_entrega' => implode("-",array_reverse(explode("/",Input::get('data_entrega')))),
							'km_percorrido_entrega' => str_replace(',', '.', str_replace('.', '', Input::get('km_percorrido_entrega'))),
							'valor_entrega' => str_replace(',', '.', str_replace('.', '', Input::get('valor_entrega'))),
	                    	'valor_km_entrega' => str_replace(',', '.', str_replace('.', '', Input::get('valor_km_entrega'))),
							'efetuada_entrega' => Input::get('efetuada_entrega'),
							'observacao_entrega' => Input::get('observacao_entrega')
						);
			$where = null;
			$where[] = array('parametro1' => 'id_entrega',
							 'sinal' => '=',
							 'parametro2' => $id_entrega);
			$new_modulo->update_table('entrega', $dados, $where);
			return Redirect::action('EntregaController@action_index', 'Registro editado com sucesso!');
		}

		$view->clientes = $clientes;
		$view->entrega = $entrega;
		$view->endereco_origem = $endereco_origem;
		$view->endereco_destino = $endereco_destino;
		$this->layout->content = $view;

	}

	public function action_delete($id_entrega)
	{
		$new_modulo = new Comum();
                $where[] = array('parametro1' => 'id_entrega',
						 'sinal' => '=',
						 'parametro2' => $id_entrega);
		$entrega = $new_modulo->select_table('entrega', $where, null, 1);
        $where = null;
		$where[] = array('parametro1' => 'id_entrega',
						'sinal' => '=',
						'parametro2' => $id_entrega);

		$new_modulo->delete_table('entrega', $where);
        $where = null;                
        $where[] = array('parametro1' => 'id_endereco',
				'sinal' => '=',
				'parametro2' => $entrega->id_origem_endereco);
		$new_modulo->delete_table('endereco', $where);
		$where = null;                
        $where[] = array('parametro1' => 'id_endereco',
				'sinal' => '=',
				'parametro2' => $entrega->id_destino_endereco);
		$new_modulo->delete_table('endereco', $where);

		return Redirect::action('EntregaController@action_index', 'Registro excluido com sucesso!');

	}
}