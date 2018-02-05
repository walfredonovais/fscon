<?php echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />"; ?>

<?php require("menu.php"); 
$local= $_GET['local'];
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
<input type="text" name="titulo" required placeholder="Título"/>
<div class="clear"></div>
	  <textarea id="editor1" rows="8" name="noticia" required placeholder="Notificação"/></textarea>
      
    <div class="clear"></div>
      <input  type="hidden" name="data" value="<?php echo date('Y-m-d'); ?>"/>
      <input  type="hidden" name="hora" value="<?php echo date('H:i:s'); ?>"/>
      <input  type="hidden" name="autor" value="<?php echo $_SESSION['ccNome']; ?>"/>
      <input  type="hidden" name="local" value="<?php echo $_GET['local']; ?>"/>
      <input  type="hidden" name="ordem" value="0"/>
    <div class="clear"></div>
    <input type="text" name="tag" required placeholder="Tag: Descrição em uma palavra"/>
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
  

