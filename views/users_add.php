
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
?>

<div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  <div id="dir_form">
 
    <div id="form">
    <div class="title" style="margin-top:15px; margin-bottom:20px;">Adicionar novo usuário</div>

<form  method="POST">     
<label>Nome<span class="small">Nome completo do usuario</span></label>
<input type="text" name="nome" required />

        
<label>Nome de Usuário<span class="small">Usuário no sistema</span></label>
<input type="text" name="usuario" required />

<label>Senha<span class="small">Senha no sistema</span></label>
<input type="text" name="senha" required />

<label>Nivel<span class="small">Nivel do usuario</span></label>
<select name="nivel"><option value="">Selecionar ...</option>
<option value="0" selected="selected">Investidor (0)</option>
<option value="1">Equipe Projetos (1)</option> 
<option value="2">Cliente (2)</option> 
<option value="3">Engenheiro do cliente (3)</option> 
<option value="4">Engenheiro / Equipe FS (4)</option> 
<option value="5">Coordenador FS (5)</option> 
<option value="6">Diretor FS (6)</option> 
<option value="7">Administrador do Sistema (7)</option> 
</select>
 <div class="clear"></div>	
<!-- name="obra" recebeu um [ ] para receber multiplas seleções, sem isso só vai passar uma -->
		<label>Obras<span class="small">Obras deste usuário. Para multiplas seleções use a tecla Control</span></label>
		<select style="float:left; font-size:1em; line-height:1.4em; border:none; outline:none; resize:none;
  width:470px; margin:-75px 0 20px 190px;" multiple name="obra[]">
		<?php 
		foreach($obras as $obras):
		echo "<option value='" . $obras['idobra'] . "'>" . $obras['obra'] ."</option>";
		endforeach; ?> 
		</select> 
<div class="clear"></div>
 
<label>Status<span class="small">Usuário Ativo / Não Ativo</span></label>
<select name="ativo"><option value="">Selecionar ...</option>
<option value="1" selected="selected">Usuário Ativo</option>
<option value="0">Usuário Não ativo</option> </select>
<div class="clear"></div>
 

<label>E-mail<span class="small">Email cadastrado</span></label>
<input type="text" name="email" />

<label>Senha email<span class="small">Senha de email da FS</span></label>
<input type="text" name="pass_email" />

<label>Ramal<span class="small">Para equipe FS</span></label>
<input type="text" name="ramal" />

<label>FSCON<span class="small">Equipe FS</span></label>
<select name="fscon"><option value="">Selecionar ...</option>
<option value="0" selected="selected">Não FS</option>
<option value="1">Equipe FS</option> 
<option value="2">Engenheiro FS</option> 
</select>
<div class="clear"></div>
 
<label>Local<span class="small">(BHZ / BAURU / do Cliente)</span></label>
<input type="text" name="local" />

<label>Celular<span class="small">Celular</span></label>
<input type="text" name="celular" />

<label>Celular<span class="small">Celular pessoal</span></label>
<input type="text" name="celular2" />



<label>Nascimento<span class="small">Data de nascimento</span></label>
<input type="text" id="datepicker" name="nascimento" size="50" />

<label>Cliente / Empresa<span class="small">Empresa ou cliente</span></label>
<select name="imp_cliente"><option value="">Selecione ...</option>
		<option name="imp_cliente">
		<?php 
		foreach($clientes as $clientes):
		echo "<option value='" . $clientes['idcli'] . "'>" . $clientes['rsocial'] ."</option>";
		endforeach; ?> 
		</option> </select>
<div class="clear"></div>
<label>Emergência<span class="small">Contato de emergencia</span></label>
<input type="text" name="emergencia" />
        <div class="clear"></div>
 
<button type="submit" value="Send" style="margin-top:10px; font-size:0.9em; width:120px;" >Adicionar</button>
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