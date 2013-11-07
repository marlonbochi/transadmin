<?php

class Usuario extends Eloquent 
{
	function busca_usuarios(){		
		$usuarios = DB::table('usuario')->join('perfil','usuario.id_perfil','=','perfil.id_perfil')
                                                    ->select('usuario.id_usuario', 'perfil.id_perfil', 'perfil.nome_perfil as perfil', 'usuario.nome_usuario', 'usuario.login_usuario', 'usuario.email_usuario')
                                                    ->get();

		return $usuarios;
	}

	function insert_usuario($array_incluir){		
		$usuario = DB::table('usuario')->insert($array_incluir);

		return 'Inserido com sucesso';
	}

	function update_usuario($id_usuario, $array_update){

		DB::table('usuario')->where('id_usuario', '=',  $id_usuario)
                                    ->update($array_update);

        return 'Atualizado com sucesso';

	}

	function delete_usuario($id_usuario){

		DB::table('usuario')->where('id_usuario', '=', $id_usuario)->delete();

        return 'Excluido com sucesso';
	}

	//busca unica
	function busca_usuario($id_usuario){		
		$usuario = DB::table('usuario')->where('id_usuario', '=', $id_usuario)->first();

		return $usuario;
	}

	function busca_perfis(){		
		$perfis = DB::table('perfil')->get();

		return $perfis;
	}

}