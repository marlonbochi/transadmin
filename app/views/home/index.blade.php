<div class="conteudo">
    <div id="main">
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
        </tr>
        <?php } ?>                                  
    </table>
    {{$entregas->links()}}
    </div>
</div>