<h2><a href="{{$link_pagina}}">{{$title_pagina}}</a> &raquo; <a href="{{$link_acao}}" class="active">{{$acao}}</a></h2>

<div id="main">
	<fieldset>
		<span class="error_form">Preencha os campos em Destaque</span>
		<form action="<?=URL::to('perfil/insert');?>" class='form' method='POST'>
			<p>
				<label>Nome do Perfil*:</label><input type="text" name='nome_perfil' class="text-long" value=''/>
			</p>
			<p>
				<label>Módulos*:</label>
				<select class='chzn-select select' style='width: 300px;' data-placeholder="Clique para selecionar..." name='id_modulo[]' multiple>
					<?php foreach ($modulos as $modulo) { ?>
					<option value='<?=$modulo->id_modulo;?>'><?=$modulo->nome_modulo;?></option>
					<?php } ?>
				</select>
			</p>
		    <input type="submit" class='button-submit' value="Enviar" />
		</form>
	</fieldset>
</div>