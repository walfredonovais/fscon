<?php echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />"; ?>

<?php require("menu.php"); 
?>
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
 
	
<div class="clear"></div>
	  <textarea id="editor1" rows="8" name="comentario" required placeholder="Comentario"/></textarea>
      
    <div class="clear"></div>
      <input  type="hidden" name="data" value="<?php echo date('Y-m-d'); ?>"/>
      <input  type="hidden" name="autor" value="<?php echo $_SESSION['ccNome']; ?>"/>
      <input  type="hidden" name="id_imp" value="<?php echo $_GET['id_imp']; ?>"/>
    <div class="clear"></div>
	 <input type="submit" value="Publicar"/>
     </form>
    <div class="clear"></div>
  
</div><!-- fecha notearea -->
</div><!-- fecha central2 -->

  
  <div id="direita">
   &nbsp;
  </div>
  
  </div><!-- fecha container -->
  <div class="clear"></div>
  

