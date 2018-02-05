<?php require("menu.php"); ?>

<div id="container"> <!-- Container com 3 colunas -->
  <div id="esquerda"> <!-- Primeira Coluna de 3 -->
  
  &nbsp;
  </div>
  <div id="central2">
  <div class="notearea">
  
  
  <?php
foreach($note as $note):
endforeach;
	  echo "<span class='notetitulo' style='font-size:1.6em;'>".$note['titulo']."</span><br><br><span class='txeventoView'>".
	  substr($note['noticia'], 3)."</sapn><br>
	  <span class='txevento' style='margin-left:18px;'>".$note['autor']." &nbsp;".date("d/m/Y", strtotime($note['data']))." : ".$note['hora']."</span>
	 <br><br>
	 <img class='icon' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' />
	  <span class='Sub03' style='margin-left:3px;'><a href='".BASE_URL."/noticias/edit_note?id=".$note['id']."'>Editar a notícia!</a></span>	";
	 
	  ?>
  </div><!-- loginarea -->
  </div>

  
  
  
  </div>
  <div class="clear"></div>
  

