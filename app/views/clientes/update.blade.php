<h2><a href="<?=URL::to('clientes')?>">{{$title_pagina}}</a> &raquo; <a href="#" class="active">{{$acao}}</a></h2>

<div id="main">
	<fieldset>
		<p>
			<span class="error_form">Preencha os campos em destaque!</span>
		</p>
		<form action="<?=URL::to('clientes/update/'.$id_cliente);?>" class='form'>
			<p>
				<label>Nome Completo:</label>
				<input type="text" class="text-long" name='nome_cliente' data-myroles="required" value='{{$cliente->nome_cliente}}'/>
			</p>
			<p>
				<label>E-mail:</label>
				<input type="text" class="text-long" name='email_cliente' data-myroles="required" value='{{$cliente->email_cliente}}'/>
			</p>
			<p>
				<label>Senha:</label>
				<input type="password" class="text-long" name='senha_cliente' placeholder='Preenchendo aqui trocará a senha!'/>
			</p>
		    <p>
			    <label>Sexo:</label>		    
			    <select class='chzn-select select' name='sexo_cliente' data-placeholder="Selecione">
			    	<option></option>
			    	<option value='M' <?=($cliente->sexo_cliente == 'M')?"selected":""; ?>>Masculino</option>
			    	<option value='F' <?=($cliente->sexo_cliente == 'F')?"selected":""; ?>>Feminino</option>
			    </select>
		    </p>
		    <p>
				<label>Data de Nascimento:</label>
				<input type="text" class="text-small data" name='data_nascimento_cliente' data-myroles="required" style='width: 60px;' value='{{date("d/m/Y", strtotime($cliente->data_nascimento_cliente))}}'/>
			</p>
			<p>
				<label>CPF:</label>
				<input type="text" class="text-medium cpf" name='cpf_cliente' data-myroles="required" value='{{$cliente->cpf_cliente}}'/>
			</p>
			<p>
				<label>Telefone Residencial:</label>
				<input type="text" class="text-medium telefone" name='tel_residencial_cliente' data-myroles="required" value='{{$cliente->tel_residencial_cliente}}'/>
			</p>
			<p>
				<label>Telefone Comercial:</label>
				<input type="text" class="text-medium telefone" name='tel_comercial_cliente' value='{{$cliente->tel_comercial_cliente}}'/>
			</p>
			<p>
				<label>Celular:</label>
				<input type="text" class="text-medium telefone" name='celular_cliente' data-myroles="required" value='{{$cliente->celular_cliente}}'/>
			</p>
			<p></p>
			<p>
				<label><b>Dados de Entrega</b></label>
			</p>
			<p></p>
			<p>
				<label>CEP:</label>
				<input type="text" class="text-medium cep" name='cep_endereco' data-myroles="required" style='width: 55px;' value='{{$endereco->cep_endereco}}'/>
				<input type="button" class='button-submit busca_cep' value="Busca CEP" style='float: left;'/>
				<input type="text" style='display:none;' name='id_endereco' value='{{$endereco->id_endereco}}'>
			</p>
			<p>
				<label>Endereço:</label>
				<input type="text" class="text-long endereco" name='endereco' data-myroles="required" value='{{$endereco->endereco}}'/>
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
				<label>Bairro:</label>
				<input type="text" class="text-medium bairro_endereco" name='bairro_endereco' data-myroles="required" value='{{$endereco->bairro_endereco}}'/>
			</p>
			<p>
				<label>Cidade:</label>
				<input type="text" class="text-long cidade_endereco" name='cidade_endereco' data-myroles="required" value='{{$endereco->cidade_endereco}}'/>
			</p>
			<p>
				<label>Telefone Entrega:</label>
				<input type="text" class="text-long" name='telefone_endereco' value='{{$endereco->telefone_endereco}}'/>
			</p>			
		    <input type="submit" class='button-submit' value="Salvar" />
		</form>
	</fieldset>
</div>