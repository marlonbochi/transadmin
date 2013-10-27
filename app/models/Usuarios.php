<?php

class Usuarios extends Eloquent 
{
	function busca_usuarios(){		
		$usuarios = DB::table('usuario_cms')->join('perfil_cms','usuario_cms.id_perfil','=','perfil_cms.id_perfil')
											->select('usuario_cms.id_usuario', 'perfil_cms.id_perfil', 'perfil_cms.nome as perfil', 'usuario_cms.nome_usuario','usuario_cms.usuario')
											->get();

		return $usuarios;
	}

	function insert_usuario($array_incluir){		
		$usuario = DB::table('usuario_cms')->insert($array_incluir);

		return 'Inserido com sucesso';
	}

	function update_usuario($id_usuario, $array_update){

		DB::table('usuario_cms')
            ->where('id_usuario', $id_usuario)
            ->update($array_update);

        return 'Atualizado com sucesso';

	}

	function delete_usuario($id_usuario){

		DB::table('usuario_cms')->where('id_usuario', '=', $id_usuario)->delete();

        return 'Excluido com sucesso';
	}

	//busca unica
	function busca_usuario($id_usuario){		
		$usuario = DB::table('usuario_cms')->where('id_usuario', '=', $id_usuario)->first();

		return $usuario;
	}

	function busca_perfis(){		
		$perfis = DB::table('perfil_cms')->get();

		return $perfis;
	}

}