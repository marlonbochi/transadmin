<?php

class UsuariosController extends BaseController 
{
	public function showWelcome($mensagem = null)
	{
		$this->layout = View::make('layouts.usuario');
		$view = View::make('usuarios.index');
		$this->layout->title = 'CMS - Usuários';
		$this->layout->menu = ' ';

		//acoes da pagina
		$view->title_pagina = 'Usuários';
		$view->link_pagina = URL::to('usuarios');
		$view->acao = 'Busca';
		$view->link_acao =  URL::to('id_usuario');

		$new_modulo = new Usuarios();
		$usuarios = $new_modulo->busca_usuarios();

		$view->mensagem =  $mensagem;
		$view->usuarios = $usuarios;
		$this->layout->content = $view;

	}

	public function action_insert()
	{

		$view = View::make('usuarios.insert');
		$this->layout->title = 'CMS - Usuários > Inserção';

		//acoes da pagina
		$view->title_pagina = 'Usuários';
		$view->link_pagina = URL::to('usuarios');
		$view->acao = 'Inserção';
		$view->link_acao =  URL::to('usuarios/insert');

		$new_modulo = new Usuarios();

		$perfis = $new_modulo->busca_perfis();

		$view->perfis = $perfis;

		$usuario = Input::get('usuario');
		if (!empty($usuario)) {			
			$array_incluir['usuario'] = Input::get('usuario');
			$array_incluir['senha'] = md5(Input::get('senha'));
			$array_incluir['nome_usuario'] =Input::get('nome_usuario');
			$array_incluir['id_perfil'] =Input::get('id_perfil');			
			$mensagem = $new_modulo->insert_usuario($array_incluir);

			return Redirect::action('UsuariosController@showWelcome');
		}

		$this->layout->content = $view;		

	}


	public function action_update($id = null)
	{

		$view = View::make('usuarios.update');
		$this->layout->title = 'CMS - Usuários > Edição';

		//acoes da pagina
		$view->title_pagina = 'Usuários';
		$view->link_pagina = URL::to('usuarios');
		$view->acao = 'Edição';
		$view->link_acao =  URL::to('usuarios/update/'.$id);

		$new_modulo = new Usuarios();

		$perfis = $new_modulo->busca_perfis();

		$view->perfis = $perfis;

		$usuario_post = Input::get('usuario');
		if (!empty($usuario_post)) {			
			$array_update['usuario'] = Input::get('usuario');

			$senha = Input::get('senha');
			if (!empty($senha)){
				$array_update['senha'] = md5(Input::get('senha'));
			}	

			$array_update['nome_usuario'] =Input::get('nome_usuario');
			$array_update['id_perfil'] =Input::get('id_perfil');

			$mensagem = $new_modulo->update_usuario($id, $array_update);

			return Redirect::action('UsuariosController@showWelcome');
		}

		$usuario = $new_modulo->busca_usuario($id);
		$view->usuario = $usuario;		

		$this->layout->content = $view;

	}


	public function action_delete($id = null)
	{

		if ($id) {
			$new_modulo = new Usuarios();

			$mensagem = $new_modulo->delete_usuario($id);
		}

		return Redirect::action('UsuariosController@showWelcome');

	}

}