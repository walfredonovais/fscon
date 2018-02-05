
<?php 
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />";
require("menu.php"); 
foreach($agenda as $agenda):

	endforeach;
?>

<div id="container">
  <div id="esq_form">
  <div class="espaco">&nbsp;</div>
  
  </div>
  
 </div><!-- Fecha esq3 -->
  <div id="dir_form">
 
    <div id="form">
    <span class="title" style="margin-top:15px; margin-bottom:20px;">Contato: <?php echo $agenda['empresa']."</span>&nbsp; [ id: ".$agenda['idag']." ]"; ?>
<div class="clear">&nbsp;</div>
 <form method="POST">

<!-- Campo readonly="readonly" só leitura -->
<label>Identificação:<span class="small">Empresa</span></label>
<input type="text" name="empresa" readonly="readonly" value="<?php echo $agenda['empresa']; ?>"/>
<label>Nome<span class="small">Nome cadastrado</span></label>
<input type="text" name="nome" readonly="readonly" value="<?php echo $agenda['nome']; ?>"/>

<label>Categoria<span class="small">Categoria cadastrada</span></label>
<input type="text" name="categoria" readonly="readonly" value="<?php echo $agenda['categoria']; ?>"/>

<label>Site<span class="small">Site na internet</span></label>
<input type="text" name="site" readonly="readonly" value="<?php echo $agenda['site']; ?>"/>

<label>Telefone<span class="small">Telefone de contato</span></label>
<input type="text" name="telefone" readonly="readonly" value="<?php echo $agenda['telefone']; ?>"/>
<label>Ramal<span class="small">Ramal do contato</span></label>
<input type="text" name="ramal" readonly="readonly" value="<?php echo $agenda['ramal']; ?>"/>
<label>Celular<span class="small">Celular do contato</span></label>
<input type="text" name="celular" readonly="readonly" value="<?php echo $agenda['celular']; ?>"/>
<label>FAX<span class="small">FAX</span></label>
<input type="text" name="fax" readonly="readonly" value="<?php echo $agenda['fax']; ?>"/>
<label>E-mail<span class="small">E-mail</span></label>
<input type="text" name="email" readonly="readonly" value="<?php echo $agenda['email']; ?>"/>
<label>Endereço<span class="small">Endereço</span></label>

<input type="text" name="endereco" readonly="readonly" value="<?php echo $agenda['endereco']; ?>"/>
<label>CEP<span class="small">CEP</span></label>

<input type="text" name="cep" readonly="readonly" value="<?php echo $agenda['cep']; ?>"/>
<label>Cidade<span class="small">Cidade</span></label>
<input type="text" name="cidade" readonly="readonly" value="<?php echo $agenda['cidade']; ?>"/>
<label>UF<span class="small">Estado</span></label>
<input type="text" name="estado" readonly="readonly" value="<?php echo $agenda['estado']; ?>"/>
<label>Anotações<span class="small">Anotações</span></label>

<textarea type="text" name="estado" readonly="readonly" /><?php echo $agenda['anotacao']; ?></textarea>
<div class="clear"></div>
<label>UF<span class="small">Estado</span></label>
<input type="text" name="estado" readonly="readonly" value="<?php echo $agenda['estado']; ?>"/>


<?php echo "<a  href=".BASE_URL."/agenda/editar?idag=". $agenda['idag'] ."> EDITAR </a>&nbsp; | &nbsp;";
	echo "<a href='javascript:window.history.go(-1)'> VOLTAR </a>"; ?>
<p/>


<form method='post' action="<?php echo BASE_URL."/agenda/lista"; ?>" />
    <input type="text" name="palavra" />
    <input type="submit"  value="Buscar" />
</form>



<div class="clear"></div>
<!-- BOTOES EDITAR E VOLTAR -->
<?php echo "<a  href=".BASE_URL."/agenda/editar?idag=". $agenda['idag'] ."> EDITAR </a>&nbsp; | &nbsp;";
	echo "<a href='javascript:window.history.go(-1)'> VOLTAR </a>"; ?>
<p/>
<?php
// BUSCAR
echo "<div id='footer'><form method='post' action=". BASE_URL."/agenda/lista".">
    <input type='text' name='palavra' />
    <input type='submit'  value='Buscar' />
</form></div>";
?>
<div class="clear">&nbsp;</div>
</div>
    
  </div><!-- Fecha form -->

  <div class="clear">&nbsp;</div>
</div> <!-- Fecha container -->
