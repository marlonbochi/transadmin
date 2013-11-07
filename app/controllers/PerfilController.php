<?php

class PerfilController extends BaseController 
{
	public function showWelcome($mensagem = null)
	{
		$view = View::make('perfil.index');
		$this->layout->title = 'CMS - Perfil';

		//acoes da pagina
		$view->title_pagina = 'Perfil';
		$view->link_pagina = URL::to('perfil');
		$view->acao = 'Busca';
                $view->link_acao = URL::to('perfil');

		$new_modulo = new Comum();
		$perfis = $new_modulo->select_table('perfil');

		$view->mensagem =  $mensagem;
		$view->perfis = $perfis;
		$this->layout->content = $view;

	}

	public function action_insert()
	{

		$view = View::make('perfil.insert');
		$this->layout->title = 'CMS - Perfil::Inserção';

		//acoes da pagina
		$view->title_pagina = 'Perfil';
		$view->link_pagina = URL::to('perfil');
		$view->acao = 'Inserção';
		$view->link_acao =  URL::to('perfil/insert');	
                
                $new_modulo = new Comum();
                $modulos = $new_modulo->select_table('modulo');
                $view->modulos = $modulos;
                        
		if (Input::has('nome_perfil')) {           
                        
			$array_incluir['nome_perfil'] = Input::get('nome_perfil');
                        $id_perfil = $new_modulo->insert_table('perfil', $array_incluir, 'Sim');
                        
                        $ids_modulo = Input::get('id_modulo');                        
                        foreach ($ids_modulo as $value) {
                            $array['id_perfil'] = $id_perfil;
                            $array['id_modulo'] = $value;
                            $new_modulo->insert_table('modulo_perfil', $array);
                        }
                        
			$mensagem = 'Registro inserido com sucesso!';

			return Redirect::action('PerfilController@showWelcome', $mensagem);
		}

		$this->layout->content = $view;

	}


	public function action_update($id = null)
	{

		$view = View::make('perfil.update');
		$this->layout->title = 'CMS - Perfil::Edição';

		//acoes da pagina
		$view->title_pagina = 'Perfil';
		$view->link_pagina = URL::to('perfil');
		$view->acao = 'Edição';
		$view->link_acao =  URL::to('perfil/update/'.$id);

		$new_modulo = new Comum();

		if (Input::has('nome_perfil')) {			
                    
			$array_update['nome_perfil'] =Input::get('nome_perfil');
                        $where_update[] = array('parametro1' => 'id_perfil',
                                                'sinal' => '=',
                                                'parametro2' => $id);
			$new_modulo->update_table('perfil', $array_update, $where_update);
                        
                        $new_modulo->delete_table('modulo_perfil', $where_update);
                        
                        $ids_modulo = Input::get('id_modulo');                        
                        foreach ($ids_modulo as $value) {
                            $array['id_perfil'] = $id;
                            $array['id_modulo'] = $value;
                            $new_modulo->insert_table('modulo_perfil', $array);
                        }
                        
                        $mensagem = 'Registro editado com sucesso!';
			return Redirect::action('PerfilController@showWelcome', $mensagem);
		}
                $where[] = array('parametro1' => 'id_perfil',
                                 'sinal' => '=',
                                 'parametro2' => $id);
		$perfil = $new_modulo->select_table('perfil', $where, null, 1);
                $view->perfil = $perfil;
                //zerando variavel
                $where = null;
                $where[] = array('parametro1' => 'id_perfil',
                                 'sinal' => '=',
                                 'parametro2' => $id);
		$modulo_perfil = $new_modulo->select_table('modulo_perfil', $where);
		$view->modulo_perfil = $modulo_perfil;	
                
                $modulos = $new_modulo->select_table('modulo');
		$view->modulos = $modulos;	
                
                $view->id_perfil = $id;
		$this->layout->content = $view;

	}


	public function action_delete($id)
	{

		if (!$id == null) {
			$new_modulo = new Comum();
                        $where[] = array('parametro1' => 'id_perfil',
                                          'sinal' => '=',
                                          'parametro2' => $id);
                        $new_modulo->delete_table('modulo_perfil', $where);
			$new_modulo->delete_table('perfil', $where);
                        $mensagem = 'Registro excluido com sucesso!';
		}

		return Redirect::action('PerfilController@showWelcome', $mensagem);

	}

}