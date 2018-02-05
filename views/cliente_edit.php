<?php 
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />";
require("menu.php");
$idcli = $_GET['idcli'];
foreach($clientes as $clientes):

endforeach;
?>

<div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  <div id="dir_form">
 
    <div id="form">
    <div class="title">Editar dados do cliente</div>



<form method="POST">

<label>ID<span class="small">Identificador DB</span></label>
<input type="text" name="idcli" readonly="readonly" value="<?php echo $clientes['idcli']; ?>"/>
<label>Razão Social<span class="small">RS do cliente</span></label>
		<input type="text" name="rsocial" value="<?php echo $clientes['rsocial']; ?>"/>
        
<label>CNPJ<span class="small">CNPJ do Cliente</span></label>
		<input type="text" name="cnpj" value="<?php echo $clientes['cnpj']; ?>"/>
<label>IE<span class="small">Inscrição Estadual</span></label>
        <input type="text" name="insc_est" value="<?php echo $clientes['insc_est']; ?>"/>
<label>IM<span class="small">Inscrição Municipal</span></label>
        <input type="text" name="insc_munic" value="<?php echo $clientes['insc_munic']; ?>"/>
        
<label>Contato<span class="small">Contato principal</span></label>
        <input type="text" name="contato" value="<?php echo $clientes['contato']; ?>"/>
<label>Celular<span class="small">ou telefone do cliente</span></label>
        <input type="text" name="telefone" value="<?php echo $clientes['telefone']; ?>"/>
<label>E-mail<span class="small">E-mail do cliente/contato</span></label>
        <input type="text" name="email" value="<?php echo $clientes['email']; ?>"/>        
<label>Contato<span class="small">Contato</span></label>
        <input type="text" name="contato2" value="<?php echo $clientes['contato2']; ?>"/>        
<label>Celular<span class="small">Celular do contato</span></label>
        <input type="text" name="celular" value="<?php echo $clientes['celular']; ?>"/>
<label>E-mail<span class="small">E-mail do contato</span></label>
        <input type="text" name="email2" value="<?php echo $clientes['email2']; ?>"/>
<label>FAX<span class="small">Número do FAX</span></label>
        <input type="text" name="fax" value="<?php echo $clientes['fax']; ?>"/>
<label>Site<span class="small">Site WEB da empresa</span></label>
   <input type="text" name="site" value="<?php echo $clientes['site']; ?>"/>
<label>Endereço<span class="small">Endereço do Cliente</span></label>
        <input type="text" name="endereco" value="<?php echo $clientes['endereco']; ?>"/>
<label>Complemento<span class="small">Complemento Loja/Sala</span></label>
        <input type="text" name="complemento" value="<?php echo $clientes['complemento']; ?>"/>
<label>Bairro<span class="small">Bairro</span></label>
        <input type="text" name="bairro" value="<?php echo $clientes['bairro']; ?>"/>  
<label>CEP<span class="small">CEP Correios</span></label>
        <input type="text" name="cep" value="<?php echo $clientes['cep']; ?>"/>        
<label>Cidade<span class="small">Cidade</span></label>
        <input type="text" name="cidade" value="<?php echo $clientes['cidade']; ?>"/>
<label>Estado<span class="small">UF / Estado</span></label>
        <input type="text" name="estado" value="<?php echo $clientes['estado']; ?>"/>
        
        
<label>Logotipo<span class="small">Logotipo gravado no sistema</span></label>
<select name="logo"><option value="<?php echo $clientes['logo']; ?> "><?php if ($clientes['logo'] == 1) { echo "Com logotipo"; } else { echo "Sem logotipo"; } ?></option>
<option value="1">Com logotipo gravado</option><option value="0">Sem logotipo</option> </select>
        
        
                    

        
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