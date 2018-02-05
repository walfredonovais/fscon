
<?php
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/tabelas.css' media='screen' />";
  require("menu.php");

?>

<div id="container">
  <div id="esq_form">
  <div id="boxinform">
  <p>
<strong>Sala de Reunião: 1455</strong><br>
<strong>Recepção: 1450 / 1472</strong><br>
<strong>Recepção de FAX: 1475</strong><br>
<strong>Sala de Treinamento: 1478</strong>
<div class="espaco">&nbsp;</div>
<strong>Linha para telefone fixo:</strong><br>
<span class="Sub02">Disque 0</span> (aguarde o sinal para discar)<br>
<strong>Linha para Celular:</strong><br>
<span class="Sub02">Disque 81</span> (aguarde o sinal para discar)<br>
<strong>Ligação interurbana:</strong><br>
<span class="Sub02">Disque 15</span>, aguarde o sinal, disque codigo de área e número.<br>
<strong>Puxar ligação para o seu ramal:</strong><br>
<span class="Sub02">Disque 55</span><br>
<strong>Transferir ligação para outro ramal:</strong><br>
<span class="Sub02">Tecle flash + ramal desejado</span><br>
<strong>Retomar a ligação transferida:</strong><br>
<span class="Sub02">Tecle flash + # + 0 (zero)</span><br>
<strong>Abrir Porta de Entrada:</strong><br>
Puxar ligação para o seu ramal (disque 55), atender e depois tecle flash + # + * (para abrir a porta).<br><br>
<span class="Sub01">Informações do link digital</span>:<br>
R2 Digital - 10 canais<br>
Piloto DDR<br>
Não tem CC4 desabilitado <br>
MCDU <br>
Crescente - Decrescente <br>
3025 1450 A 3025 1459<br>
3293-2300 e 3344-0006<br>
<br>
</div><!-- Fecha boxinform -->
  </div><!-- Fecha esq3 -->
  
  <div id="dir_form">

  <div id="contact2">
  <table cellspacing="0" summary="Usuários Cadastrados">
  <thead>
    <tr><th>Nome</th><th>Usuario</th><th>Ramal</th></tr>
  </thead>
  <tbody>
 <?php
foreach($usuarios as $usuarios):
echo "<tr><td><span class='txeventoView'>".
$usuarios['nome']."</span></td><td>".
$usuarios['usuario']."</td><td><span class='txeventoView'>".
$usuarios['ramal']."</span></td></tr>";
endforeach;	
	?>
  </tbody>
</table>

 </div><!-- Fecha contact -->
 
 </div><!-- Fecha dir_form -->

  <div class="clear"></div>
</div> <!-- Fecha container -->