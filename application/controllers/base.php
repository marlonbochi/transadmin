<?php

class Base_Controller extends Controller {

	public $layout = 'layouts.comum';
	
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}