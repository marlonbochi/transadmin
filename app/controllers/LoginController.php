<?php

class LoginController extends BaseController 
{
	//define o layout
	public $layout = 'layouts.login';

	public function showWelcome()
	{
		Asset::add('assets/js/login.js');
		Asset::add('assets/css/login.css');

		$view = View::make('login.index');

		$mensagem = Session::get('mensagem_erro_login');

		if (isset($mensagem)){
			$view->mensagem =  Session::get('mensagem_erro_login');

			Session::forget('mensagem_erro_login');
		}else{
			$view->mensagem =  '';
		}

		$this->layout->title = 'TransAdmin - Login';			

		$this->layout->content = $view;

	}

	public function action_logout()
	{
		Session::flush();
		return Redirect::action('LoginController@showWelcome');

	}

	public function action_logar(){

		$new_modulo = new Comum();
		$usuario = Input::get('usuario');
		$senha = Input::get('senha');

		$where[] = array('parametro1' => 'login_usuario',
						 'sinal' => '=',
						 'parametro2' => $usuario);

		$where[] = array('parametro1' => 'senha_usuario',
						 'sinal' => '=',
						 'parametro2' => md5($senha));

		$retorno = $new_modulo->select_table('usuario', $where, null, 1);

		if (!empty($retorno->senha_usuario)){
			Session::put('usuario_nome', $retorno->nome_usuario);
			Session::put('usuario_permitido', 'S');
			Session::put('usuario_perfil', $retorno->id_perfil);
			return Redirect::action('HomeController@showWelcome');
		}else{
			Session::put('mensagem_erro_login', 'Usuário ou Senha errados.');
			return Redirect::action('LoginController@showWelcome');
		}

	}
}