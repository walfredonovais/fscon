<?php 
	
  echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
  <link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />";

  echo "<link rel='stylesheet' type='text/css' href='" . BASE_URL . "/assets/css/jquery-ui.css' />
  <script src='" . BASE_URL . "/assets/js/jquery-3.2.1.js'></script>
  <script src='" . BASE_URL . "/assets/js/jquery-ui.js'></script>
 
  <script>$(function() {
  $( '#datepicker' ).datepicker( { changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: 
  true } );
  });</script>";
    ?>

<?php 
require("menu.php"); ?>

<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
 
  <script type="text/javascript">
  window.onload = function()  {
  CKEDITOR.replace( 'editor1' );
  };
  </script>    
    
<div id="container"> <!-- Container com 3 colunas -->
  <div id="esquerda"> <!-- Primeira Coluna de 3 -->
  &nbsp;
  </div>
  <div id="central2">
    <div id="formedit">
    <form method="POST">
     <label>Usuario notificado</label>
    <input type="text" name="usuario" readonly="readonly" value="<?php echo $notifica['usuario']; ?>"/>
    <input type="hidden" name="id" value="<?php echo $notifica['id']; ?>"/>
     <label>Título</label>
      <input type="text" name="titulo" value="<?php echo $notifica['titulo']; ?>"/>
       <label>Autor da notificação</label>
      <input type="text" name="autor" readonly="readonly" value="<?php echo $notifica['autor']; ?>"/>
      <label>Data</label>
    <input id="datepicker" name="data" size="50" type="text" required 
    value="<?php echo $notifica['data']; ?>" /> 
    
  
   <div class="clear"></div>
    <textarea id="editor1"  name="alerta"><?php echo $notifica['alerta']; ?></textarea>
   <div class="clear"></div><br>
   <?php if($_SESSION['ccNivel'] > 4){
   echo "<label>Para desativar digite 0 (zero)</label>
    <input type='text' name='ativo' value='".$notifica['ativo']."'/>";
   }else { echo "<input type='hidden' name='ativo' value='".$notifica['ativo']."'/>";} ?>
   
    <input type="submit" value="Publicar"/>
     </form>
    
    <div class="clear"></div>
  
  </div><!-- fecha formedit -->
  </div><!-- fecha central2 -->

  
  
  </div><!-- fecha container -->
  <div class="clear"></div>
  





