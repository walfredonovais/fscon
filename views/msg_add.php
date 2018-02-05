<?php echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />"; 

echo "<script src='".BASE_URL."/ckeditor/ckeditor.js'></script>";
?>

<?php require("menu.php"); 
?> 
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
    <input type="text" name="titulo" required placeholder="Título"/>
	
<div class="clear"></div>
	  <textarea id="editor1" rows="8" name="msg" required placeholder="Mensagem"/></textarea>
      
    <div class="clear"></div>
      <input  type="hidden" name="data" value="<?php echo date('Y-m-d'); ?>"/>
      <input  type="hidden" name="autor" value="<?php echo $_SESSION['ccNome']; ?>"/>
      <input  type="hidden" name="obra" value="<?php echo $_GET['obra']; ?>"/>
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
  

