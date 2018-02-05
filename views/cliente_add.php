<?php 
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />";

require("menu.php");
?>

<div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  <div id="dir_form">
 
    <div id="form">
    <div class="title" style="margin-top:15px; margin-bottom:20px;">Adicionar um novo cliente</div>

<form method="POST">

<label>Razão Social(*)<span class="small">Razão social do cliente</span></label>
<input type="text" name="rsocial" required />
        
<label>CNPJ<span class="small">Número do CNPJ</span></label>
<input type="text" name="cnpj" />

<label>IE<span class="small">Inscrição Estadual</span></label>
<input type="text" name="insc_est" />

<label>IM<span class="small">Inscrição Municipal</span></label>
<input type="text" name="insc_munic" />

<label>Contato<span class="small">Contato principal</span></label>
<input type="text" name="contato" />

<label>Celular<span class="small">ou Telefone da empresa</label>
<input type="text" name="telefone" />

<label>E-mail<span class="small">email do contato ou empresa</span></label>
<input type="text" name="email" />

<label>Contato<span class="small">Contato</span></label>
<input type="text" name="contato2" />

<label>Celular<span class="small">Celular</span></label>
<input type="text" name="celular" />

<label>E-mail<span class="small">email do contato ou empresa</span></label>
<input type="text" name="email2" />

<label>FAX<span class="small">FAX :) se houver</span></label>
<input type="text" name="fax" />

<label>Site<span class="small">Site WEB do cliente</span></label>
<input type="text" name="site" />

<label>Endereço<span class="small">Endereço do cliente</span></label>
<input type="text" name="endereco" />

<label>Complemento<span class="small">Complemento: Sala / Loja</span></label>
<input type="text" name="complemento" />

<label>Bairro<span class="small">Bairro</span></label>
<input type="text" name="bairro" />

<label>CEP<span class="small">CEP Correios</span></label>
<input type="text" name="cep" />

<label>Cidade<span class="small">Cidade</span></label>
<input type="text" name="cidade" />

<label>Estado<span class="small">UF / Estado</span></label>
<input type="text" name="estado" />

<label>Logotipo<span class="small">Logotipo do cliente</span></label>
<select name="logo"><option value="">Selecione</option>
<option selected="selected" value="0">Sem logo</option><option value="0">Com logotipo no sistema</option> </select>  
            
<div class="clear"></div>

<button type="submit" value="Send" style="margin-top:10px; font-size:0.9em; width:120px;">ADICIONAR</button>

<div class="spacer"></div>
     
</form>

  <div class="clear">&nbsp;</div>
 
  </div><!-- Fecha form -->
  </div><!-- Fecha dir-form -->

  <div class="clear">&nbsp;</div>
  </div> <!-- Fecha container -->