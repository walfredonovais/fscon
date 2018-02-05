<link rel="stylesheet" href="../assets/css/tabelas.css" media="screen" />
<?php
	require("menu.php");
	echo "<div class='centra'><h1>&nbsp; Listagem do Patrimônio</h1></div>";
	// Listagem Paginada
	?>
    <table>
<thead><tr><th>Patrimônio</th><th>Tipo</th><th>SMB</th><th>Modelo</th><th>Usuário</th><th>Local</th></tr></thead>
<tbody>
    
    <?php
	
		foreach($equipamento as $equipamento):
	
	echo "<tr><td><a class='linkgeral' href=".BASE_URL."/equipa/lista_eqp?id_eqp=". $equipamento['id_eqp'] .">".$equipamento['patrimonio']."</a></td>";
	echo "<td>".$equipamento['tipo']."</td>";
	echo "<td>".$equipamento['smb']."</td>";
	echo "<td>".$equipamento['modelo']."</td>";
	echo "<td>".$equipamento['nome']."</td>";
	echo "<td>".$equipamento['local']."</td>";
		
		endforeach;
		
		echo "</tr>";
		
		
?>
	</tbody></table>
