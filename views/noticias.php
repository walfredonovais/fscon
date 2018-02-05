<?php require("menu.php");

if(isset($_GET['local']) && !empty($_GET['local'])) {
$local= $_GET['local'];
}

 ?>

<div id="container"> <!-- Container com 3 colunas -->
  <div id="esquerda"> <!-- Primeira Coluna de 3 -->
  &nbsp;
  </div>
  <div id="central2">
  <div class="notearea">
  
  <?php
echo "<span class='Sub01'>Buscar pelo TAG</span>";

echo "<div class='search'><form method='post' action=". BASE_URL."/noticias/busca".">
    <input type='text' name='palavra' class='searchTerm' required placeholder='Digite o tag' />
	<input  type='hidden' name='local' value='".$local."' />
    <input type='submit' class='searchButton' value='' />
</form>
</div><br><br>";
?>

  <?php
foreach($noticias as $noticias):

	  echo "<img class='icon' style='margin-top:2px;' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' />&nbsp;
	  <span class='Sub06' style='margin-left:-3px;'><a href='".BASE_URL."/noticias/note?id=".$noticias['id']."'>".$noticias['titulo']."</span></a><br><div id='espaco'></div>
	  <span class='txevento' style='margin-left:21px;'>".$noticias['autor']." &nbsp;".date("d/m/Y", strtotime($noticias['data']))." : ".$noticias['hora']."</span>
	 <br>
	 <span class='txevento' style='margin-left:21px; color:green;'>tag: ".$noticias['tag']."</span>
	 <br>
	 <img class='icon' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' />&nbsp;
	  <span class='Sub03'><a href='".BASE_URL."/noticias/edit_note?id=".$noticias['id']."'>Editar a notícia!</a></span><br><br>";
	 
	 endforeach;
	  ?>
  </div><!-- loginarea -->
  </div>

  
  <div id="direita">
   &nbsp;
  </div>
  
  </div>
  <div class="clear"></div>
  

