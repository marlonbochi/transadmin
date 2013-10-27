<div class='corpo_login'>
	<div class='meio_login'>
		<div class='form_login'>
			<div class='texto_login'>
				<span>Preencha os Campos para acessar:</span>
			</div>
			<form class='form_logar' action='<?php echo URL::to('logar');?>' method='POST'>
				<input class='email_login' name='usuario' type='text' data-myroles="required" placeholder='Usuário'>
				<input class='senha_login' name='senha' type='password' data-myroles="required" placeholder='Senha'>				
				<input class='botao_login' type="submit" value='Entrar'>
				<div class='error_msg'>
					<span class='error_form'>Preencha os campos destacados!</span>
				</div>
				<div class="mensagem">{{$mensagem}}</div>
			</form>
		</div>
	</div>
</div>