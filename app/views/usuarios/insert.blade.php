<h2><a href="{{$link_pagina}}">{{$title_pagina}}</a> &raquo; <a href="{{$link_acao}}" class="active">{{$acao}}</a></h2>

<div id="main">
	<fieldset>
		<span class="error_form">Preencha os campos em Destaque</span>
		<form action="<?=URL::to('usuarios/insert');?>" class='form' method='POST'>
			<p>
				<label>Nome do Usuário*:</label><input type="text" name='nome_usuario' class="text-long" data-myroles="required" value=''/>
			</p>
			<p>
				<label>Usuário*:</label><input type="text" name='usuario' class="text-long" data-myroles="required" value=''/>
			</p>
			<p>
				<label>Senha*:</label><input type="password" name='senha' class="text-medium" data-myroles="required" value=''/>
			</p>
			<p>
				<label>Perfil:</label>
				<select class='chzn-select select' data-placeholder="Selecione o Perfil" name='id_perfil'>
					<?php foreach ($perfis as $perfil) { ?>
					<option value='<?=$perfil->id_perfil;?>'><?=$perfil->nome;?></option>
					<?php } ?>
				</select>
			</p>
		    <input type="submit" class='button-submit' value="Enviar" />
		</form>
	</fieldset>
</div>