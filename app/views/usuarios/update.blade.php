<h2><a href="{{$link_pagina}}">{{$title_pagina}}</a> &raquo; <a href="{{$link_acao}}" class="active">{{$acao}}</a></h2>

<div id="main">
	<fieldset>
		<form action="<?=URL::to('usuario/update/'.$usuario->id_usuario);?>" class='form' method='POST'>
			<p>
				<label>Nome:</label><input type="text" name='nome_usuario' class="text-long" data-myroles="required" value='<?=$usuario->nome_usuario;?>'/>
			</p>
                        <p>
				<label>E-mail:</label><input type="text" name='email_usuario' class="text-long" value='<?=$usuario->email_usuario;?>'/>
			</p>
			<p>
				<label>Usuário:</label><input type="text" name='login_usuario' class="text-long" data-myroles="required" value='<?=$usuario->login_usuario;?>'/>
			</p>
			<p>
				<label>Senha:</label><input type="password" name='senha_usuario' class="text-long" placeholder='Preenchendo irá alterar a senha' value=''/>
			</p>
			<p>
				<label>Perfil:</label>
				<select class='chzn-select select' data-placeholder="Selecione o Perfil"  name='id_perfil'>
					<?php foreach ($perfis as $perfil) { ?>

					<option value='<?=$perfil->id_perfil;?>' <?= ($perfil->id_perfil == $usuario->id_perfil) ? 'selected': '';?>><?=$perfil->nome_perfil;?></option>

					<?php } ?>
				</select>
			</p>
			<input type="text" name='confirma' value='S' style='display:none;'>
		    <input type="submit" class='button-submit' value="Enviar" />
		</form>
	</fieldset>
</div>