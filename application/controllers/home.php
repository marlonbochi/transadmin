<?php

class Home_Controller extends Base_Controller 
{
	public function action_index()
	{

		$view = View::make('home.index');
		$this->layout->title = 'Home';		
		$this->layout->content = $view;

	}
}