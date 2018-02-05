<?php require("menu.php"); ?>

<div id="container"> <!-- Container com 3 colunas -->
  <div id="esquerda"> <!-- Primeira Coluna de 3 -->
  &nbsp;
  </div>
  <div id="central2">
  <div class="notearea">
   <?php
echo "<span class='Sub01'>Buscar por palavra</span>";

echo "<div class='search'><form method='post' action=". BASE_URL."/eventos/busca".">
    <input type='text' name='palavra' class='searchTerm' required placeholder='Digite a palavra' />
    <input type='submit' class='searchButton' value='' />
</form>
</div><br><br>";
?>


  <?php
foreach($eventos as $eventos):
  echo "<img class='icon' style='margin-top:1px;' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' />&nbsp;
  <span class='Sub05' style='margin-left:-3px'><a href='".BASE_URL."/eventos/evento?id=".$eventos['id']."'>".$eventos['title']."</span></a>
  <br>
  
  <span class='txevento'>".substr($eventos['nota'], 0, -4)."</span>
  <br><br>";
  if($eventos['altera'] != "") { 
  echo "<span class='txevento'>Autor: ".$eventos['autor']." : ".date("d/m/Y", strtotime($eventos['start']))."</span><br>
  <span class='txevento'>Editado por: " .$eventos['altera']."</span>
  <br><br>"; } else{ echo "<span class='txevento'>Autor: ".$eventos['autor']." : ".date("d/m/Y", strtotime($eventos['start']))."</span><br><br>"; }
	 
	 endforeach;
	  ?>

  </div><!-- loginarea -->

  </div>

  
 
  
  </div>
  <div class="clear"></div>
  

