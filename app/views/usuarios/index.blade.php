<div class="conteudo_usuario">
    <h2><a href="{{$link_pagina}}">{{$title_pagina}}</a> &raquo; <a href="{{$link_acao}}" class="active">{{$acao}}</a></h2>
    <div class="mensagem negrito">{{$mensagem}}</div>
    <div id="main">    
    <div class='div_insert'><a href="<?php echo URL::to('usuario/insert/');?>" class='button-submit btn_insert'>Inserir Usuário</a></div>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>Nome Usuário</th>
            <th>E-mail</th>
            <th>Perfil</th>
            <th></td>
        </tr> 
        <?php foreach ($usuarios as $usuario) { ?>
        <tr>
            <td><?=$usuario->nome_usuario;?></td>
            <td><?=$usuario->email_usuario;?></td>
            <td><?=$usuario->perfil;?></td>
            <td class="action">
                <a href="<?php echo URL::to('usuario/update/'.$usuario->id_usuario);?>" class="edit">Editar</a>
                <a href="<?php echo URL::to('usuario/delete/'.$usuario->id_usuario);?>" onclick="return confirm('Deseja realmente excluir este registro?');" class="delete">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    </div>
</div>