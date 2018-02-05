<?php 
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />";
require("menu.php");
?>

<div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  <div id="dir_form">
 
    <div id="form">
    <div class="title">Adicionar nova obra</div>

<form method="POST">
<label>Categoria<span class="small">Contato / produto</span></label>
		<input type="text" name="categoria" />
<label>Empresa(*)<span class="small">Nome / Razão Social</span></label>
		<input type="text" name="empresa" required />
<label>Nome(*)<span class="small">Nome / Contato</span></label>
        <input type="text" name="nome" required />
<label>Telefone<span class="small">Fone de contato</span></label>
        <input type="text" name="telefone" />
<label>Ramal<span class="small">Ramal telefônico</span></label>
        <input type="text" name="ramal" />
<label>Celular<span class="small">Celular / Contato</span></label>
        <input type="text" name="celular" />
<label>FAX<span class="small">Número do Fax</span></label>
        <input type="text" name="fax" />
<label>E-mail<span class="small">E-mail / Contato</span></label>
        <input type="text" name="email" />
<label>Site<span class="small">Site WEB</span></label>
        <input type="text" name="site" />

<label>Anotações<span class="small">Informações complementares</span></label>
<textarea name="anotacao" rows="4"></textarea>    
 <div class="clear"></div>
        
<label>Endereço<span class="small">Endereço</span></label>
        <input type="text" name="endereco" />
        
<label>CEP<span class="small">Endereçamento postal</span></label>
        <input type="text" name="cep" />
<label>Cidade<span class="small">Cidade</span></label>
        <input type="text" name="cidade" />
<label>Estado<span class="small">Estado / UF</span></label>
        <input type="text" name="estado" />
        
       <label>Mais Falado<span class="small">Contato de uso constante</span></label>
<select name="maisfalado"><option value="">Selecionar ...</option>
<option value="mf">De uso constante</option><option selected="selected" value="">Não Ativado</option> </select>
 <div class="clear"></div>
<label>Data<span class="small">Data de cadastro</span></label>
        <input type="text" readonly="readonly" name="data" value="<?php echo date('Y/m/d'); ?>"/>
<label>Usuário<span class="small">ID e Nome Usuario que atualizou</span></label>
		<input type="text" readonly="readonly" name="user" value="<?php $user="[ ".$_SESSION['ccUser'] . " ] ". $_SESSION['ccNome']; echo $user; ?>"/>     
            <div class="clear">&nbsp;</div>
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
