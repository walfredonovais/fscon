<?php
echo "<link rel='stylesheet' type='text/css' href='" . BASE_URL . "/assets/css/jquery-ui.css' />
<link rel='stylesheet' type='text/css' href='" . BASE_URL . "/assets/css/form.css' />
	<script src='" . BASE_URL . "/assets/js/jquery-3.2.1.js'></script>
<script src='" . BASE_URL . "/assets/js/jquery-ui.js'></script>
 
<script>$(function() {
    $( '#datepicker' ).datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: true } );
	});</script>";

require("menu.php");

$id=$_GET['id'];

foreach($backup as $backup): endforeach;

 ?>

<div class="loginarea">
  <form method="POST" action="<?php echo BASE_URL; ?>/backup/edit ">
  <label>Responsável</label>
  <input type="text" name="responsavel" value="<?php echo $backup['responsavel']; ?>"/>
  <label>Data</label>
  <input id="datepicker" type="text" name="data" size="50" 
  value="<?php $data = $backup['data']; echo date('d/m/Y',strtotime($data)); ?>"/>
  <input  type="hidden" name="id" value="<?php echo $id; ?>"/>
  
  <div class="link01">
  <input type="submit" value="GRAVAR"/></div>
  </form>
    
</div> <!-- loginarea -->

<div class="clearfix">&nbsp;</div>