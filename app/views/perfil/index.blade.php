<div class="conteudo_usuario">
    <h2><a href="{{$link_pagina}}">{{$title_pagina}}</a> &raquo; <a href="{{$link_acao}}" class="active">{{$acao}}</a></h2>
    <div class="mensagem negrito">{{$mensagem}}</div>
    <div id="main">    
    <div class='div_insert'><a href="<?php echo URL::to('perfil/insert');?>" class='button-submit btn_insert'>Inserir Perfil</a></div>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>Nome</th>
            <th></td>
        </tr> 
        <?php foreach ($perfis as $perfil) { ?>
        <tr>
            <td><?=$perfil->nome_perfil;?></td>
            <td class="action">
                <a href="<?php echo URL::to('perfil/update/'.$perfil->id_perfil);?>" class="edit">Editar</a>
                <a href="<?php echo URL::to('perfil/delete/'.$perfil->id_perfil);?>" onclick="return confirm('Deseja realmente excluir este registro?');" class="delete">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    </div>
</div>