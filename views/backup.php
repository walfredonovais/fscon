<?php

echo "<link rel='stylesheet' type='text/css' href='" . BASE_URL . "/assets/css/jquery-ui.css' />
<link rel='stylesheet' type='text/css' href='" . BASE_URL . "/assets/css/form.css' />
<link rel='stylesheet' type='text/css' href='" . BASE_URL . "/assets/css/tabelas.css' />
	<script src='" . BASE_URL . "/assets/js/jquery-3.2.1.js'></script>
  	<script src='" . BASE_URL . "/assets/js/jquery-ui.js'></script>";

	echo"<script>$(function() {
    $( '#datepicker' ).datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true } );
	});</script>";
    
require("menu.php");
?>
<div id="conteudo">
<div id="esq_form" style="width:320px;">
<div style="overflow:auto;height:500px; width:300px; margin-top:30px;">
<table cellspacing="0" summary="backup">
  <thead>
    <tr><th>Id</th><th>Responsável</th><th>Data</th></tr>
  </thead>
  <tbody>
<?php
foreach($backup as $backup):
$data = $backup['data'];
$data=date('d/m/Y',strtotime($data));
 echo "<tr><td>".$backup['id']."</td><td><a href=". BASE_URL ."/backup/edit?id=". $backup['id'] .">". $backup['responsavel'] . "</a>" ."</td><td>".$data."</td></tr>";
endforeach;

?>
 </tbody>
</table>
</div>
</div>
<div id="dir_form" style="width:600px;">
<!-- Adicionar backup -->
<div class="loginarea">
	<form method="POST" action="<?php echo BASE_URL; ?>/backup/add ">
	<input type="text" name="responsavel" required  placeholder="Responsável"/>
      <input id="datepicker" type="text"  size="50" name="data" required  placeholder="Data"/>

      <div class="link01">
	 <input type="submit" value="Adicionar"/></div>
     </form> 
   
    
</div> <!-- loginarea -->
<!-- ------------------------------------------------ -->
<div class="centra">
			<form method="POST" action="<?php echo BASE_URL; ?>/backup/bkdb ">
        	<input type="submit" name="bkdb" value="Backup da Base de Dados" />
     		</form>
</div>
   Não resolvido o BKUP DB
</div>
</div>
<div class="clear"></div>