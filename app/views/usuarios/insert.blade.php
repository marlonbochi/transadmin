<h2><a href="{{$link_pagina}}">{{$title_pagina}}</a> &raquo; <a href="{{$link_acao}}" class="active">{{$acao}}</a></h2>

<div id="main">
	<fieldset>
		<span class="error_form">Preencha os campos em Destaque</span>
		<form action="<?=URL::to('usuario/insert');?>" class='form' method='POST'>
			<p>
				<label>Nome do Usuário*:</label><input type="text" name='nome_usuario' class="text-long" value=''/>
			</p>
                        <p>
				<label>E-mail:</label><input type="text" name='email_usuario' class="text-long" value=''/>
			</p>
			<p>
				<label>Login*:</label><input type="text" name='login_usuario' class="text-long" data-myroles="required" value=''/>
			</p>
			<p>
				<label>Senha*:</label><input type="password" name='senha_usuario' class="text-medium" data-myroles="required" value=''/>
			</p>
			<p>
				<label>Perfil*:</label>
				<select class='chzn-select select' data-placeholder="Selecione o Perfil" name='id_perfil'>
					<?php foreach ($perfis as $perfil) { ?>
					<option value='<?=$perfil->id_perfil;?>'><?=$perfil->nome_perfil;?></option>
					<?php } ?>
				</select>
			</p>
		    <p>
				<a class='cancelar_btn cancelar' href="{{URL::to('usuario')}}">Cancelar</a>
			    <input type="submit" class='button-submit btn_salvar' value="Salvar" />
		    </p>
		</form>
	</fieldset>
</div>