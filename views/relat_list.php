<?php
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/tabelas.css' media='screen' />";
 require("menu.php"); 
 ?>
 <table cellspacing="0" summary="Obras Cadastradas e execução">
  <thead>
    <tr><th>Id_Hist</th><th>Mês/Ano</th><th>obra</th></tr>
  </thead>
  <tbody>
 <?php
 $var = "";

foreach($historico as $historico):
      if($var != $historico['rsocial']){ 
        echo "<tr><td colspan='2'><img class='icon'  src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' />
" . "<a class='cliente' href=".BASE_URL."/clientes/edit?idcli=". $historico['idcli'].">".$historico['rsocial'] . "</td></tr>"; 
      }
    echo "<tr><td>
	<a class='obra' href=".BASE_URL."/relatorio/editar?id_hist=". $historico['id_hist']."> 
	• [ ".$historico['id_hist']." ]</a></td>
	<td>".$historico['mes']."/".$historico['ano']."
	</td>
	<td><a class='obra' href=".BASE_URL."/obras/editar?idobra=". $historico['imp_obra'].">".$historico['obra']."</a>
	</td>
	</tr>";
	$var = $historico['rsocial'];
  endforeach;
  

?>

 </tbody>
</table>