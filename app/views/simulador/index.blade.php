<h2><a href="<?=URL::to('simulador')?>">{{$title_pagina}}</a></h2>
<div id="main">
    <div class="area_mapa">
        <iframe id='map' width='700' height='300' src="https://maps.google.com/maps?output=embed&amp;width=700&amp;height=300" frameborder="0"></iframe>
    </div>
    <fieldset>    
        <form action="{{URL::to('simulador/insert')}}" class='form'>
            <fieldset>
                <div class='div_cep_origem'>
                    <p>
                        <label><b>Endereço de Coleta</b></label>
                    </p>
                    <p></p>
                    <p>
                        <label>CEP*:</label>
                        <input type="text" class="text-medium cep_origem cep" name='cep_origem_endereco' data-myroles="required" style='width: 55px;'/>
                        <input type="button" class='button-submit busca_cep_origem' value="Busca CEP" style='float: left;'/>
                    </p>
                    <p>
                        <label>Logradouro*:</label>
                        <input type="text" class="text-long logradouro_origem_endereco" maxlength=155 name='logradouro_origem_endereco' data-myroles="required"/>
                    </p>
                    <p>
                        <label>Número*:</label>
                        <input type="text" class="text-small numero_origem_endereco" name='numero_origem_endereco' maxlength=10 />
                    </p>
                    <p>
                        <label>Complemento:</label>
                        <input type="text" class="text-long" name='complemento_origem_endereco' maxlength=45/>
                    </p>
                    <p>
                        <label>Bairro*:</label>
                        <input type="text" class="text-medium bairro_origem_endereco" maxlength=45 maxlength=45 name='bairro_origem_endereco' data-myroles="required" />
                    </p>
                    <p>
                        <label>Cidade*:</label>
                        <input type="text" class="text-long cidade_origem_endereco" maxlength=100 name='cidade_origem_endereco' data-myroles="required"/>
                    </p>
                    <p>
                        <label>UF*:</label>
                        <input type="text" class="text-small uf_origem_endereco" maxlength=2 name='uf_origem_endereco' data-myroles="required"/>
                    </p>    
                </div>
                <div class='div_cep_destino'>
                    <p>
                        <label><b>Endereço de Entrega</b></label>
                    </p>
                    <p></p>
                    <p>
                        <label>CEP*:</label>
                        <input type="text" class="text-medium cep_destino cep" name='cep_destino_endereco' data-myroles="required" style='width: 55px;'/>
                        <input type="button" class='button-submit busca_cep_destino' value="Busca CEP" style='float: left;'/>
                    </p>
                    <p>
                        <label>Logradouro*:</label>
                        <input type="text" class="text-long logradouro_destino_endereco" maxlength=155 name='logradouro_destino_endereco' data-myroles="required"/>
                    </p>
                    <p>
                        <label>Número*:</label>
                        <input type="text" class="text-small numero_destino_endereco" name='numero_destino_endereco' maxlength=10 />
                    </p>
                    <p>
                        <label>Complemento:</label>
                        <input type="text" class="text-long" name='complemento_destino_endereco' maxlength=45/>
                    </p>
                    <p>
                        <label>Bairro*:</label>
                        <input type="text" class="text-medium bairro_destino_endereco" maxlength=45 maxlength=45 name='bairro_destino_endereco' data-myroles="required" />
                    </p>
                    <p>
                        <label>Cidade*:</label>
                        <input type="text" class="text-long cidade_destino_endereco" maxlength=100 name='cidade_destino_endereco' data-myroles="required"/>
                    </p>
                    <p>
                        <label>UF*:</label>
                        <input type="text" class="text-small uf_destino_endereco" maxlength=2 name='uf_destino_endereco' data-myroles="required"/>
                    </p>    
                </div>
            </fieldset>
            <p>
                <input type="button" class="button-submit simular" value="Simular" >
            </p>
            <p></p>
            <p>
                <label>Data da Entrega*:</label>
                <input type="text" class="text-medium data" name='data_entrega' data-myroles="required">
            </p>
            <p>
                <label>Valor por KM*:</label>
                <input type="text" class="text-medium valor_km_entrega" name='valor_km_entrega' data-myroles="required">
            </p>
            <p>
                <label>KM percorridos*:</label>
                <input type="text" class="text-medium km_percorrido_entrega" name='km_percorrido_entrega' data-myroles="required">
            </p>
            <p>
                <label>Valor da Entrega*:</label>
                <input type="text" class="text-medium valor_entrega" name='valor_entrega' data-myroles="required">
            </p>
            <p>
                <a class='cancelar_btn cancelar' href="{{URL::to('/')}}">Cancelar</a>
                <input type="submit" class="button-submit btn_salvar" value="Criar Entrega" >
            </p>
        </form>
    </fieldset>
</div>