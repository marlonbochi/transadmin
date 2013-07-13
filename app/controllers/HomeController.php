<?php

class HomeController extends BaseController {
	
	public function showWelcome()
	{

		$view = View::make('home.index');
		$this->layout->title = 'TransAdmin - Home';		
		$this->layout->content = $view;

	}
}