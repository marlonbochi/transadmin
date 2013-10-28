$(document).ready(function(){

	$('.form_logar').my_validate({
        beforeSubmit:function(){
            $('.error_form').fadeOut();
        },
        if_error : function () {
            $('.error_form').stop(true, true).fadeIn().delay(2500).fadeOut();
        }
    });

	$('.corpo_login').css('margin-left',($('.conteudo').width()/2)-($('.corpo_login').width()/2))
	$('.corpo_login').css('margin-top',(($(window).height()/2)-($('.corpo_login').height()/2))-80)

    var mensagem = $('.mensagem').text();

    if (mensagem != ''){

       $('.mensagem').slideDown('slow').delay(3000).slideUp('slow');

    }
});

$(window).resize(function(){
    $('.corpo_login').css('margin-left',($('.conteudo').width()/2)-($('.corpo_login').width()/2))
    $('.corpo_login').css('margin-top',(($(window).height()/2)-($('.corpo_login').height()/2))-80)
});