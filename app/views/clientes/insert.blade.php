<h2><a href="<?=URL::to('clientes')?>">{{$title_pagina}}</a> &raquo; <a href="#" class="active">{{$acao}}</a></h2>

<div id="main">
	<fieldset>
		<p>
			<span class="error_form">Preencha os campos em destaque!</span>
		</p>
		<form action="<?=URL::to('clientes/insert');?>" class='form'>
			<p>
				<label>Nome Completo:</label>
				<input type="text" class="text-long" name='nome_cliente' data-myroles="required"/>
			</p>
			<p>
				<label>E-mail:</label>
				<input type="text" class="text-long" name='email_cliente' data-myroles="required"/>
			</p>
			<p>
				<label>Senha:</label>
				<input type="password" class="text-medium" name='senha_cliente' data-myroles="required" />
			</p>
		    <p>
			    <label>Sexo:</label>		    
			    <select class='chzn-select select' name='sexo_cliente' data-placeholder="Selecione">
			    	<option></option>
			    	<option value='M'>Masculino</option>
			    	<option value='F'>Feminino</option>
			    </select>
		    </p>
		    <p>
				<label>Data de Nascimento:</label>
				<input type="text" class="text-small data" name='data_nascimento_cliente' data-myroles="required" style='width: 60px;'/>
			</p>
			<p>
				<label>CPF:</label>
				<input type="text" class="text-medium cpf" name='cpf_cliente' data-myroles="required"/>
			</p>
			<p>
				<label>Telefone Residencial:</label>
				<input type="text" class="text-medium telefone" name='tel_residencial_cliente' data-myroles="required"/>
			</p>
			<p>
				<label>Telefone Comercial:</label>
				<input type="text" class="text-medium telefone" name='tel_comercial_cliente'/>
			</p>
			<p>
				<label>Celular:</label>
				<input type="text" class="text-medium telefone" name='celular_cliente' data-myroles="required"/>
			</p>
			<p></p>
			<p>
				<label><b>Dados de Entrega</b></label>
			</p>
			<p></p>
			<p>
				<label>CEP:</label>
				<input type="text" class="text-medium cep" name='cep_endereco' data-myroles="required" style='width: 55px;'/>
				<input type="button" class='button-submit busca_cep' value="Busca CEP" style='float: left;'/>
			</p>
			<p>
				<label>Endereço:</label>
				<input type="text" class="text-long endereco" name='endereco' data-myroles="required"/>
			</p>
			<p>
				<label>Número:</label>
				<input type="text" class="text-small" name='numero_endereco' data-myroles="required"/>
			</p>
			<p>
				<label>Complemento:</label>
				<input type="text" class="text-long" name='complemento_endereco'/>
			</p>
			<p>
				<label>Bairro:</label>
				<input type="text" class="text-medium bairro_endereco" name='bairro_endereco' data-myroles="required" />
			</p>
			<p>
				<label>Cidade:</label>
				<input type="text" class="text-long cidade_endereco" name='cidade_endereco' data-myroles="required"/>
			</p>
			<p>
				<label>Telefone Entrega:</label>
				<input type="text" class="text-long" name='telefone_endereco'/>
			</p>			
		    <input type="submit" class='button-submit' value="Salvar" />
		</form>
	</fieldset>
</div>