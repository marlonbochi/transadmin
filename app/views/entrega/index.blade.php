<div class="conteudo">
    <h2><a href="#">{{$title_pagina}}</a> &raquo; <a href="#" class="active">{{$acao}}</a></h2>
    <div class="mensagem">{{$mensagem}}</div>
    <div id="main">
    <div class='div_insert'><a href="<?php echo URL::to('entrega/insert');?>" class='button-submit btn_insert'>Inserir Entrega</a></div>
    <table cellpadding="0" cellspacing="0">
    	<tr>
            <th>Cliente</th>
            <th>Valor Entrega</th>
            <th>Data da Entrega</th>
            <th>Efetuada</th>
            <th></th>
        </tr>     	
        <?php foreach ($entregas as $entrega) { ?>
        <tr>
            <td>{{$entrega->nome_cliente}}</td>
            <td>{{number_format($entrega->valor_entrega, 2, ',', '.')}}</td>
            <td>{{date("d/m/Y", strtotime($entrega->data_entrega))}}</td>
            <td>{{$entrega->efetuada_entrega == 'S' ? 'Sim':'Não'}}</td>
            <td class="action">
                <a href="<?php echo URL::to('entrega/update/'.$entrega->id_entrega);?>" class="edit">Editar</a>
                <a href="<?php echo URL::to('entrega/delete/'.$entrega->id_entrega);?>" onclick="return confirm('Deseja realmente excluir este registro?');" class="delete">Excluir</a>
            </td>
        </tr>
        <?php } ?>                                  
    </table>
    {{$entregas->links()}}
    </div>
</div>