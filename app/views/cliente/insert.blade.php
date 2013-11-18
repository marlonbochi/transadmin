<h2><a href="<?=URL::to('clientes')?>">{{$title_pagina}}</a> &raquo; <a href="#" class="active">{{$acao}}</a></h2>

<div id="main">
	<fieldset>
		<p>
			<span class="error_form">Preencha corretamente os campos em destaque!</span>
		</p>
		<form action="<?=URL::to('cliente/insert');?>" class='form'>
			<p>
				<label>Nome Completo*:</label>
				<input type="text" class="text-long" name='nome_cliente' data-myroles="required"/>
			</p>
			<p>
				<label>E-mail*:</label>
				<input type="text" class="text-long" name='email_cliente' data-myroles="required|email"/>
			</p>
                        <p>
				<label>Data de Nascimento*:</label>
				<input type="text" class="text-small data" name='data_nascimento_cliente' data-myroles="required" style='width: 60px;'/>
			</p>
			<p>
				<label>CPF*:</label>
				<input type="text" class="text-medium cpf" name='cpf_cliente' data-myroles="required"/>
			</p>
                        <p>
				<label>RG:</label>
				<input type="text" class="text-medium" name='rg_cliente'/>
			</p>
			<p>
				<label>Telefone*:</label>
				<input type="text" class="text-medium telefone" name='telefone_cliente' data-myroles="required"/>
			</p>
			<p>
				<label>Celular:</label>
				<input type="text" class="text-medium telefone" name='celular_cliente'/>
			</p>
			<p></p>
			<p>
				<label><b>Endereço</b></label>
			</p>
			<p></p>
			<p>
				<label>CEP*:</label>
				<input type="text" class="text-medium cep" name='cep_endereco' data-myroles="required" style='width: 55px;'/>
				<input type="button" class='button-submit busca_cep' value="Busca CEP" style='float: left;'/>
			</p>
			<p>
				<label>Logradouro*:</label>
				<input type="text" class="text-long logradouro_endereco" maxlength=155 name='logradouro_endereco' data-myroles="required"/>
			</p>
			<p>
				<label>Número:</label>
				<input type="text" class="text-small" name='numero_endereco' maxlength=10/>
			</p>
			<p>
				<label>Complemento:</label>
				<input type="text" class="text-long" name='complemento_endereco' maxlength=45/>
			</p>
			<p>
				<label>Bairro*:</label>
				<input type="text" class="text-medium bairro_endereco" maxlength=45 maxlength=45 name='bairro_endereco' data-myroles="required" />
			</p>
			<p>
				<label>Cidade*:</label>
				<input type="text" class="text-long cidade_endereco" maxlength=100 name='cidade_endereco' data-myroles="required"/>
			</p>
			<p>
				<label>UF*:</label>
				<input type="text" class="text-small uf_endereco" maxlength=2 name='uf_endereco' data-myroles="required"/>
			</p>		
			<p>
				<a class='cancelar_btn cancelar' href="{{URL::to('cliente')}}">Cancelar</a>
			    <input type="submit" class='button-submit btn_salvar' value="Salvar" />
		    </p>	
		</form>
	</fieldset>
</div>