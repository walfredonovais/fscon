<link rel="stylesheet" href="../assets/css/form.css" media="screen" />
<?php 
require("menu.php");
$id_eqp = $_GET['id_eqp'];
foreach($equipamento as $equipamento):

endforeach;

?>

<div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  <div id="dir_form">
 
    <div id="form">
    <div class="title"><?php echo $equipamento['patrimonio']; ?></div>
    <div class="subtitle">Edição dos dados do equipamento</div>

<form method="POST">

<label>ID<span class="small">Identificador DB</span></label>
<input type="text" name="id_eqp" readonly="readonly" value="<?php echo $equipamento['id_eqp']; ?>"/>
<label>Patrimônio<span class="small">Número de patrimônio</span></label>
		<input type="text" name="patrimonio" value="<?php echo $equipamento['patrimonio']; ?>"/>
        
        <label>Usuário<span class="small">Usuario registrado</span></label> 
		<select name="nome"> 
        <option value="<?php echo $equipamento['nome']; ?>"><?php echo $equipamento['nome']; ?></option> 
		<?php 
		foreach($usuarios as $usuarios):
		echo "<option value='" . $usuarios['nome'] ."'>" . $usuarios['nome'] . "</option>";
		endforeach; ?> 
	   </select> 
        <div class="clear"></div>
        
        
<label>Serial<span class="small">Número de série</span></label>
        <input type="text" name="serial" value="<?php echo $equipamento['serial']; ?>"/>
<label>NF<span class="small">Nota Fiscal</span></label>
        <input type="text" name="nf" value="<?php echo $equipamento['nf']; ?>"/>
<label>smb<span class="small">Nome SMB do equipamento</span></label>
        <input type="text" name="smb" value="<?php echo $equipamento['smb']; ?>"/>
<label>Ponto Rede<span class="small">Número do Ponto de Rede</span></label>
        <input type="text" name="pt_rede" value="<?php echo $equipamento['pt_rede']; ?>"/>
<label>Tipo<span class="small">Tipo de equipamento</span></label>
        <input type="text" name="tipo" value="<?php echo $equipamento['tipo']; ?>"/>
<label>Marca<span class="small">Marca do equipamento</span></label>
        <input type="text" name="marca" value="<?php echo $equipamento['marca']; ?>"/>
<label>Modelo<span class="small">Modelo do equipamento</span></label>
        <input type="text" name="modelo" value="<?php echo $equipamento['modelo']; ?>"/>
<label>Processador<span class="small">Processador se for o caso</span></label>
   <input type="text" name="processador" value="<?php echo $equipamento['processador']; ?>"/>
<label>Motherboard<span class="small">Placa Mãe</span></label>
        <input type="text" name="motherboard" value="<?php echo $equipamento['motherboard']; ?>"/>
<label>Memória<span class="small">Memória RAM</span></label>
        <input type="text" name="memoria" value="<?php echo $equipamento['memoria']; ?>"/>
<label>Sistema<span class="small">Sistema Operacional</span></label>
        <input type="text" name="sistema" value="<?php echo $equipamento['sistema']; ?>"/>  
<label>Data Baixa<span class="small">Data de Baixa</span></label>
        <input type="text" name="data_baixa" value="<?php echo $equipamento['data_baixa']; ?>"/>        
<label>Observações<span class="small">Observações / baixa</span></label>
        <textarea name="obs_baixa"  rows="4" /><?php echo $equipamento['obs_baixa']; ?></textarea>
        
<div class="clear"></div>
<label>Local<span class="small">Local instalado / uso</span></label>
        <input type="text" name="local" value="<?php echo $equipamento['local']; ?>"/>
 <div class="clear"></div>       
<label>Suporte<span class="small">Informações de suporte</span></label>       
 <textarea name="suporte"  rows="4" /><?php echo $equipamento['suporte']; ?></textarea>
       <div class="clear">&nbsp;</div> 
	<button type="submit" value="Send" style="margin-top:5px;">ENVIAR</button>
<div class="clear"></div>
   
     <?php if (isset($error) && !empty($error)): ?>
                    <div class="warning"><?php echo $error; 
					?></div>
                <?php endif; ?>
	</form>
<div class="clear">&nbsp;</div>
 
    </div>
    
  </div><!-- Fecha form -->

  <div class="clear">&nbsp;</div>
</div> <!-- Fecha container -->
