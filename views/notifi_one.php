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
    echo "<span class='notetitulo'>".$notifica['titulo']."</span> : <span class='txevento'>"
	.date("d/m/Y", strtotime($notifica['data']))."</span><br><span class='txevento'>Autor: ".$notifica['autor']."</span><br><br>
	<span class='txevento'>".$notifica['alerta']."</span>";
	// Link para todas as notificações deste usuario
	echo "<br><br>
	<img class='icon' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' /> &nbsp;
	<span class='Sub03'><a href='".BASE_URL."/notifica/notiUser?usuario=".$notifica['usuario']."'>"
    .$notifica['usuario']."</span></a><br>
    <img class='icon' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' /> &nbsp;
    <span class='Sub03'><a href='".BASE_URL."/notifica/edit?id=".$notifica['id']."'> Editar notificação!</a></span>";
  ?>
  </div><!-- loginarea -->
  </div>

  <div id="direita">
   &nbsp;
  </div>
  
  </div>
  <div class="clear"></div>
  

