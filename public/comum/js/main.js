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
	
});