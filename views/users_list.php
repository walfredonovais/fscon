<?php 
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/tabelas.css' media='screen' />
	<script src='".BASE_URL."/assets/js/jquery-3.2.1.min.js'></script>
  <script src='".BASE_URL."/assets/js/jquery.tablesorter.min.js'></script>
  <script src='".BASE_URL."/assets/js/jquery.tablesorter.pager.js'></script>";


require("menu.php"); ?>
<script>
var scrollTop = function() {
    window.scrollTo(0, 0);
};
</script>
<div id="container"> <!-- Container com 3 colunas -->

<span id='topo'></span>

<div class="espaco"></div>
<div class="centra"><span class="notetitulo" style="font-size:1.8em;">Todos Usuários Já Cadastrados no Sistema</span></div>
<table cellspacing="0" summary="Usuários Cadastrados">
  <thead>
    <tr><th>Usuário</th><th>Nome</th><th>Nível</th><th>email</th><th>FS</th></tr>
  </thead>
  <tbody>
    <?php foreach($usuarios as $usuarios):
    echo "<tr>
      <td><a href=".BASE_URL."/users/lista?id=". $usuarios['id'] .">".$usuarios['usuario']."</a></td>
      <td>".$usuarios['nome']."</td>
      <td>".$usuarios['nivel']."</td>
      <td>".$usuarios['email']."</td>	";
	   if($usuarios['fscon'] == 1 OR $usuarios['fscon'] == 2){
	echo "<td class='color_green'>Equipe FS</td>";
	}else{echo "<td> Cliente / Fornecedor </td>";}
	 echo "</td>
    </tr>";
	endforeach;
	?>
 
   
  </tbody>
</table>
  
    
    <div class="centra"><a href='#topo' style="text-decoration:none; font-family: 'Roboto', sans-serif; font-size:1em; font-weight:400;">Voltar ao topo</a></div>
   
 <div class="clear"></div>
</div> <!-- fecha container -->
