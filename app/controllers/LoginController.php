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
		$this->layout->title = 'TransAdmin - Login';		
		$this->layout->content = $view;

	}
}