<?php

class HomeController extends BaseController {
	
	public function showWelcome()
	{

		$view = View::make('home.index');
		$this->layout->title = 'TransAdmin - Home';		
		$this->layout->content = $view;
		
		$new_modulo = New Comum();
		
		$where[] = array('parametro1' => 'data_entrega',
						 'sinal' => '>=',
						 'parametro2' => 'NOW()');
		$where[] = array('parametro1' => 'data_entrega',
						 'sinal' => '<=',
						 'parametro2' => 'NOW() + 7');
		$where[] = array('parametro1' => 'efetuada_entrega',
						 'sinal' => '<=',
						 'parametro2' => 'N');
		$join[] = array('tabela_join' => 'cliente',
						'parametro1' = > 'entrega.id_cliente',
						'sinal' => '=',
						'parametro2' => 'cliente.id_cliente');
		$entregas = $new_modulo->select_table('entrega', $where, null, null, null, $join);
		
		$view->entregas = $entregas;
	}
}