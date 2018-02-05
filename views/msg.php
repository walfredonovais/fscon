<?php

require("menu.php");

foreach ($mensagem as $mensagem) {
	
}

?>

<div id="container"> <!-- Container com 3 colunas -->
  <div id="esquerda"> <!-- Primeira Coluna de 3 -->
  &nbsp;
  </div>
  <div id="central2">
  <div class="notearea">

  <?php
  // Titulo, data e notificação
    echo "<span class='notetitulo'>".$mensagem['titulo']."</span> : <span class='txevento'>"
	.date("d/m/Y", strtotime($mensagem['data']))."</span><br><span class='txevento'>Autor: ".$mensagem['autor']."</span><br><br>
	<span class='comentario'>".$mensagem['msg']."</span>";
	// Link para todas as notificações deste usuario
	echo "<br><br>";
	
	 foreach ($comentarios as $comentarios) {
		 echo "<span class='comenta'>".$comentarios['comentario']."</span><br><span class='comenta'>".$comentarios['autor']."</span><span class='txevento'> - ".date("d/m/Y", strtotime($comentarios['data']))."</span><br><br>";
	 }
	
	
    echo "<br><img class='icon' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' /> &nbsp;
    <span class='Sub03'><a href='".BASE_URL."/mensagem/edit?id=".$mensagem['id']."'> Editar!</a></span>
	<br>
	 <img class='icon' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' />  &nbsp;
    <span class='Sub03'><a href='".BASE_URL."/mensagem/add_comenta?id_imp=".$mensagem['id']."'> Comentar!</a></span>";
  ?>
  </div><!-- loginarea -->
  </div>

  <div id="direita">
   &nbsp;
  </div>
  
  </div>
  <div class="clear"></div>
  