<?php
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/tabelas.css' media='screen' />";
	require("menu.php");
	?>
    <a style="display:scroll;position:fixed;bottom:2px;right:2px;" href="#" title="Para o topo !">
	<a class="botaotopo" href="#" title="Para o topo !">
    
<?php echo "<img src='".BASE_URL."/assets/images/estrutura/top.png' border='0' />"; ?>
</a>


<div id="footer">
<form method="post" action=" <?php echo BASE_URL; ?>/agenda/lista">
    <input type="text" name="palavra" />
    <input type="submit"  value="Buscar" />
</form>
</div>

<table>
<thead><tr><th width="310">Empresa</th><th width="200">Nome</th><th>Categoria</th></tr></thead>
<tbody>

<?php
foreach($agenda as $agenda):
	echo "<tr><td width='310'><a style='margin-left:-10px;' class='linkgeral' href=".BASE_URL."/agenda/lista?idag=". $agenda['idag'] .">".$agenda['empresa']."</a></td>";
	echo "<td width='200'>".$agenda['nome']."</td>";
	echo "<td>".$agenda['categoria']."</td>";
	
		endforeach;
?>
<?php if(isset($_POST['NRP']) && !empty($_POST['NRP'])) { ?>
<tr>
<td style="text-align:center; background-color:rgb(243,243,243);" colspan="4"><?php
	$paginas=$_POST['NRP'];
	$page=$_POST['page'];
	$ultima_pag = ceil($paginas);
	
	$limite = 20;
	
	$prox = $page + '1';
	$ant = $page - '1';
	
	$penultima = $ultima_pag - 1;	
	$adjacentes = '2';
	$paginacao='';
	
	echo '<div class="pagina">';
	if ($page > 1){ $paginacao = '<a href='.BASE_URL.'/agenda/ag_pag?p='.$ant.'>anterior</a>'; }
	if ($ultima_pag <= 5) { for ($i=1; $i< $ultima_pag+1; $i++)
	{
		if ($i == $page) { $paginacao .= '<a class="atual" href='.BASE_URL.'/agenda/ag_pag?p='.$i.'>'.$i.'</a>';				
		} else { $paginacao .= '<a href='.BASE_URL.'/agenda/ag_pag?p='.$i.'>'.$i.'</a>'; }
	}
} 

if ($ultima_pag > 5) {
	if ($page < 1 + (2 * $adjacentes)){
		for ($i=1; $i< 2 + (2 * $adjacentes); $i++)
		{
			if ($i == $page)
			{ $paginacao .= '<a class="atual" href='.BASE_URL.'/agenda/ag_pag?p='.$i.'>'.$i.'</a>';				
			} else { $paginacao .= '<a href='.BASE_URL.'/agenda/ag_pag?p='.$i.'>'.$i.'</a>';	
			}
		}
		$paginacao .= '...';
		$paginacao .= '<a href='.BASE_URL.'/agenda/ag_pag?p='.$penultima.'>'.$penultima.'</a>';
		$paginacao .= '<a href='.BASE_URL.'/agenda/ag_pag?p='.$ultima_pag.'>'.$ultima_pag.'</a>';
	}
	elseif($page > (2 * $adjacentes) && $page < $ultima_pag - 3)
	{
		$paginacao .= '<a href='.BASE_URL.'/agenda/ag_pag?p=1">1</a>';				
		$paginacao .= '<a href='.BASE_URL.'/agenda/ag_pag?p=1">2</a> ... ';	
		for ($i = $page-$adjacentes; $i<= $page + $adjacentes; $i++)
		{
			if ($i == $page){ $paginacao .= '<a class="atual" href='.BASE_URL.'/agenda/ag_pag?p='.$i.'>'.$i.'</a>';				
			} else { $paginacao .= '<a href='.BASE_URL.'/agenda/ag_pag?p='.$i.'>'.$i.'</a>';	
			}
		}
		$paginacao .= '...';
		$paginacao .= '<a href='.BASE_URL.'/agenda/ag_pag?p='.$penultima.'>'.$penultima.'</a>';
		$paginacao .= '<a href='.BASE_URL.'/agenda/ag_pag?p='.$ultima_pag.'>'.$ultima_pag.'</a>';
	}
	else {
		$paginacao .= '<a href='.BASE_URL.'/agenda/ag_pag?p=1>1</a>';				
		$paginacao .= '<a href='.BASE_URL.'/agenda/ag_pag?p=1>2</a> ... ';	
		for ($i = $ultima_pag - (4 + (2 * $adjacentes)); $i <= $ultima_pag; $i++)
		{
			if ($i == $page)
			{ $paginacao .= '<a class="atual" href='.BASE_URL.'/agenda/ag_pag?p='.$i.'>'.$i.'</a>';				
			} else { $paginacao .= '<a href='.BASE_URL.'/agenda/ag_pag?p='.$i.'>'.$i.'</a>';	
			}
		}
	}
}
	if ($prox <= $ultima_pag && $ultima_pag > 2)
	{ $paginacao .= '<a href='.BASE_URL.'/agenda/ag_pag?p='.$prox.'>próxima</a>';
	}
		echo $paginacao;	
	echo '</div>';
?>
<?php 
echo "</td></tr>"; } ?>
</tbody></table>
 