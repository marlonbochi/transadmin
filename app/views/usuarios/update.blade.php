<h2><a href="{{$link_pagina}}">{{$title_pagina}}</a> &raquo; <a href="{{$link_acao}}" class="active">{{$acao}}</a></h2>

<div id="main">
	<fieldset>
		<form action="<?=URL::to('usuarios/update/'.$usuario->id_usuario);?>" class='form' method='POST'>
			<p>
				<label>Nome:</label><input type="text" name='nome_usuario' class="text-long" data-myroles="required" value='<?=$usuario->nome_usuario;?>'/>
			</p>
			<p>
				<label>Usuário:</label><input type="text" name='usuario' class="text-long" data-myroles="required" value='<?=$usuario->usuario;?>'/>
			</p>
			<p>
				<label>Senha:</label><input type="password" name='senha' class="text-long" placeholder='Preenchendo irá alterar a senha' value=''/>
			</p>
			<p>
				<label>Perfil:</label>
				<select class='chzn-select select' data-placeholder="Selecione o Perfil"  name='id_perfil'>
					<?php foreach ($perfis as $perfil) { ?>

					<option value='<?=$perfil->id_perfil;?>' <?= ($perfil->id_perfil == $usuario->id_perfil) ? 'selected': '';?>><?=$perfil->nome;?></option>

					<?php } ?>
				</select>
			</p>
			<input type="text" name='confirma' value='S' style='display:none;'>
		    <input type="submit" class='button-submit' value="Enviar" />
		</form>
	</fieldset>
</div>