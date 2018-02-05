<?php require("menu.php");

 ?>

<div id="container"> <!-- Container com 3 colunas -->
  <div id="esquerda"> <!-- Primeira Coluna de 3 -->
  &nbsp;
  </div>
  <div id="central2">
  <div class="notearea">
 

  <?php
  // Titulo, data e notificação
    echo "<span class='notetitulo'>".$eventos['title']."</span><span class='txevento'><br>"
	.date("d/m/Y", strtotime($eventos['start']))."</span><br><br>
	<span class='txeventoView'>".$eventos['nota']."</span>";
	// Link para todas as notificações deste usuario
	echo "<br><br>";
	if(isset($eventos['altera']) && !empty($eventos['altera'])){
	echo "<span class='txevento'>Autor: ".$eventos['autor']."&nbsp; - &nbsp;Alterações: ".$eventos['altera']."</span><br>"; }else {echo "<span class='txevento'>Autor: ".$eventos['autor']."</span><br>";}
    echo"<br><img class='icon' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' /> &nbsp;
    <span class='Sub03'><a href='".BASE_URL."/eventos/edit?id=".$eventos['id']."'>Editar evento!</a></span>";
  ?>	
  </div><!-- loginarea -->
  </div>

 
  
  </div>
  <div class="clear"></div>