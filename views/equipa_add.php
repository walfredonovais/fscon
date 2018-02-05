<link rel="stylesheet" href="../assets/css/form.css" media="screen" />
<?php require("menu.php"); ?>
<div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  <div id="dir_form">
 
    <div id="form">
    <div class="title">Adição de novo equipamento</div>
    <div class="subtitle">&nbsp;</div>

<form method="POST">     
<label>Patrimônio(*)<span class="small">Numero de patrimônio</span></label>
<input type="text" name="patrimonio" required />
  
 <label>Usuario<span class="small">Usuario deste equipamento</span></label> 
		<select name="nome"> 
        <option value=""><?php echo "Selecione ..."; ?></option> 
		<?php 
		foreach($usuarios as $usuarios):
		echo "<option value='" . $usuarios['nome'] . "'>" . $usuarios['nome'] ."</option>";
		endforeach; ?> 
		</select> 
<div class="clear">&nbsp;</div>



<label>Serial<span class="small">Número de série</span></label>
<input type="text" name="serial" />

<label>NF<span class="small">Número Nota Fiscal</span></label>
<input type="text" name="nf" />

<label>SMB<span class="small">Nome SMB (samba)</span></label>
<input type="text" name="smb" />

<label>Ponto de Rede<span class="small">Número do ponto</label>
<input type="text" name="pt_rede" />

<label>Tipo<span class="small">Tipo do equipamento</span></label>
<input type="text" name="tipo" />

<label>Marca<span class="small">Marca do Fabricante</span></label>
<input type="text" name="marca" />

<label>Modelo<span class="small">Modelo do Equipamento</span></label>
<input type="text" name="modelo" />

<label>Processador<span class="small">Processador</span></label>
<input type="text" name="processador" />

<label>Motherboard<span class="small">Fabricante da Placa Mãe</span></label>
<input type="text" name="motherboard" />

<label>Memória<span class="small">Memória RAM instalada</span></label>
<input type="text" name="memoria" />

<label>Sistema<span class="small">Sistema Operacional</span></label>
<input type="text" name="sistema" />

<label>Data da Baixa<span class="small">Data da baixa</span></label>
<input type="text" name="data_baixa" />

<label>Observações<span class="small">Obs. da baixa</span></label>
<textarea name="obs_baixa" rows="4"></textarea>
<div class="clear"></div>

<label>Local<span class="small">Local de operação</span></label>
<input type="text" name="local" />

<label>Suporte<span class="small">Obs. de Suporte</span></label>
<textarea name="suporte" rows="4"></textarea>
<div class="clear"></div>
        
<button type="submit" value="Send" style="margin-top:5px;">ENVIAR</button>
<div class="spacer"></div>
      
      
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
