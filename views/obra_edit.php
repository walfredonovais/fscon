
<?php 
	// Links e script para o calendário
	// Para cada calendario na página uma numeração datepicker
	echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
	<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />";  
	
	echo "<link rel='stylesheet' type='text/css' href='" . BASE_URL . "/assets/css/jquery-ui.css' />
	<script src='" . BASE_URL . "/assets/js/jquery-3.2.1.js'></script>
  	<script src='" . BASE_URL . "/assets/js/jquery-ui.js'></script>
 
<script>$(function() {
$('#datepicker').datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, 
showOtherMonths: true, selectOtherMonths: true } );

$('#datepicker2').datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true } );

$('#datepicker3').datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true } );

$('#datepicker4').datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true } );

$('#datepicker5').datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true } );

$('#datepicker6').datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true } );
});</script>";
?>

<?php
  require("menu.php");
  $id = $_GET['idobra'];
  if(isset($_GET['saida']) && !empty($_GET['saida'])){
  $pg_saida = $_GET['saida']; }else {$pg_saida = "";}
  foreach($obras as $obras):
  endforeach;
?>

<div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  <div id="dir_form">
 
    <div id="form">
    <div class="title"><?php echo $obras['obra']; ?></div>
    <div class="subtitle">Edição dos dados da obra</div>

    <form accept-charset="utf-8" method="POST">

<!-- Campo readonly="readonly" só leitura -->
<label>ID<span class="small">Identificador DB</span></label>
  <input type="text" name="idobra" readonly="readonly" value="<?php echo $obras['idobra']; ?>"/>
  
<label>Cliente<span class="small">Cliente</span></label>
  <input type="text" name="rsocial" readonly="readonly"  value="<?php echo $obras['rsocial']; ?>"/>
  <input type="hidden" name="id_imp" readonly="readonly"  value="<?php echo $obras['id_imp']; ?>"/>

  <input type="hidden" name="saida" value="<?php echo $pg_saida; ?>"/>
  <label>Obra<span class="small">Nome da obra</span></label>
   <input type="text" name="obra"  value="<?php echo $obras['obra']; ?>"/>
  
<label>CNPJ<span class="small">CNPJ da obra</span></label>
  <input type="text" name="cnpj_obra"  value="<?php echo $obras['cnpj_obra']; ?>"/>
  
<label>IE<span class="small">Inscrição Estadual</span></label>
<input type="text" name="ie_obra"  value="<?php echo $obras['ie_obra']; ?>"/>

<label>IM<span class="small">Inscrição Municipal</span></label>
<input type="text" name="im_obra"  value="<?php echo $obras['im_obra']; ?>"/>

<label>Telefone<span class="small">Fone da obra</span></label>
<input type="text" name="tel_obra"  value="<?php echo $obras['tel_obra']; ?>"/>

<label>Celular<span class="small">Celular na obra</span></label>
<input type="text" name="cel_obra"  value="<?php echo $obras['cel_obra']; ?>"/>

<label>Fax<span class="small">Fax na obra</span></label>
<input type="text" name="fax_obra"  value="<?php echo $obras['fax_obra']; ?>"/>

<label>Contatos<span class="small">Contatos na obra</span></label>
<input type="text" name="contatos"  value="<?php echo $obras['contatos']; ?>"/>

<label>Endereço<span class="small">Endereço da obra</span></label>
<input type="text" name="end_obra"  value="<?php echo $obras['end_obra']; ?>"/>

<label>Complemento<span class="small">Complemento</span></label>
<input type="text" name="comp_obra"  value="<?php echo $obras['comp_obra']; ?>"/>

<label>Bairro<span class="small">Bairro</span></label>
<input type="text" name="bairro_obra"  value="<?php echo $obras['bairro_obra']; ?>"/>

<label>CEP<span class="small">CEP obra</span></label>
<input type="text" name="cep_obra"  value="<?php echo $obras['cep_obra']; ?>"/>

<label>Cidade<span class="small">Cidade</span></label>
<input type="text" name="cid_obra"  value="<?php echo $obras['cid_obra']; ?>"/>

<label>Estado<span class="small">Estado</span></label>
<input type="text" name="est_obra"  value="<?php echo $obras['est_obra']; ?>"/>

<label>Escopo<span class="small">Escopo dos serviços</span></label>
<textarea name="escopo" ><?php echo $obras['escopo']; ?></textarea>
<div class="clear"></div>

<label>Descrição<span class="small">Descrição dos serviços</span></label>
<textarea name="descricao" ><?php echo $obras['descricao']; ?></textarea>
<div class="clear"></div>

<label>Área<span class="small">Área de construção</span></label>
<input type="text" name="area"  value="<?php echo $obras['area']; ?>"/>

<label>Início do Contrato<span class="small">Início do Contrato</span></label>
    <input type="text" id="datepicker" name="ini_cont" size="50" value="<?php 
	$data = implode("/",array_reverse(explode("-",$obras['ini_cont'])));
	echo $data; ?>" />

<label>Término do Contrato<span class="small">Término do Contrato</span></label>
    <input type="text" id="datepicker2" name="term_cont" size="50" value="<?php 
	$data2 = implode("/",array_reverse(explode("-",$obras['term_cont'])));
	echo $data2; ?>" />

<label>Início da obra<span class="small">Início da obra</span></label>
<input type="text" id="datepicker3" size="50"  name="ini_obra"  value="<?php 
$data3 = implode("/",array_reverse(explode("-",$obras['ini_obra'])));
	echo $data3; ?>"/>

<label>Término da obra<span class="small">Término da obra</span></label>
<input type="text" id="datepicker4" size="50"  name="term_obra"  value="<?php 
$data4 = implode("/",array_reverse(explode("-",$obras['term_obra'])));
	echo $data4; ?>"/>

<label>Prazo<span class="small">Prazo previsto (meses)</span></label>
<input type="text" name="prazo"  value="<?php echo $obras['prazo']; ?>"/>

<label>Meta<span class="small">Meta inicial</span></label>
<input type="text" id="datepicker5" size="50"  name="meta1"  value="<?php 
$data5 = implode("/",array_reverse(explode("-",$obras['meta1'])));
	echo $data5; ?>"/>

<label>Orçamento<span class="small">Orçamento total</span></label>
<input type="text" name="orctotal"  value="<?php echo $obras['orctotal']; ?>"/>

<label>Engenheiro da obra<span class="small">Engenheiro da obra</span></label>
<input type="text" name="engobra"  value="<?php echo $obras['engobra']; ?>"/>

<label>Engenheiro da FS<span class="small">Engenheiro da FS</span></label>
<select name="engfs"><option required value=""><?php echo $obras['engfs']; ?></option>
		
		<?php 
		foreach($usuarios as $usuarios):
		echo "<option value='" . $usuarios['nome'] . "'>" . $usuarios['nome'] ."</option>";
		endforeach; ?> 
		 </select>
<div class="clear"></div>
  


<label>Entrega<span class="small">Data da entrega</span></label>
<input type="text" id="datepicker6" size="50"  name="data_entrega"  value="<?php 
$data6 = implode("/",array_reverse(explode("-",$obras['data_entrega'])));
	echo $data6; ?>"/>

<label>Status<span class="small">Ativo / Não ativo</span></label>
<select name="ativo"><option value="<?php echo $obras['ativo']; ?> ">
<?php if ($obras['ativo'] == 1) { echo "Contrato em execução"; } else { echo "Não Ativo"; } ?></option>
<option value="1">Ativo</option><option value="0">Não Ativo</option> </select>
<div class="clear"></div>

<label>Financeiro<span class="small">Controle Financeiro</span></label>
<select name="financeiro"><option value="<?php echo $obras['financeiro']; ?> ">
<?php if ($obras['financeiro'] == 1) { echo "Com Acompanhamento Financeiro"; } else { echo "Sem Acompanhamento Financeiro"; } ?></option>
<option value="1">Com acompanhamento Financeiro</option><option value="0">Sem acompanhamento</option> </select>
<div class="clear"></div>

<label>Observações<span class="small">Observações</span></label>
<textarea name="observa" ><?php echo $obras['observa']; ?></textarea>
             <div class="clear"></div>
	<button type="submit" value="Send" style="margin-top:10px; font-size:0.9em; width:120px;">ENVIAR</button>

</form>
  <div class="clear">&nbsp;</div>
 
    </div>
    
  </div><!-- Fecha form -->

  <div class="clear">&nbsp;</div>
</div> <!-- Fecha container -->