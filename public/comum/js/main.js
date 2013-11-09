$(document).ready(function(){

	$(".chzn-select").chosen();

	$('input[placeholder], textarea[placeholder]').placeholder();
    /*função que identifica o browser e cria os hacks*/
    var ua = $.browser;
    if (ua.msie){
        $('html').addClass('ie').addClass('ie'+ua.version.slice(0,1));
    }else if (ua.mozilla){
        $('html').addClass('moz');
    }else if (ua.safari){
        $('html').addClass('chrome');
    }
    /*função que identifica o browser e cria os hacks*/

    $('.form').my_validate({
        beforeSubmit:function(){
            $('.error_form').slideUp();
        },
        if_error : function () {
            $('.error_form').stop(true, true).slideDown();
        }
    });
    
     var mensagem = $('.mensagem').text();

    if (mensagem != ''){

       $('.mensagem').slideDown('slow').delay(3000).slideUp('slow');

    }
    $(".data").mask("99/99/9999");

    $(".cpf").mask("999.999.999.99");

    $(".telefone").mask("(99)9999-9999?9");

    $(".cep").mask("99999-999");
    
    $('.busca_cep').click(function(){
        var cep = $('.cep').val();
        if (cep != undefined && cep != ''){
            cep = cep.replace("-", "");
            $.get('http://cep.republicavirtual.com.br/web_cep.php?cep='+cep+'&formato=json', function(data){
                if(data.resultado = 1){
                    $('.logradouro_endereco').val(data.logradouro);
                    $('.bairro_endereco').val(data.bairro);
                    $('.cidade_endereco').val(data.cidade);
                    $('.uf_endereco').val(data.uf);
                }else{
                    alert('Não foi possivel encontrar esse CEP');
                }
            });
        }else{
            alert('Preencha o campo com o CEP');
        }
    });
	
});