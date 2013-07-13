<h2><a href="#">{{$title_pagina}}</a> &raquo; <a href="#" class="active">{{$acao}}</a></h2>

<div id="main">

<div class='div_insert'><a href="<?php echo URL::to('clientes/insert');?>" class='button-submit btn_insert'>Inserir cliente</a></div>
<table cellpadding="0" cellspacing="0">
	<tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th></td>
    </tr> 
	<tr>
        <td>Marlon Bueno Bochi</td>
        <td>(54)9225-6245</td>
        <td>marlon.bueno@gmail.com</td>
        <td class="action"><a href="#" class="view">Visualizar</a><a href="<?php echo URL::to('clientes/edit');?>" class="edit">Editar</a><a href="#" class="delete">Excluir</a></td>
    </tr>                          
</table>
</div>
<!-- // #main -->