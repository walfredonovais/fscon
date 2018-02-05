<?php 
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/tabelas.css' media='screen' />
<script src='".BASE_URL."/assets/js/jquery-3.2.1.min.js'></script>
  <script src='".BASE_URL."/assets/js/jquery.tablesorter.min.js'></script>
  <script src='".BASE_URL."/assets/js/jquery.tablesorter.pager.js'></script>";

require("menu.php"); ?>
<div id="container"> <!-- Container com 3 colunas -->

<div class="espaco"></div>
<div class="centra"><span class="notetitulo" style="font-size:1.8em;">Usuários FS Cadastrados no Sistema</span></div>
<table cellspacing="0" summary="Usuários Cadastrados">
  <thead>
    <tr><th>Usuário</th><th>Nome</th><th>Nível</th><th>email</th><th>local</th><th>FS</th></tr>
  </thead>
  <tbody>
    <?php foreach($usuarios as $usuarios):
    echo "<tr>
      <td><a href=".BASE_URL."/users/lista?id=". $usuarios['id'] .">".$usuarios['usuario']."</a></td>
      <td>".$usuarios['nome']."</td>
      <td>".$usuarios['nivel']."</td>
      <td>".$usuarios['email']."</td>
      <td>".$usuarios['local']."</td>";
	   if($usuarios['fscon'] == 1 OR $usuarios['fscon'] == 2){
	echo "<td class='color_green'>Equipe FS</td>";
	}else{echo "<td> Cliente / Fornecedor </td>";}
	 echo "</td>
    </tr>";
	endforeach;
	?>
 
    <tr>
      <td colspan="6">
      <?php
	  echo "<div class='centra'>";
	$paginas=$_POST['NRP'];
	$page=$_POST['page'];
	echo "<div id='paginacao'><a href=".BASE_URL."/users/fscon?p=".(1).">Inicio</a></div>"; 
if($page > 1){echo "<div id='paginacao'><a href=".BASE_URL."/users/fscon?p=".($page-1).">Anterior</a></div>"; 
}else {echo "<div id='paginacao'><a href=".BASE_URL."/users/fscon?p=".($page).">Anterior</a></div>"; }
echo "<div id='paginacao'><a class='atual' href='#'>[ ".$page." ] </a></div>";
if($page < $paginas){ echo "<div id='paginacao'><a href=".BASE_URL."/users/fscon?p=".($page+1).">Proxima</a></div>"; 
}else{ echo "<div id='paginacao'><a href=".BASE_URL."/users/fscon?p=".($page).">Proxima</a></div>"; }
$final = ceil($paginas);
echo "<div id='paginacao'><a href=".BASE_URL."/users/fscon?p=".($final).">Final</a></div>";
echo "</div>";
?>
      </td>
    </tr>  
  </tbody>
</table>
  
    
    
   
 <div class="clear"></div>
</div> <!-- fecha container -->
