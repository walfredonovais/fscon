<?php require("menu.php");

 ?>

<div id="container"> <!-- Container com 3 colunas -->
  <div id="esquerda"> <!-- Primeira Coluna de 3 -->
  &nbsp;
  </div>
  <div id="central2">
  <div class="notearea">

  <?php
foreach($notifica as $notifica):

	  echo "<span class='Sub04'><a href='".BASE_URL."/notifica/notiUser?usuario=".$notifica['usuario']."'> &nbsp;".$notifica['usuario']."</span></a><br>	
	  <span class='notetitulo'>".$notifica['titulo']."</span> &nbsp;".date("d/m/Y", strtotime($notifica['data']))."
	 <br>
	  <span class='txeventoView'>".$notifica['alerta']."</span>
	 <br><br>
	 <img class='icon' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' />
	  <span class='Sub03'><a href='".BASE_URL."/notifica/edit?id=".$notifica['id']."'> Editar notificação!</a></span><br><br>";
	 
	 endforeach;
	  ?>
  </div><!-- loginarea -->
  </div>

  
  <div id="direita">
   &nbsp;
  </div>
  
  </div>
  <div class="clear"></div>
  

