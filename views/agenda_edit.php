<?php
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />";
  require("menu.php");
  $id = $_GET['idag'];
  if(isset($_GET['saida']) && !empty($_GET['saida'])){
  $pg_saida = $_GET['saida']; }else {$pg_saida = "";}
  
  
  
  foreach($agenda as $agenda):
  endforeach;
?>
<div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  <div id="dir_form">
 
    <div id="form">
    <div class="title"><?php echo $agenda['empresa']; ?></div>
    <div class="subtitle"><?php echo $agenda['nome']; ?></div>


<form method="POST">

<label>ID<span class="small">Identificador DB</span></label>
<input type="text" name="idag" readonly="readonly" value="<?php echo $agenda['idag']; ?>"/>
<label>Categoria<span class="small">Contato / produto</span></label>
		<input type="text" name="categoria" value="<?php echo $agenda['categoria']; ?>"/>
<label>Empresa<span class="small">Nome / Razão Social</span></label>
		<input type="text" name="empresa" value="<?php echo $agenda['empresa']; ?>"/>
<label>Nome<span class="small">Nome / Contato</span></label>
        <input type="text" name="nome" value="<?php echo $agenda['nome']; ?>"/>
<label>Telefone<span class="small">Fone de contato</span></label>
        <input type="text" name="telefone" value="<?php echo $agenda['telefone']; ?>"/>
<label>Ramal<span class="small">Ramal telefônico</span></label>
        <input type="text" name="ramal" value="<?php echo $agenda['ramal']; ?>"/>
<label>Celular<span class="small">Celular / Contato</span></label>
        <input type="text" name="celular" value="<?php echo $agenda['celular']; ?>"/>
<label>FAX<span class="small">Número do Fax</span></label>
        <input type="text" name="fax" value="<?php echo $agenda['fax']; ?>"/>
<label>E-mail<span class="small">E-mail / Contato</span></label>
        <input type="text" name="email" value="<?php echo $agenda['email']; ?>"/>
<label>Site<span class="small">Site WEB</span></label>
        <input type="text" name="site" value="<?php echo $agenda['site']; ?>"/>
<label>Anotações<span class="small">Informações complementares</span></label>
        <textarea name="anotacao" rows="4" ><?php echo $agenda['anotacao']; ?></textarea>  
          <div class="clear"></div>
<label>Endereço<span class="small">Endereço</span></label>
        <input type="text" name="endereco" value="<?php echo $agenda['endereco']; ?>"/>
        
<label>CEP<span class="small">Endereçamento postal</span></label>
        <input type="text" name="cep" value="<?php echo $agenda['cep']; ?>"/>
<label>Cidade<span class="small">Cidade</span></label>
        <input type="text" name="cidade" value="<?php echo $agenda['cidade']; ?>"/>
<label>Estado<span class="small">Estado / UF</span></label>
        <input type="text" name="estado" value="<?php echo $agenda['estado']; ?>"/>
        
<label>Mais Falado<span class="small">Contato de uso constante</span></label>
<!-- <input type="text" name="maisfalado" value="<?php //echo $agenda['maisfalado']; ?>"/> -->
<select name="maisfalado"><option value="<?php echo $agenda['maisfalado']; ?> "><?php if ($agenda['maisfalado'] == 'mf') { echo "Uso Constante"; } else { echo "Não Ativo"; } ?></option>
<option value="mf">De uso constante</option><option value="">Não Ativado</option> </select>
        <div class="clear"></div>
<label>Data<span class="small">Data de cadastro</span></label>
<input type="text" name="data" readonly="readonly" value="<?php echo date('Y/m/d'); ?>"/>
<label>Usuário<span class="small">ID e Nome Usuario que atualizou</span></label>

<input type="text" name="user" readonly="readonly"  value="<?php $user="[ ".$_SESSION['ccUser'] . " ] ". $_SESSION['ccNome']; echo $user; ?>"/>     
           
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
