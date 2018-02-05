<?php echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />
"; 
echo "<link rel='stylesheet' type='text/css' href='" . BASE_URL . "/assets/css/jquery-ui.css' />
  <script src='" . BASE_URL . "/assets/js/jquery-3.2.1.js'></script>
  <script src='" . BASE_URL . "/assets/js/jquery-ui.js'></script>
 
  <script>$(function() {
  $( '#datepicker' ).datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, showOtherMonths: true, selectOtherMonths: 
  true } );
  });</script>";



?>

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
  <input type="text" name="title" required placeholder="Título"/>
  <div class="clear"></div>
  <textarea id="editor1"  name="nota" required placeholder="Nota"/></textarea> 
  <div class="clear"></div><br>
  <input id="datepicker" name="start" size="50" type="text" required placeholder="Data"/>   
  <input  type="hidden" name="autor" value="<?php echo $_SESSION['ccNome']; ?>"/>
  <div class="clear"></div>
  <input type="submit" value="Publicar"/>
  </form>
  <div class="clear"></div>
  
</div><!-- fecha notearea -->
</div><!-- fecha central2 -->

  
 
  
  </div><!-- fecha container -->
  <div class="clear"></div>
  

