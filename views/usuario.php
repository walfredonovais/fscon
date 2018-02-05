<?php
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />";

  require("menu.php");

  foreach($usuarios as $usuarios):
  endforeach;
?>

<div id="container">
  <div id="esq_form">
  <div class="espaco">&nbsp;</div>
<?php if($_SESSION['ccNivel'] > 5){
  echo "<div class='Sub01'>Upload imagens</div>
      <span class='txevento'>
	  Preferencialmente jpg, a imagem será cortada para um tamanho final de 190x220</span><br><br>";
	  ?>
     <div class="search">
     <form action="<?php echo BASE_URL ?>/views/corta.php" method="post" enctype="multipart/form-data">
     <!-- Cria um label para o input file -->
        <label for="selecao"><span class="Sub01">Selecionar uma imagem &#187;</span></label>
		<input id="selecao" type="file" name="file" />
        <div id="espaco"></div>
   
        <input type="hidden" name="local" value="clientes/users"/>
        <input  type="text" name="id"  class="searchTerm" readonly="readonly" value="<?php echo $usuarios['id']; ?>" />
     
        <input type="submit" name="gravar" class="searchButton" value="" />
      </form>
	  </div>
	<?php echo ""; } ?>
   
  </div><!-- Fecha esq3 -->
  <div id="dir_form">
 
    <div id="form">
    <div class="title" style="margin-top:15px; margin-bottom:20px;">Cadastro do Usuário</div>
    <form method="POST">

<!-- Campo readonly="readonly" só leitura -->
<label>ID<span class="small">Identificador DB</span></label>
<input type="text" name="id" readonly="readonly" value="<?php echo $usuarios['id']; ?>"/>
<label>Nome<span class="small">Nome cadastrado</span></label>
<input type="text" name="nome" readonly="readonly" value="<?php echo $usuarios['nome']; ?>"/>
<label>Usuario<span class="small">Nome de usuário</span></label>
<input type="text" name="usuario" readonly="readonly" value="<?php echo $usuarios['usuario']; ?>"/>
<?php if($_SESSION['ccNivel'] > 6){
echo "<label>Senha<span class='small'>Senha cadastrada na intranet</span></label>
<input type='text' name='senha' readonly='readonly' value='".base64_decode($usuarios['senha'])."'/>";
} ?>
<label>Nivel<span class="small">Nivel de acesso na intranet</span></label>
<input type="text" name="nivel" readonly="readonly" value="<?php 
$a = $usuarios['nivel'];
switch($a) { case 0 : echo "[0] Investidor"; break; case 1 : echo "[1] Equipe Projetos"; break; case 2 : echo "[2] Cliente"; break; case 3 : echo "[3] Engenheiro do Cliente"; break;
case 4 : echo "[4] Equipe / Engenheiro FS"; break; case 5 : echo "[5] Gerente de Obra FS"; break; case 6 : echo "[6] Diretor FS"; break; case 6 : echo "[7] Administrador do Sistemna"; break; default: echo $usuarios['nivel']; } 
 ?>"/>
<label>Obras<span class="small">Obras cadastradas para o usuário</span></label>
<input type="text" name="obra" readonly="readonly" value="<?php 
if(isset($usuarios['obra']) && !empty($usuarios['obra'])){ echo $usuarios['obra'];}else{ echo "*";} ?>"/>
<label>Status<span class="small">Status do usuário</span></label>
<input type="text" name="ativo" readonly="readonly" value="<?php 
$b = $usuarios['ativo']; switch($b) { case 0 : echo "Usuário não ativo"; break; case 1 : echo "Usuário Ativo"; break; default: echo $usuarios['ativo']; } ?>"/>
<label>E-mail<span class="small">E-mail cadastrado</span></label>
<input type="text" name="email" readonly="readonly" value="<?php echo $usuarios['email']; ?>"/>
<?php if($_SESSION['ccNivel'] > 6){
echo "<label>Senha email<span class='small'>Senha do email FS</span></label>
<input type='text' name='pass_email' readonly='readonly' value='".$usuarios['pass_email']."'/>";
} ?>
<label>Ramal<span class="small">Ramal interno na FS</span></label>
<input type="text" name="ramal" readonly="readonly" value="<?php echo $usuarios['ramal']; ?>"/>
<label>Fscon<span class="small">Se usuário da FS</span></label>
<input type="text" name="fscon" readonly="readonly" value="<?php $b = $usuarios['fscon']; switch($b) { case 0 : echo "*"; break; case 1 : echo "Equipe FS"; break; case 2 : echo "Equipe de Engenheiros FS"; break; default: echo $usuarios['fscon']; } ?>"/>
<label>Local<span class="small">Local de trabalho</span></label>
<input type="text" name="local" readonly="readonly" value="<?php 
$c = $usuarios['local']; switch($c) { case '' : echo "*"; break; case 'BHZ' : echo "Belo Horizonte, MG"; break; case 'BAURU' : echo "Bauru, SP"; break; default: echo $usuarios['local']; } ?>"/>
<label>Celular<span class="small">Celular FS</span></label>
<input type="text" name="celular" readonly="readonly" value="<?php echo $usuarios['celular']; ?>"/>
<label>Celular II<span class="small">Celular (pessoal ou outro)</span></label>
<input type="text" name="celular2" readonly="readonly" value="<?php echo $usuarios['celular2']; ?>"/>



<label>Nascimento<span class="small">Data de nascimento</span></label>
<input type="text" name="nascimento" readonly="readonly" value="<?php 
  $nascimento = implode("/",array_reverse(explode("-",$usuarios['nascimento'])));
  echo $nascimento; ?>"/>
<label>Empresa<span class="small">Empresa desse usuário</span></label>
<input type="text" name="imp_cliente" readonly="readonly" value="<?php 
if(isset($usuarios['imp_cliente']) && !empty($usuarios['imp_cliente'])){ echo $usuarios['rsocial'];}else{ echo "*";} ?>"/>
<label>Emergência<span class="small">Contato e telefone</span></label>
<input type="text" name="emergencia" readonly="readonly" value="<?php echo $usuarios['emergencia']; ?>"/>
</form>
  <div class="clear">&nbsp;</div>
  <?php 
  if($_SESSION['ccNivel'] > 6){
  echo "<a class='btform' href=" . BASE_URL . "/users/editar?id=" . $usuarios['id'] . " > EDITAR </a><div class='spacer2'></div>"; } ?>
    </div>
    
  </div><!-- Fecha form -->

  <div class="clear">&nbsp;</div>
</div> <!-- Fecha container -->