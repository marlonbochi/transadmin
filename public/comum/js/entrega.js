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
});