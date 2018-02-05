<link rel="stylesheet" href="../assets/css/tabelas.css" media="screen" />
<?php
	require("menu.php");
	echo "<div class='centra'><h1>&nbsp; Listagem do Patrimônio</h1></div>";
	// Listagem Paginada
	?>
    <table>
<thead><tr><th>Patrimônio</th><th>Tipo</th><th>Marca</th><th>Modelo</th><th>Usuário</th><th>Local</th></tr></thead>
<tbody>
    
    <?php
	
		foreach($equipamento as $equipamento):
	
	echo "<tr><td><a class='linkgeral' href=".BASE_URL."/equipa/lista_eqp?id_eqp=". $equipamento['id_eqp'] .">".$equipamento['patrimonio']."</a></td>";
	echo "<td>".$equipamento['tipo']."</td>";
	echo "<td>".$equipamento['marca']."</td>";
	echo "<td>".$equipamento['modelo']."</td>";
	echo "<td>".$equipamento['nome']."</td>";
	echo "<td>".$equipamento['local']."</td>";
		
		endforeach;
		
		echo "</tr>";
		$paginas=$_POST['NRP'];
		$page=$_POST['page'];
		
		//$anterior  = (($page - 1) == 0) ? 1 : $page - 1;
		//$posterior = (($p+1) >= $paginas) ? $paginas : $page+1;
		
?>
	<tr><td bgcolor="#F6F6F6" colspan="6" ><div class="centra">
	<?php

	
echo "<div id='paginacao'><a href=".BASE_URL."/equipa/eqp_pag?p=".(1).">Inicio</a></div>"; 
if($page > 1){echo "<div id='paginacao'><a href=".BASE_URL."/equipa/eqp_pag?p=".($page-1).">Anterior</a></div>"; 
}else {echo "<div id='paginacao'><a href=".BASE_URL."/equipa/eqp_pag?p=".($page).">Anterior</a></div>"; }
echo "<div id='paginacao'><a class='atual' href='#'>[ ".$page." ] </a></div>";
if($page < $paginas){ echo "<div id='paginacao'><a href=".BASE_URL."/equipa/eqp_pag?p=".($page+1).">Proxima</a></div>"; 
}else{ echo "<div id='paginacao'><a href=".BASE_URL."/equipa/eqp_pag?p=".($page).">Proxima</a></div>"; }
$final = ceil($paginas);
echo "<div id='paginacao'><a href=".BASE_URL."/equipa/eqp_pag?p=".($final).">Final</a></div>"; 
?>
	</div>
    
    
    </td></tr></tbody></table>
