<div class="header">
	<h1><a href="{{URL::to('/')}}"></a></h1>
	<div class="nome_logado">
		<span>Olá {{Session::get('usuario_nome')}}</span>
	</div>
    <div class='menu'>    
	    <ul id="mainNav">
	    	<li><a href="<?=URL::to('/');?>" class="<?= Request::segment(1) != 'usuarios'? 'active': '';?>">HOME</a></li> <!-- Use the "active" class for the active menu item  -->
	    	<!-- <li><a href="<?=URL::to('usuarios');?>" class='<?= Request::segment(1) == 'usuarios'? 'active': '';?>'>USUÁRIOS</a></li> -->
	    	<li class="logout"><a href="<?=URL::to('logout');?>">LOGOUT</a></li>	    
	    </ul>
    </div>
    <div class="clear"></div>
</div>
