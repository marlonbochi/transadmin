<div id="sidebar">
	<ul class="sideNav">
	<?php foreach ($modulos as $value) { ?>
    	<li><a href="<?=URL::to($value->nome_programa_modulo);?>" class="<?= Request::segment(1) == $value->nome_programa_modulo ? 'active': '';?>">{{$value->nome_modulo}}</a></li>
    <?php } ?>
    </ul>
    <!-- // .sideNav -->
</div>    
<!-- // #sidebar -->