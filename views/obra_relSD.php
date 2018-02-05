<?php 
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />";



// Muda o menu em função do nivel do usuários
require("cliente_m.php");

// Imprime mensage de erro se houver
if (isset($error) && !empty($error)){ echo "<div class='container2B'>&nbsp;
    <div class='boxarea'><div class='textobox'>". $error."</div>
    </div></div>"; }
	
?>


