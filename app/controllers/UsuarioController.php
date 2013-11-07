<?php

class UsuarioController extends BaseController 
{
	public function showWelcome($mensagem = null)
	{
		$view = View::make('usuarios.index');
		$this->layout->title = 'CMS - Usuários';

		//acoes da pagina
		$view->title_pagina = 'Usuários';
		$view->link_pagina = URL::to('usuarios');
		$view->acao = 'Busca';
                $view->link_acao = URL::to('usuarios');

		$new_modulo = new Usuario();
		$usuarios = $new_modulo->busca_usuarios();

		$view->mensagem =  $mensagem;
		$view->usuarios = $usuarios;
		$this->layout->content = $view;

	}

	public function action_insert()
	{

		$view = View::make('usuarios.insert');
		$this->layout->title = 'CMS - Usuários::Inserção';

		//acoes da pagina
		$view->title_pagina = 'Usuários';
		$view->link_pagina = URL::to('usuarios');
		$view->acao = 'Inserção';
		$view->link_acao =  URL::to('usuarios/insert');

		$new_modulo = new Usuario();

		$perfis = $new_modulo->busca_perfis();

		$view->perfis = $perfis;

		if (Input::has('login_usuario')) {			
			$array_incluir['login_usuario'] = Input::get('login_usuario');
			$array_incluir['senha_usuario'] = md5(Input::get('senha_usuario'));
			$array_incluir['nome_usuario'] =Input::get('nome_usuario');
                        $array_incluir['email_usuario'] =Input::get('email_usuario');
			$array_incluir['id_perfil'] =Input::get('id_perfil');			
			$mensagem = $new_modulo->insert_usuario($array_incluir);

			return Redirect::action('UsuarioController@showWelcome', $mensagem);
		}

		$this->layout->content = $view;

	}


	public function action_update($id = null)
	{

		$view = View::make('usuarios.update');
		$this->layout->title = 'CMS - Usuários::Edição';

		//acoes da pagina
		$view->title_pagina = 'Usuários';
		$view->link_pagina = URL::to('usuario');
		$view->acao = 'Edição';
		$view->link_acao =  URL::to('usuario/update/'.$id);

		$new_modulo = new Usuario();

		$perfis = $new_modulo->busca_perfis();

		$view->perfis = $perfis;

		if (Input::has('login_usuario')) {			
			$array_update['login_usuario'] = Input::get('login_usuario');

			$senha = Input::get('senha_login');
			if (!empty($senha)){
				$array_update['senha_usuario'] = md5(Input::get('senha_usuario'));
			}	

			$array_update['nome_usuario'] =Input::get('nome_usuario');
                        $array_update['email_usuario'] =Input::get('email_usuario');
			$array_update['id_perfil'] =Input::get('id_perfil');

			$mensagem = $new_modulo->update_usuario($id, $array_update);

			return Redirect::action('UsuarioController@showWelcome', $mensagem);
		}

		$usuario = $new_modulo->busca_usuario($id);
		$view->usuario = $usuario;		

		$this->layout->content = $view;

	}


	public function action_delete($id = null)
	{

		if ($id) {
			$new_modulo = new Usuario();

			$mensagem = $new_modulo->delete_usuario($id);
		}

		return Redirect::action('UsuarioController@showWelcome', $mensagem);

	}

}