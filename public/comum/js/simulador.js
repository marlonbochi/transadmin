$(document).ready(function(){

    $('.busca_cep_origem').click(function(){
        var cep = $('.cep_origem').val();
        if (cep != undefined && cep != ''){
            cep = cep.replace("-", "");
            $.get('http://cep.republicavirtual.com.br/web_cep.php?cep='+cep+'&formato=json', function(data){
                if(data.resultado = 1){
                    $('.logradouro_origem_endereco').val(data.logradouro);
                    $('.bairro_origem_endereco').val(data.bairro);
                    $('.cidade_origem_endereco').val(data.cidade);
                    $('.uf_origem_endereco').val(data.uf);

                    if(data.cidade != ''){
                        $('.cidade_origem_endereco').attr('readonly', true);
                    }else{
                        $('.cidade_origem_endereco').attr('readonly', false);
                    }

                    if(data.uf != ''){
                        $('.uf_origem_endereco').attr('readonly', true);
                    }else{
                        $('.uf_origem_endereco').attr('readonly', false);
                    }
                }else{
                    alert('Não foi possivel encontrar informação para esse cep!');
                    $('.cidade_origem_endereco').attr('readonly', false);
                    $('.uf_origem_endereco').attr('readonly', false);
                }
            });
        }else{
            alert('Digite um CEP valido para efetuar a busca!');
            $('.cidade_origem_endereco').attr('readonly', false);
            $('.uf_origem_endereco').attr('readonly', false);
        }
    });

    $('.busca_cep_destino').click(function(){
        var cep = $('.cep_destino').val();
        if (cep != undefined && cep != ''){
            cep = cep.replace("-", "");
            $.get('http://cep.republicavirtual.com.br/web_cep.php?cep='+cep+'&formato=json', function(data){
                if(data.resultado = 1){
                    $('.logradouro_destino_endereco').val(data.logradouro);
                    $('.bairro_destino_endereco').val(data.bairro);
                    $('.cidade_destino_endereco').val(data.cidade);
                    $('.uf_destino_endereco').val(data.uf);

                    if(data.cidade != ''){
                        $('.cidade_destino_endereco').attr('readonly', true);
                    }else{
                        $('.cidade_destino_endereco').attr('readonly', false);
                    }

                    if(data.uf != ''){
                        $('.uf_destino_endereco').attr('readonly', true);
                    }else{
                        $('.uf_destino_endereco').attr('readonly', false);
                    }
                }else{
                    alert('Não foi possivel encontrar informação para esse cep!');
                    $('.cidade_destino_endereco').attr('readonly', false);        
                    $('.uf_destino_endereco').attr('readonly', false);
                }
            });
        }else{
            alert('Digite um CEP valido para efetuar a busca!');
            $('.cidade_destino_endereco').attr('readonly', false);        
            $('.uf_destino_endereco').attr('readonly', false);
        }
    });

    
	$('.cep_destino').keydown(function(){
        if($('.cep_destino').val().length = 0){
            $('.cidade_destino_endereco').attr('readonly', false);        
            $('.uf_destino_endereco').attr('readonly', false);
        }
    });
    $('.cep_origem').keydown(function(){
        if($('.cep_destino').val().length = 0){
            $('.cidade_origem_endereco').attr('readonly', false);        
            $('.uf_origem_endereco').attr('readonly', false);
        }
    });

    $('.simular').click(function(){
        var endereco_origem = $('.cep_origem_endereco').val() + ' ' + 
                              $('.logradouro_origem_endereco').val() + ' ' + 
                              $('.numero_origem_endereco').val() + ' ' + 
                              $('.bairro_origem_endereco').val() + ' ' +
                              $('.cidade_origem_endereco').val() + ' ' +
                              $('.uf_origem_endereco').val();

        var endereco_destino = $('.cep_destino_endereco').val() + ' ' + 
                               $('.logradouro_destino_endereco').val() + ' ' + 
                               $('.numero_destino_endereco').val() + ' ' + 
                               $('.bairro_destino_endereco').val() + ' ' +
                               $('.cidade_destino_endereco').val() + ' ' +
                               $('.uf_destino_endereco').val();


        //Instanciar o DistanceMatrixService
        var service = new google.maps.DistanceMatrixService();
        //executar o DistanceMatrixService
        service.getDistanceMatrix(
          {
              //Origem
              origins: [endereco_origem],
              //Destino
              destinations: [endereco_destino],
              //Modo (DRIVING | WALKING | BICYCLING)
              travelMode: google.maps.TravelMode.DRIVING,
              //Sistema de medida (METRIC | IMPERIAL)
              unitSystem: google.maps.UnitSystem.METRIC
              //Vai chamar o callback
          }, callback);
            
    });

   $('.valor_entrega').focus(function(){
        if($('.valor_entrega').val() == '' || $('.valor_entrega').val() == undefined){
            var valor_km = $('.valor_km_entrega').val();
            valor_km = valor_km.replace(',','.');
            if($('.km_percorrido_entrega').val() != '' && $('.valor_km_entrega').val() != ''){
                $('.valor_entrega').val(valor_km * $('.km_percorrido_entrega').val());
            }
        }
    });
});

function callback(response, status) {
    //Verificar o Status
    if (status != google.maps.DistanceMatrixStatus.OK)
        //Se o status não for "OK"
        alert('Ocorreu um erro na procura do endereço, tente novamente mais tarde ou revise os endereços.')
    else {        
        $('.km_percorrido_entrega').val((response.rows[0].elements[0].distance.value)/1000);
        //Atualizar o mapa
        $("#map").attr("src", "https://maps.google.com/maps?saddr=" + response.originAddresses + "&daddr=" + response.destinationAddresses + "&output=embed");
    }
}