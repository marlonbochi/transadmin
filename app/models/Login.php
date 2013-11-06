<?php

class Login extends Eloquent 
{
	function busca_usuario($usuario, $senha){

		$retorno = DB::table('usuario')->where('usuario','=',$usuario)
										   ->where('senha','=',md5($senha))
										   ->first();

		return $retorno;
	}
}