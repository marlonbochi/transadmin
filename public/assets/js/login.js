$(document).ready(function(){

	$('.form_logar').my_validate({
        beforeSubmit:function(){
            $('.error_form').fadeOut();
        },
        if_error : function () {
            $('.error_form').stop(true, true).fadeIn().delay(2500).fadeOut();
        }
    });

	$('.corpo').css('margin-left',($('.conteudo').width()/2)-($('.corpo').width()/2));
	$('.corpo').css('margin-top',(($(window).height()/2)-($('.corpo').height()/2))-200);

    var mensagem = $('.mensagem').text();

    if (mensagem != ''){

       $('.mensagem').slideDown('slow').delay(3000).slideUp('slow');

    }
});

$(window).resize(function(){
    $('.corpo').css('margin-left',($('.conteudo').width()/2)-($('.corpo').width()/2));
    $('.corpo').css('margin-top',(($(window).height()/2)-($('.corpo').height()/2))-200);
});