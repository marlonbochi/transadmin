<div class="header">
	<h1><a href="#"><span>Transdmin Light</span></a></h1>
    <div class='menu'>    
	    <ul id="mainNav">
	    	<li><a href="<?=URL::to('/');?>" class="<?= Request::segment(1) != 'usuarios'? 'active': '';?>">HOME</a></li> <!-- Use the "active" class for the active menu item  -->
	    	<!-- <li><a href="<?=URL::to('usuarios');?>" class='<?= Request::segment(1) == 'usuarios'? 'active': '';?>'>USUÁRIOS</a></li> -->
	    	<li class="logout"><a href="<?=URL::to('logout');?>">LOGOUT</a></li>	    
	    </ul>
    </div>
</div>
