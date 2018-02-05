<?php
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/tabelas.css' media='screen' />";
echo "<script src='".BASE_URL."/assets/js/jquery-3.2.1.min.js.js'></script>
  <script src='".BASE_URL."/assets/js/jquery.tablesorter.min.js'></script>
  <script src='".BASE_URL."/assets/js/jquery.tablesorter.pager.js'></script>";

 require("menu.php"); ?>
<div id="container"> <!-- Container com 3 colunas -->

<div class="espaco"></div>
<div class="centra"><span class="notetitulo">Clientes Cadastrados no Sistema</span></div>
<table cellspacing="0" summary="Clientes Cadastrados">
  <thead>
    <tr><th>Razão Social</th><th>CNPJ</th><th>Cidade</th><th>UF</th><th>email</th><th>Telefone</th></tr>
  </thead>
  <tbody>
    <?php foreach($clientes as $clientes):
    echo "<tr>
      <td width='350'><a href=".BASE_URL."/clientes/cliente?idcli=". $clientes['idcli'] .">".$clientes['rsocial']."</a></td>
      <td width='150'>".$clientes['cnpj']."</td>
      <td width='130'>".$clientes['cidade']."</td>
      <td>".$clientes['estado']."</td>
      <td>".$clientes['email']."</td>
	  <td width='110'>".$clientes['telefone']."</td>
      </tr>";
	endforeach;
	?>
 
    <tr>
      <td colspan="6">
      <?php
	  echo "<div class='centra'>";
	$paginas=$_POST['NRP'];
	$page=$_POST['page'];
	echo "<div id='paginacao'><a href=".BASE_URL."/clientes/paginado?p=".(1).">Inicio</a></div>"; 
if($page > 1){echo "<div id='paginacao'><a href=".BASE_URL."/clientes/paginado?p=".($page-1).">Anterior</a></div>"; 
}else {echo "<div id='paginacao'><a href=".BASE_URL."/clientes/paginado?p=".($page).">Anterior</a></div>"; }
echo "<div id='paginacao'><a class='atual' href='#'>[ ".$page." ] </a></div>";
if($page < $paginas){ echo "<div id='paginacao'><a href=".BASE_URL."/clientes/paginado?p=".($page+1).">Proxima</a></div>"; 
}else{ echo "<div id='paginacao'><a href=".BASE_URL."/clientes/paginado?p=".($page).">Proxima</a></div>"; }
$final = ceil($paginas);
echo "<div id='paginacao'><a href=".BASE_URL."/clientes/paginado?p=".($final).">Final</a></div>";
echo "</div>";
?>
      </td>
    </tr>  
  </tbody>
</table>
  
    
    
   
 <div class="clear"></div>
</div> <!-- fecha container -->
