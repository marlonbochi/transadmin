    var callback_submit = false;
/*
 *  Project: my_validate
 *  Description: Este plugin foi criado com o intuito de simplificar o processo de validação de formulários via jQuery.
 *  Author: Jonas Mello
 *  License: 
 */

// o ponto-e-vírgula antes de invocar a função é uma prática segura contra scripts
// concatenados e/ou outros plugins que não foram fechados corretamente.
;(function ( $, window, undefined ) {

  // 'undefined' é usado aqui como a variável global 'undefined', no ECMAScript 3 é
  // mutável (ou seja, pode ser alterada por alguém). 'undefined' não está sendo
  // passado na verdade, assim podemos assegurar que o valor é realmente indefinido.
  // No ES5, 'undefined' não pode mais ser modificado.

  // 'window' e 'document' são passados como variáveis locais ao invés de globais,
  // assim aceleramos (ligeiramente) o processo de resolução e pode ser mais eficiente
  // quando minificado (especialmente quando ambos estão referenciados corretamente).

  // Cria as propriedades padrão
  var pluginName = 'my_validate',
      document = window.document,
      defaults = {
        error: "Por favor, confira os dados destacados.",
        errorcurriculo: "Anexe seu curriculo.",
        errormail: "E-mail inválido.",
        required: "required",
        notification: "#notification",
        errorcolor: "#d00000",
        if_error : function(){
          $('#notification').slideDown();
        },
        if_success : function(my_form){
          callback_submit = true;
          my_form.submit();
        }
      };

  // O verdadeiro construtor do plugin
  function Plugin( element, options ) {
    this.element = element;

    // jQuery tem um método 'extend' que mescla o conteúdo de dois ou
    // mais objetos, armazenando o resultado no primeiro objeto. O primeiro
    // objeto geralmente é vazio já que não queremos alterar os valores 
    // padrão para futuras instâncias do plugin
    this.options = $.extend( {}, defaults, options) ;

    this._defaults = defaults;
    this._name = pluginName;

    this.init();
  }

  Plugin.prototype.init = function () {
    // Coloque a lógica de inicialização aqui
    // Você já possui acesso ao elemento do DOM e as opções da instância
    // exemplo: this.element e this.options

/*########################################################################################################################*/
/*########################################################################################################################*/
/*########################################################################################################################*/
    var my = this;
    var not_validate = false;

    jQuery(this.element).submit(function(event){

        if (!callback_submit){

        event.preventDefault();
        not_validate = false;
        var error = my.options.error;
        var errormail = my.options.errormail;
        var errorcurriculo = my.options.errorcurriculo;

        var requireds = $(this).find('[data-myroles^="'+my.options.required+'"]');
        $(this).find('*').removeClass('error');
        requireds.each(function(){
          var $this = $(this);
            if($this.val()==''||$this.val()==$this.placeholder()){
              not_validate = true;
                $(my.options.notification).html(error);
                $this.addClass('error');
                

                if($this.is('input[type="file"]')){
                $this.parent().addClass('error')
                .find('.label')
                .addClass('error');
                not_validate = true;
                $(my.options.notification).html(errorcurriculo);
            }

            }else if($this.filter('[data-myroles*="email"]').length){
                var expressao_regular = /^[\d\w]+([_.-]?[\d\w]+)*@([\d\w_-]{2,}(\.){1})+?[\d\w]{2,4}$/;
                if(!expressao_regular.test($this.val())){
                  not_validate = true;
                    $(my.options.notification).html(errormail);
                    $this.addClass('error');
                    
                };
            }else if($this.is('select')&&$this.val()==(''||0)){
                
                not_validate = true;
                $(my.options.notification).html(error);
                $this
                .next('.chzn-container')
                .addClass('error');
            }else if($this.is('input[type="checkbox"]') && $this.attr('checked')==undefined){
                $this.parent().addClass('error');
                
                not_validate = true;
                $(my.options.notification).html(errormail);
            };
        });
        if (not_validate){
          my.options.if_error($(this));
        }else{
          my.options.if_success($(this));
        };
        setTimeout("$('input[placeholder], textarea[placeholder]').placeholder();", 1);

      }
        
    });


/*########################################################################################################################*/
/*########################################################################################################################*/
/*########################################################################################################################*/

  };

  // Um invólucro realmente leve em torno do construtor,
  // prevenindo contra criação de múltiplas instâncias
  $.fn[pluginName] = function ( options ) {
    return this.each(function () {
      if (!$.data(this, 'plugin_' + pluginName)) {
        $.data(this, 'plugin_' + pluginName, new Plugin( this, options ));
      }
    });
  }

}(jQuery, window));