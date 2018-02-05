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
   
   <?php foreach ($mensagem as $mensagem) {
	
} ?>
 
	<form method="POST">
    <input type="text" name="titulo" readonly="readonly" value="<?php echo $mensagem['titulo']; ?>"/>
    <div class="clear"></div>
    <textarea id="editor1" rows="8" name="msg" /><?php echo $mensagem['msg']; ?></textarea>
    <div class="clear"></div>
      <input  type="hidden" name="data" value="<?php echo date('Y-m-d'); ?>"/>
      <input  type="text" name="autor" readonly="readonly" value="<?php echo $mensagem['autor']; ?>"/>
      <input  type="hidden" name="id" value="<?php echo $mensagem['id']; ?>"/>
      <input  type="hidden" name="obra" value="<?php echo $mensagem['obra']; ?>"/>
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
  

