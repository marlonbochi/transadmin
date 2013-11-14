<?php

class Comum extends Eloquent 
{
	
	function select_table($nome_tabela, $where = null, $order = null, $paginacao = null, $WhereOr = null, $Join = Null, $select = Null){
            $resultado = DB::table($nome_tabela);
			
			if(!empty($select)){
				$resultado->select($select);
			}		
			
            if(!empty($order)){
                $resultado->orderby($order);
            }

            if(!empty($where)){
                    foreach ($where as $value) {
                        $resultado->where($value['parametro1'],$value['sinal'], $value['parametro2']);
                    }
            }

            if(!empty($WhereOr)){                                            
                    foreach ($WhereOr as $value) {
                        $resultado->orwhere($value['parametro1'],$value['sinal'], $value['parametro2']);
                    }
            }
            if(!empty($Join)){
                foreach ($Join as $value) {
                    $resultado->join($value['tabela_join'], $value['parametro1'], $value['sinal'], $value['parametro2']);
                }
            }

            if(!empty($paginacao)){
                    if($paginacao == 1){
                        $retorno = $resultado->first();							
                    }else{
                        $retorno = $resultado->paginate($paginacao);							
                    }

            }else{
                $retorno = $resultado->get();
            }

            return $retorno;
	}

	function insert_table($nome_tabela, $campos, $retornaid = null){

		$resultado = DB::table($nome_tabela);

		if(!empty($retornaid)){
			$retorno = $resultado->insertGetId($campos);
			return $retorno;
		}else{
			$resultado->insert($campos);
			return;
		}

	}

	function update_table($nome_tabela, $campos, $where){

		$resultado = DB::table($nome_tabela);

		foreach ($where as $key => $value) {
			$resultado->where($value['parametro1'],$value['sinal'],$value['parametro2']);
		}

		$resultado->update($campos);
		return;

	}
	function delete_table($nome_tabela, $where){

		$resultado = DB::table($nome_tabela);

		foreach ($where as $value) {
			$resultado->where($value['parametro1'],$value['sinal'],$value['parametro2']);
		}

		$resultado->delete();
		return;
	}

}