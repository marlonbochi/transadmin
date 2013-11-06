<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	protected $layout = 'layouts.comum';
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

		if ((Session::get('usuario_permitido') != 'S' or Session::get('usuario_nome') == '') and Request::segment(1) != 'login'){
			echo '<meta http-equiv="refresh" content="0;url='.URL::to('login').'">';
		}

		//Busca modulos e define o menu
		$modulo_model = New Comum();

		$modulos = $modulo_model->select_table('modulo', null, 'nome_modulo');

		$menu = View::make('comum.menu');
		$menu->modulos = $modulos;

		$this->layout->menu = $menu;
		//Busca modulos e define o menu
	}

}