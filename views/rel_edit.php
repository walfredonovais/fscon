
<?php 
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />
<link rel='stylesheet' type='text/css' href='" . BASE_URL . "/assets/css/jquery-ui.css' />
	<script src='" . BASE_URL . "/assets/js/jquery-3.2.1.js'></script>
  	<script src='" . BASE_URL . "/assets/js/jquery-ui.js'></script>
 
	<script>$(function() {
    $( '#datepicker' ).datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true } );
	$( '#datepicker2' ).datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true } );
	$( '#datepicker3' ).datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true } );
	});</script>";
    ?>

<?php
  require("menu.php");
  $id_hist = $_GET['id_hist'];
 // foreach($historico as $historico):
  
 // endforeach;
?>

<div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  
  
  <div id="dir_form">
 
    <div id="form">
    <div class="title"><?php echo $historico['obra']; ?></div>
    <div class="subtitle">Edição do lançamento: <?php echo $historico['mes']." / ".$historico['ano']; ?></div>

    <form method="POST">

<!-- Campo readonly="readonly" só leitura -->
<label>ID<span class="small">Identificador DB</span></label>
  <input type="text" name="id_hist" readonly="readonly" value="<?php echo $historico['id_hist']; ?>"/>
  
 <input type="hidden" name="imp_obra" value="<?php echo $historico['imp_obra']; ?>"/>  
  
<label>Cliente<span class="small">Cliente</span></label>
  <input type="text" name="" readonly="readonly"  value="<?php echo $historico['idcli'] ." - " .$historico['rsocial']; ?>"/>
  
<label>Mes<span class="small">Mes do lançamento</span></label>
  <input type="text" name="mes"   value="<?php echo $historico['mes']; ?>"/>
<label>Ano<span class="small">Ano do lançamento</span></label>
  <input type="tex" name="ano"   value="<?php echo $historico['ano']; ?>"/>
<label>Meta 2<span class="small">Meta atualizada</span></label>
 <input id="datepicker" name="meta2" size="50" type="text" required value="<?php
		if(isset($historico['meta2']) && $historico['meta2'] != '0000-00-00') {
		$data = $historico['meta2']; echo date('d/m/Y',strtotime($data)); } else { $data = '';
		} ?>" /> 

<label>Corrente<span class="small">Término corrente</span></label>
   <input id="datepicker2" name="corrente" size="50" type="text" required value="<?php
		if(isset($historico['corrente']) && $historico['corrente'] != '0000-00-00') {
		$data = $historico['corrente']; echo date('d/m/Y',strtotime($data)); } else { $data = '';
		} ?>" />
  
  
<label>Previsto<span class="small">Físico: Previsto (A)</span></label>
  <input type="tex" name="a_previsto"   value="<?php echo $historico['a_previsto']; ?>"/> 
<label>Realizado<span class="small">Físico: Realizado (B)</span></label>
  <input type="tex" name="b_realizado"   value="<?php echo $historico['b_realizado']; ?>"/>
<label>Percentual Acumulado<span class="small">Percentua acumulado</span></label>
  <input type="tex" name="pff_acumulado"   value="<?php echo $historico['pff_acumulado']; ?>"/>
<label>Custo das Modificações<span class="small">Custo das Modificações</span></label>
  <input type="tex" name="c_modif"   value="<?php echo $historico['c_modif']; ?>"/> 
<label>Custo previsto<span class="small">Custo previsto (C)</span></label>
  <input type="tex" name="c_previsto"   value="<?php echo $historico['c_previsto']; ?>"/>
<label>Custo realizado<span class="small">Custo realizado</span></label>
  <input type="tex" name="c_realizado"   value="<?php echo $historico['c_realizado']; ?>"/> 
<label>Custo final<span class="small">Custo final projetado</span></label>
  <input type="tex" name="c_final"   value="<?php echo $historico['c_final']; ?>"/>  
<label>Análise<span class="small">Análise dos resultados</span></label>
<textarea name="analise" ><?php echo $historico['analise']; ?></textarea>
<div class="clear"></div>



  
  
<label>Data do lançamento<span class="small">Data do lançamento</span></label>
 <input id="datepicker3" name="data_lancamento" size="50" type="text" required value="<?php 
 if(isset($historico['data_lancamento']) && $historico['data_lancamento'] != '0000-00-00') {
		$data = $historico['data_lancamento']; echo date('d/m/Y',strtotime($data)); } else { $data = '';
		} ?>" />     
        
<label>Responsável<span class="small">Responsavel pelo lançamento</span></label>
<select name="resp"> 
        <option value="<?php echo $historico['resp']; ?>"><?php echo $historico['resp']; ?></option> 
		<?php 
		foreach($usuarios as $usuarios):
		echo "<option value='" . $usuarios['nome'] ."'>" . $usuarios['nome'] . "</option>";
		endforeach; ?> 
	   	</select> 
         <div class="clear">&nbsp;</div>
<label>Reordem<span class="small">Correção da ordem</span></label>
  <input type="tex" name="reordem"   value="<?php echo $historico['reordem']; ?>"/> 
  
<div class="clear"></div>
	<button type="submit" value="Send" style="margin-top:10px; font-size:0.9em; width:120px;">ENVIAR</button>

</form>
  <div class="clear">&nbsp;</div>
    </div>
    
  </div><!-- Fecha form -->

  <div class="clear">&nbsp;</div>
</div> <!-- Fecha container -->