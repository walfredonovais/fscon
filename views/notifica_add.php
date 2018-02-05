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

<?php require("menu.php"); ?>

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
	  <select name="usuario"> 
        <option required value="">Selecione um usuário</option> 
		<?php 
		foreach($usuarios as $usuarios):
		echo "<option value='" . $usuarios['nome'] . "'>" . $usuarios['nome'] ."</option>";
        endforeach; ?> 
      </select> 
<input name="titulo" size="50" type="text" required placeholder="Titulo" />  
    <div class="clear"></div>
      <textarea id="editor1" name="alerta" required="required" /></textarea>
    <div class="clear">&nbsp;</div>
      <input id="datepicker" name="data" size="50" type="text" required placeholder="Data" />   
    <div class="clear"></div>
     <input type="hidden" name="ativo" value="1" />
     <input name="autor" type="hidden" required  value="<?php echo $_SESSION['ccNome']; ?>" />
      <input type="submit" value="Publicar"/>
    </form>
    <div class="clear"></div>
  
  </div><!-- fecha formedit -->
  </div><!-- fecha central2 -->

 
  
  </div><!-- fecha container -->
  <div class="clear"></div>
  

