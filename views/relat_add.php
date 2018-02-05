<link rel="stylesheet" href="../assets/css/form.css" media="screen" />
<?php 
	echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />
	<link rel='stylesheet' href='" . BASE_URL . "/assets/css/jquery-ui.css' />
	<script src='" . BASE_URL . "/assets/js/jquery-3.2.1.js'></script>
  	<script src='" . BASE_URL . "/assets/js/jquery-ui.js'></script>
 
	<script>$(function() {
    $( '#datepicker' ).datepicker( {dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true } );
	$( '#datepicker2' ).datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true } );
	$( '#datepicker3' ).datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true } );
	});</script>";
    ?>

<?php 
require("menu.php");
?>

<div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  
  
  <div id="dir_form">
 
    <div id="form">
    <div class="subtitle">Novo lançamento mensal</div>

<form method="POST">
<form  method="POST">     
<label>Mês<span class="small">Mês do relatório</span></label>
<input type="text" name="mes" required />
<label>Ano<span class="small">Ano do relatório</span></label>
<input type="text" name="ano" required />

		<label>Obra<span class="small">Obra do lançamento (Ativa)</span></label> 
		<select name="imp_obra">
        
		<?php 
		foreach($obras as $obras):
		echo "<option value='" . $obras['idobra'] . "'>" . $obras['obra'] ."</option>";
		endforeach; ?> 
		</select>   
           <div class="clear"></div>
<label>Término Meta<span class="small">Meta Atualizada (Meta 2)</span></label>
        <input id="datepicker" name="meta2" size="50" type="text" />        
<label>Término Corrente<span class="small">Meta corrente</span></label>
        <input id="datepicker2" name="corrente" size="50" type="text" />
<label>Previsto (%)<span class="small">Previsto (A)</span></label>
        <input type="text" name="a_previsto"/>
<label>Realizado (%)<span class="small">Realizado (B)</span></label>
        <input type="text" name="b_realizado" />
        
<label>Custo Previsto<span class="small">(até a data do relatório)</span></label>
        <input type="text" name="c_previsto" />
        
<label>Custo Realizado<span class="small">(até a data do relatório)</span></label>
        <input type="text" name="c_realizado" />  
<label>Custo final<span class="small">Custo final projetado</span></label>
        <input type="text" name="c_final" />        
<label>Analise<span class="small">Analise</span></label>
		<textarea name="analise"  rows="4" /></textarea>
        <div class="clear"></div>
        

        
        <div class="clear"></div>
<label>Data<span class="small">Data do lançamento</span></label> 
        <input id="datepicker3" name="data_lancamento" size="50" type="text" required />
        <div class="clear"></div>
<label>Responsável<span class="small">Responsável pelo lançamento</span></label> 
		<select name="resp" required> 
        <option>Selecionar ...</option> 
		<?php 
		foreach($user as $user):
		echo "<option value='" . $user['nome'] ."'>" . $user['nome'] . "</option>";
		endforeach; ?> 
	   	</select> 
        <!-- REORDEM VAI VAZIO INICIALMENTE -->
        <input  type="hidden" name="reordem" value=""/>
      
        <div class="clear">&nbsp;</div>
<button type="submit" value="Send" style="margin-top:5px;">ENVIAR</button>
	<div class="spacer"></div>
      
	</form>
   
 <div class="clear">&nbsp;</div>
    </div>
    
  </div><!-- Fecha form -->

  <div class="clear">&nbsp;</div>
</div> <!-- Fecha container -->