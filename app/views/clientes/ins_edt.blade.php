<h2><a href="<?=URL::to('clientes')?>">{{$title_pagina}}</a> &raquo; <a href="#" class="active">{{$acao}}</a></h2>

<div id="main">
	<fieldset>
		<form action="<?=URL::to('clientes/insert');?>" class='form'>
			<p><label>Sample label:</label><input type="text" class="text-long" data-myroles="required" /></p>
			<p><label>Sample label:</label><input type="text" class="text-medium" data-myroles="required" /><input type="text" class="text-small" /><input type="text" class="text-small" /></p>
		    <p><label>Sample label:</label>		    
		    <select class='chzn-select select' data-placeholder="Selecione o Estado">
		    	<option></option>
		    	<option>Select one</option>
		    	<option>Select two</option>
		    	<option>Select tree</option>
		    	<option>Select one</option>
		    	<option>Select two</option>
		    	<option>Select tree</option>
		    </select>
		    </p>
			<p><label>Sample label:</label><textarea rows="1" cols="1"></textarea></p>
		    <input type="submit" class='button-submit' value="Submit Query" />
		</form>
	</fieldset>
</div>