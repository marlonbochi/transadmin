$(document).ready(function(){

});

// Carregar a API de visualizacao e os pacotes necessarios.
google.load('visualization', '1.0', {'packages':['corechart']});

// Especificar um callback para ser executado quando a API for carregada.
google.setOnLoadCallback(desenharGrafico);

/**
* Funcao que preenche os dados do grafico
*/
function desenharGrafico() {
	var dados = '';
	// Montar os dados usados pelo grafico
	$.getJSON($('.url_base').val()+'/busca_grafico', function(json){

		dados = new google.visualization.DataTable(json.dados);

		// Instanciar o objeto de geracao de graficos de pizza,
		// informando o elemento HTML onde o grafico sera desenhado.
		var chart = new google.visualization.ColumnChart(document.getElementById('area_grafico'));

		// Desenhar o grafico (usando os dados e as configuracoes criadas)
		chart.draw(dados, json.config);

	});

	
}