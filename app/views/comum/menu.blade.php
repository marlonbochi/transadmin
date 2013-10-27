<div id="sidebar">
	<ul class="sideNav">
    	<li><a href="<?=URL::to('clientes');?>" class="<?= Request::segment(1) == 'clientes'? 'active': '';?>">Clientes</a></li>
    	<li><a href="<?=URL::to('portifolio');?>" class="<?= Request::segment(1) == 'portifolio'? 'active': '';?>">Portifólio</a></li>
    	<li><a href="<?=URL::to('eventos');?>" class="<?= Request::segment(1) == 'eventos'? 'active': '';?>">Eventos</a></li>
    	<li><a href="<?=URL::to('pedidos');?>" class="<?= Request::segment(1) == 'pedidos'? 'active': '';?>">Pedidos</a></li>
    	<li><a href="<?=URL::to('contato');?>" class="<?= Request::segment(1) == 'contato'? 'active': '';?>">Contato</a></li>
    </ul>
    <!-- // .sideNav -->
</div>    
<!-- // #sidebar -->