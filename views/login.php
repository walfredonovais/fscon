<?php
echo "<link href='".BASE_URL."/assets/css/style.css' rel='stylesheet' />";
// Verifica se existe uma sessão iniciada - para recuperar senha
if (!isset($_SESSION)) { session_start(); }

	?>
<div class="clear">&nbsp;</div>

	<div class="loginarea">
   
	<form method="POST">
	<input type="usuario" name="usuario" placeholder="Usuario"/>
	  <input type="password" name="password" placeholder="Senha"/>
   
	 <div class="link01"><input type="submit" value="Entrar"/></div>
     </form>
    <?php 
	if (isset($error) && !empty($error)){
    echo "<div class='warning'>" . $error."</div><br>";
	echo "<div class='alerta'>Para recuperar a sua senha digite o email registrado no sistema, você irá receber a sua senha de acesso em sua caixa postal.</div>"; 
   	?>
	<form method="POST">
	<input type="email" name="email" placeholder="email cadastrado"/><br>
	<div class="link01"><input type="submit" value="Enviar"/></div>
	</form>
	<?php } ?>
</div> <!-- loginarea -->



