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
			echo '<script language="JavaScript">location.href="'.URL::to('login').'"</script>';
		}

		//Busca modulos e define o menu
		$modulo_model = New Comum();
                $modulo_usuario = Session::get('usuario_modulos');
                if(!empty($modulo_usuario)){
                    foreach($modulo_usuario as $modulo){
                        $where[] = array('parametro1' => 'id_modulo',
                                         'sinal' => '=',
                                         'parametro2' => $modulo->id_modulo);
                    }   
                    $modulos = $modulo_model->select_table('modulo', null, 'nome_modulo', null, $where);
                }else{
                    $modulos = null;
                }
                
		

		$menu = View::make('comum.menu');
		$menu->modulos = $modulos;

		$this->layout->menu = $menu;
		//Busca modulos e define o menu
	}

}