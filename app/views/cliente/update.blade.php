<h2><a href="<?=URL::to('clientes')?>">{{$title_pagina}}</a> &raquo; <a href="#" class="active">{{$acao}}</a></h2>

<div id="main">
	<fieldset>
		<p>
			<span class="error_form">Preencha corretamente os campos em destaque!</span>
		</p>
		<form action="<?=URL::to('cliente/update/'.$id_cliente);?>" class='form'>
			<p>
				<label>Nome Completo*:</label>
				<input type="text" class="text-long" name='nome_cliente' data-myroles="required" value='{{$cliente->nome_cliente}}'/>
			</p>
			<p>
				<label>E-mail*:</label>
				<input type="text" class="text-long" name='email_cliente' data-myroles="required|email" value='{{$cliente->email_cliente}}'/>
			</p>
                        <p>
				<label>Data de Nascimento*:</label>
				<input type="text" class="text-small data" name='data_nascimento_cliente' data-myroles="required" style='width: 60px;' value='{{date("d/m/Y", strtotime($cliente->data_nascimento_cliente))}}'/>
			</p>
			<p>
				<label>CPF*:</label>
				<input type="text" class="text-medium cpf" name='cpf_cliente' data-myroles="required" value='{{$cliente->cpf_cliente}}'/>
			</p>
                        <p>
				<label>RG:</label>
				<input type="text" class="text-medium" name='rg_cliente' value='{{$cliente->rg_cliente}}'/>
			</p>
			<p>
				<label>Telefone*:</label>
				<input type="text" class="text-medium telefone" name='telefone_cliente' value='{{$cliente->telefone_cliente}}'/>
			</p>
			<p>
				<label>Celular:</label>
				<input type="text" class="text-medium telefone" name='celular_cliente' value='{{$cliente->celular_cliente}}'/>
			</p>
			<p></p>
			<p>
				<label><b>Endereço</b></label>
			</p>
			<p></p>
			<p>
				<label>CEP*:</label>
				<input type="text" class="text-medium cep" name='cep_endereco' data-myroles="required" style='width: 55px;' value='{{$endereco->cep_endereco}}'/>
				<input type="button" class='button-submit busca_cep' value="Busca CEP" style='float: left;'/>
				<input type="text" style='display:none;' name='id_endereco' value='{{$endereco->id_endereco}}'>
			</p>
			<p>
				<label>Logradouro*:</label>
				<input type="text" class="text-long endereco" name='logradouro_endereco' data-myroles="required" value='{{$endereco->logradouro_endereco}}'/>
			</p>
			<p>
				<label>Número:</label>
				<input type="text" class="text-small" name='numero_endereco' data-myroles="required" value='{{$endereco->numero_endereco}}'/>
			</p>
			<p>
				<label>Complemento:</label>
				<input type="text" class="text-long" name='complemento_endereco' value='{{$endereco->complemento_endereco}}'/>
			</p>
			<p>
				<label>Bairro*:</label>
				<input type="text" class="text-medium bairro_endereco" name='bairro_endereco' data-myroles="required" value='{{$endereco->bairro_endereco}}'/>
			</p>
			<p>
				<label>Cidade*:</label>
				<input type="text" class="text-long cidade_endereco" name='cidade_endereco' data-myroles="required" value='{{$endereco->cidade_endereco}}'/>
			</p>	
                        <p>
				<label>UF*:</label>
				<input type="text" class="text-long uf_endereco" name='uf_endereco' data-myroles="required" value='{{$endereco->uf_endereco}}'/>
			</p>
		    <p>
				<a class='cancelar_btn cancelar' href="javascript:history.go(-1);">Voltar</a>
			    <input type="submit" class='button-submit btn_salvar' value="Salvar" />
		    </p>	
		</form>
	</fieldset>
</div>