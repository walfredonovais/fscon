<?php echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />
"; ?>

<?php require("menu.php"); 
  $id= $_GET['id'];

  foreach($noticias as $noticias):

  endforeach;
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

  <form method="POST" >
    <label>Título</label>
    <input type="text" name="titulo" value="<?php echo $noticias['titulo']; ?>"/>
    <label>TAG</label>
    <input type="text" name="tag" value="<?php echo $noticias['tag']; ?>"/>
    <label>Ordem</label>
    <input type="text" name="ordem" value="<?php echo $noticias['ordem']; ?>"/>
    <input  type="hidden" name="id" value="<?php echo $noticias['id']; ?>"/>
    <input  type="hidden" name="data" value="<?php echo date('Y-m-d'); ?>"/>
    <input  type="hidden" name="hora" value="<?php echo date('H:i:s'); ?>"/>
    <input  type="hidden" name="autor" value="<?php echo $_SESSION['ccNome']; ?>"/>
    <input  type="hidden" name="local" value="<?php echo $noticias['local']; ?>"/>
  <div class="clear"></div>
    <textarea id="editor1" name="noticia"><?php echo $noticias['noticia']; ?></textarea>
  <div class="clear"></div><br>
    <input type="submit" value="Publicar"/>
  </form>

  <div class="clear"></div>
  </div><!-- formedit -->

  </div><!-- fecha central2 -->

  
 
  </div><!-- fecha container -->
  <div class="clear"></div>
  

