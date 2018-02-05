  
<?php 
 echo "<script src='".BASE_URL."/assets/js/jquery-3.2.1.min.js'></script>
  <script src='".BASE_URL."/assets/js/jquery.tablesorter.min.js'></script>
  <script src='".BASE_URL."/assets/js/jquery.tablesorter.pager.js'></script>
 <link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/tabelas.css' media='screen' />";
require("menu.php");
 ?>
<div id="container"> <!-- Container com 3 colunas -->

<div class="espaco"></div>
<?php 
if(isset($_GET['it']) && !empty($_GET['it'])) {
			$it=$_GET['it']; }else
			{$it='la';}

//$it=$_GET['it']; 
if($it == 'lt'){
	echo "<div class='centra'><span class='notetitulo'>Obras Cadastrados no Sistema (todas)</span></div>";
	}else {
		echo "<div class='centra'><span class='notetitulo'>Obras Cadastrados no Sistema (ativas)</span></div>";
	}
	if(isset($_GET['it']) && !empty($_GET['it'])) {
		$pg_saida='obra';
	}else{$pg_saida='historico';}
?>

<table cellspacing="0" summary="Obras Cadastradas e execução">
  <thead>
    <tr><th>Obra</th><th>Cliente</th><th>Cidade</th><th>UF</th></tr>
  </thead>
  <tbody>
    <?php foreach($obras as $obras):
    echo "<tr>
      <td><a href=".BASE_URL."/obras/obras?idobra=".$obras['idobra']."&&saida=".$pg_saida.">".$obras['obra']."</a></td>
      <td>".$obras['rsocial']."</td>
      <td>".$obras['cid_obra']."</td>
      <td width='60'>".$obras['est_obra']."</td></tr>";
	endforeach;
	?>
 
    <tr>
      <td colspan="6">
      <?php
	  echo "<div class='centra'>";
	$paginas=$_POST['NRP'];
	$page=$_POST['page'];
	//$it=$_GET['it'];
	echo "<div id='paginacao'><a href=".BASE_URL."/obras/paginado?p=".(1)."&it=".$it.">Inicio</a></div>"; 
if($page > 1){echo "<div id='paginacao'><a href=".BASE_URL."/obras/paginado?p=".($page-1)."&it=".$it.">Anterior</a></div>"; 
}else {echo "<div id='paginacao'><a href=".BASE_URL."/obras/paginado?p=".($page)."&it=".$it.">Anterior</a></div>"; }
echo "<div id='paginacao'><a class='atual' href='#'>[ ".$page." ] </a></div>";
if($page < $paginas){ echo "<div id='paginacao'><a href=".BASE_URL."/obras/paginado?p=".($page+1)."&it=".$it.">Proxima</a></div>"; 
}else{ echo "<div id='paginacao'><a href=".BASE_URL."/obras/paginado?p=".($page)."&it=".$it.">Proxima</a></div>"; }
$final = ceil($paginas);
echo "<div id='paginacao'><a href=".BASE_URL."/obras/paginado?p=".($final)."&it=".$it.">Final</a></div>";
echo "</div>";
?>
	
      </td>
    </tr>  
  </tbody>
</table>
 <div class="clear"></div>
</div> <!-- fecha container -->

