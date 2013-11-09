<div class="conteudo">
    <h2><a href="#">{{$title_pagina}}</a> &raquo; <a href="#" class="active">{{$acao}}</a></h2>
    <div class="mensagem">{{$mensagem}}</div>
    <div id="main">
    <div class='div_insert'><a href="<?php echo URL::to('cliente/insert');?>" class='button-submit btn_insert'>Inserir cliente</a></div>
    <table cellpadding="0" cellspacing="0">
    	<tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th></td>
        </tr>     	
        <?php foreach ($clientes as $cliente) { ?>
        <tr>
            <td>{{$cliente->nome_cliente}}</td>
            <td>{{$cliente->telefone_cliente}}</td>
            <td>{{$cliente->email_cliente}}</td>
            <td class="action">
                <a href="<?php echo URL::to('cliente/update/'.$cliente->id_cliente);?>" class="edit">Editar</a>
                <a href="<?php echo URL::to('cliente/delete/'.$cliente->id_cliente);?>" onclick="return confirm('Deseja realmente excluir este registro?');" class="delete">Excluir</a>
            </td>
        </tr>
        <?php } ?>                                  
    </table>
    {{$clientes->links()}}
    </div>
</div>