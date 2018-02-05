<link rel="stylesheet" href="../assets/css/form.css" media="screen" />
<?php
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />
<link rel='stylesheet' type='text/css' href='" . BASE_URL . "/assets/css/jquery-ui.css' />
	<script src='" . BASE_URL . "/assets/js/jquery-3.2.1.js'></script>
  	<script src='" . BASE_URL . "/assets/js/jquery-ui.js'></script>
 
<script>$(function() {
$('#datepicker').datepicker( { dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, 
showOtherMonths: true, selectOtherMonths: true } );
});</script>";

  require("menu.php");
  $id = $_GET['id'];
  foreach($usuarios as $usuarios):
  endforeach;
?>

<div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  <div id="dir_form">
 
    <div id="form">
    <div class="title">Cadastro do Usuário</div>
    <form method="POST">

<!-- Campo readonly="readonly" só leitura -->
<label>ID<span class="small">Identificador DB</span></label>
  <input type="text" name="id" readonly="readonly" value="<?php echo $usuarios['id']; ?>"/>
<label>Nome<span class="small">Nome cadastrado</span></label>
  <input type="text" name="nome"  value="<?php echo $usuarios['nome']; ?>"/>
<label>Usuario<span class="small">Nome de usuário</span></label>
  <input type="text" name="usuario"  value="<?php echo $usuarios['usuario']; ?>"/>
<label>Senha<span class="small">Senha do usuário</span></label>
<input type="text" name="senha"  value="<?php echo base64_decode($usuarios['senha']); ?>"/>
<label>Nivel<span class="small">Nivel de acesso na intranet</span></label>
<input type="text" name="nivel"  value="<?php echo $usuarios['nivel']; ?>"/>
<label>Obras<span class="small">Obras cadastradas para o usuário</span></label>
<input type="text" name="obra"  value="<?php echo $usuarios['obra']; ?>"/>
<label>Status<span class="small">Status do usuário</span></label>
<input type="text" name="ativo"  value="<?php echo $usuarios['ativo']; ?>"/>
<label>E-mail<span class="small">E-mail cadastrado</span></label>
<input type="text" name="email"  value="<?php echo $usuarios['email']; ?>"/>
<label>Senha<span class="small">Senha do email FS</span></label>
<input type="text" name="pass_email"  value="<?php echo $usuarios['pass_email']; ?>"/>
<label>Ramal<span class="small">Ramal interno na FS</span></label>
<input type="text" name="ramal"  value="<?php echo $usuarios['ramal']; ?>"/>
<label>Fscon<span class="small">Se usuário da FS</span></label>
<input type="text" name="fscon"  value="<?php echo $usuarios['fscon']; ?>"/>
<label>Local<span class="small">Local de trabalho</span></label>
<input type="text" name="local"  value="<?php echo $usuarios['local']; ?>"/>
<label>Celular<span class="small">Celular FS</span></label>
<input type="text" name="celular"  value="<?php echo $usuarios['celular']; ?>"/>
<label>Celular II<span class="small">Celular (pessoal ou outro)</span></label>
<input type="text" name="celular2"  value="<?php echo $usuarios['celular2']; ?>"/>



<label>Nascimento<span class="small">Data de nascimento</span></label>
  <input type="text" id="datepicker" name="nascimento" size="50" value="<?php 
	$nascimento = implode("/",array_reverse(explode("-",$usuarios['nascimento'])));
	echo $nascimento; ?>" />

<label>Empresa<span class="small">Empresa desse usuário</span></label>
<input type="text" name="imp_cliente"  value="<?php echo $usuarios['imp_cliente']; ?>"/>
<label>Emergência<span class="small">Contato e telefone</span></label>
<input type="text" name="emergencia"  value="<?php echo $usuarios['emergencia']; ?>"/>
<label>Obras e Clientes<span class="small">Lista de obras ativas e clientes</span></label>
		<select name=""> 
        <option value="">Verificar o ID das obras ...</option> 
		<?php 
		foreach($obras as $obras):
		echo "<option value=''> [ " . $obras['idobra'] . " ] &nbsp;" .  $obras['obra'] . "</option>";
		endforeach; ?> 
	   </select> 
       
        <div class="espaco2">&nbsp;</div>
        
        <select name=""> 
        <option value="">Verificar o ID do Clientes ...</option> 
		<?php 
		foreach($clientes as $clientes):
		echo "<option value=''> [ " . $clientes['idcli'] . " ] &nbsp;" .  $clientes['rsocial'] . "</option>";
		endforeach; ?> 
	   </select> 
       
        <div class="espaco2">&nbsp;</div>
                 
	<button type="submit" value="Send" style="margin-top:10px; font-size:0.9em; width:120px;">ENVIAR</button>



</form>
  <div class="clear">&nbsp;</div>
 
    </div>
    
  </div><!-- Fecha form -->

  <div class="clear">&nbsp;</div>
</div> <!-- Fecha container -->