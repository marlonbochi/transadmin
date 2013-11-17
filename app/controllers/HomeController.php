<?php

class HomeController extends BaseController {
	
	public function showWelcome()
	{
		Asset::add('/comum/js/home.js');
		$view = View::make('home.index');
		$this->layout->title = 'TransAdmin - Home';		
		$this->layout->content = $view;
		
		$new_modulo = New Comum();
	
		$entregas = DB::select('select * from entrega inner join cliente on entrega.id_cliente = cliente.id_cliente
					where data_entrega >= DATE(now()) and data_entrega <= DATE(now()) + 7 and efetuada_entrega = "N"
					Order By data_entrega ASC');
		

		$view->entregas = $entregas;
	}
}