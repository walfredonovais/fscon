<?php
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<script src='".BASE_URL."/assets/js/jquery-3.2.1.min.js'></script>
  <script src='".BASE_URL."/assets/js/jquery-ui.min.js'></script>";
  
  require("menu.php"); 

?>
<!-- Script Abrir / Fechar ------------------------------------------------------------------------ -->
  <script type="text/javascript">
  function ObrasAtivas() {
    	if (document.getElementById("statebox").style.display == "block") 
    	{
    		document.getElementById('statebox').style.display = 'none';
    		document.getElementById('statebox').style.visibility = 'none';
    	}
    	else 
    	{
    		document.getElementById('statebox').style.display = 'block';
    		document.getElementById('statebox').style.visibility = 'visible';
    	}
    }
  </script>
<!-- --------------------------------------------------------------------------------------- -->


<div id="container"> <!-- Container com 3 colunas -->
  <div id="esquerda"> <!-- Primeira Coluna de 3 -->
<!-- Calendário de Eventos ----------------------------------------------------------------- -->
    <div id="box01"><div class="Sub05">Calendário de Eventos</div></div><!-- fecha box01 -->
    <div id="box02">
      <?php foreach($eventos as $evento):
        $adata=date('d/m/Y',strtotime($evento['start']));
        echo "<span class='txLegFoto'> # ".$adata."</span><br>
		<span style='line-height:1.2em;' class='txevento'>
        <a href=".BASE_URL."/eventos/evento?id=". $evento['id'].">".$evento['title']."</span></a>
		<div id='espaco'></div>";
      endforeach; ?>
    </div><!-- fecha box02 -->
    
    <div id="box02">
    <?php
	echo " &nbsp; <img class='icon' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' /><span class='Sub01'><a href=".BASE_URL."/eventos/add>Novo </span></a>
      &nbsp; | &nbsp;<span class='Sub01'><a href=".BASE_URL."/eventos/lista> Ver Todos</span></a>";
	?>
    </div><!-- fecha box02 -->
<!-- --------------------------------------------------------------------------------------- -->

<!-- Documentos de gestão ------------------------------------------------------------------ -->
  <div style="margin-top:10px;" id="box03"><div class="Sub05">Documentos de gestão</div></div><!-- fecha box03 -->
  <div id="box02">
    <span class="txLegFoto">Acesso direto aos documentos da Qualidade, Dossiê FS, Acervo Técnico, 
    Planejamento Estratégico e Atestados da FS:</span>
  </div><!-- fecha box02 -->
  
  <div id="box03"><div id="espaco"></div>
  <!-- Qualidade --------------------------------------------------------------------------- -->
  <form <?php echo "action='".BASE_URL."/elFinder/elfinder.php'"; ?> 
  method="post" enctype="multipart/form-data">
  <input type="hidden" name="qualidade" value="qualidade"/>
  <input type="hidden" name="nivel" value="<?php echo $_SESSION['ccNivel']; ?>"/>
  <input type="submit" name="submit" value="SGQ Qualidade" id="botao" />
  </form>
  <!-- Acervo --------------------------------------------------------------------------- -->
  <form <?php echo "action='".BASE_URL."/elFinder/elfinder.php'"; ?> 
  method="post" enctype="multipart/form-data">
  <input type="hidden" name="tecnico" value="tecnico"/>
  <input type="hidden" name="nivel" value="<?php echo $_SESSION['ccNivel']; ?>"/>
  <input type="submit" name="submit" value="Acervo Técnico" id="botao" />
  </form>
  <!-- Plano estratégico --------------------------------------------------------------------- -->
  <form <?php echo "action='".BASE_URL."/elFinder/elfinder.php'"; ?> 
  method="post" enctype="multipart/form-data">
  <input type="hidden" name="estrategico" value="tecnico"/>
  <input type="hidden" name="nivel" value="<?php echo $_SESSION['ccNivel']; ?>"/>
  <input type="submit" name="submit" value="Plano Estratégico" id="botao" />
  </form>
  <!-- Atestados FS -------------------------------------------------------------------------- -->
   <form <?php echo "action='".BASE_URL."/elFinder/elfinder.php'"; ?> 
  method="post" enctype="multipart/form-data">
  <input type="hidden" name="atestados" value="tecnico"/>
  <input type="hidden" name="nivel" value="<?php echo $_SESSION['ccNivel']; ?>"/>
  <input type="submit" name="submit" value="Atestados FS" id="botao" />
  </form>
  <!-- Folder FS -------------------------------------------------------------------------- -->
   <form <?php echo "action='".BASE_URL."/elFinder/elfinder.php'"; ?> 
  method="post" enctype="multipart/form-data">
  <input type="hidden" name="folder" value="tecnico"/>
  <input type="hidden" name="nivel" value="<?php echo $_SESSION['ccNivel']; ?>"/>
  <input type="submit" name="submit" value="Folder FS" id="botao" />
  </form>
  
   <!-- TI -------------------------------------------------------------------------- -->
   <?php if($_SESSION['ccNivel'] > 6){ ?>
   <form <?php echo "action='".BASE_URL."/elFinder/elfinder.php'"; ?> 
  method="post" enctype="multipart/form-data">
  <input type="hidden" name="ti" value="TI Documentos"/>
  <input type="hidden" name="nivel" value="<?php echo $_SESSION['ccNivel']; ?>"/>
  <input type="submit" name="submit" value="Documentos TI" id="botao" />
  </form>
  <?php } ?>
  </div><!-- fecha box03 -->
<!-- ------------------------------------------------------------------------------------- -->

<!-- Google -------------------------------------------------------------------------------- -->
  <div style="text-align:center;" id="box02">
   <div class="search">
   <img src="<?php echo BASE_URL ?>/assets/images/estrutura/google1.png" border="0" width="74" height="25" />
   <div id="espaco"></div>
   <form action="http://www.google.com/search" method="get" target="new">
   <input type="text" class="searchTerm" name="q" placeholder="O que você procura?" />
   <button type="submit" class="searchButton" ></button>
   </form>
   </div><!-- Fecha class search -->
   <div class="clear"></div>
  </div> <!-- Fecha box02 -->
  <!-- UPLOAD Imagem ------------------------------------------------------------------------------ -->

 <div style="text-align:center;" id="box02">
<?php if($_SESSION['ccNivel'] > 5){
  echo "<div class='espaco'>&nbsp;</div>
  <div class='Sub01'>Upload imagens</div>
      <span class='txevento'>
	  Preferencialmente jpg, a imagem será cortada para 590x330 pixel.</span><br><br>";
	  ?>
      
     <div class="search">
     <form action="<?php echo BASE_URL ?>/views/corta.php" method="post" enctype="multipart/form-data">
     <!-- Cria um label para o input file -->
        <label for="selecao"><span class="Sub01">Selecionar uma imagem &#187;</span></label>
		<input id="selecao" type="file" name="file" />
        <div id="espaco"></div>
   
        <input type="hidden" name="local" value="top"/>
        <input  type="text" name="id" class="searchTerm" required placeholder="top00, top01, top02..." />
     
        <input type="submit" name="gravar" class="searchButton" value="" />
      </form>
      <div class="clear"></div>
	 </div><!-- Fecha class search -->
	<?php echo ""; } ?>
   

    </div><!-- Fecha box02 -->
<!-- -------------------------------------------------------------------------------------------- -->
 <div id="espaco">&nbsp;</div>

</div> <!-- esquerda -->


<div id="central"> <!-- C O L U N A CENTRAL ------------------------------------------------ -->
<!-- Foto e obra em destaque --------------------------------------------------------------------- --> 
  <div class="centra" >
  <?php // Imagem e legenta no top central
  $data = date('Y-m-d');
  $diasemana = date('w', strtotime($data));
  $imgz='top0'.$diasemana.'.jpg';
  // Carrega a imagem
  echo "<img src=".BASE_URL."/assets/images/top/".$imgz." border='0' width='480' height= '270' />"; ?>
  </div>
  <div id="espaco"></div>
  <div id="box05">
  <?php
    // Carrega o título
    echo "<span class='Sub01'>".$fsnoticias['titulo']."</span> : ";
    // Carrega o corpo da notícia
    echo "<span class='txLegFoto'>".$fsnoticias['noticia']."</span>";
  ?>
  </div><!-- Fecha Box05 -->

<!-- --------------------------------------------------------------------------------------- -->
<!-- News --------------------------------------------------------------------- --> 
  <div id="box06">
  <div class="notetitulo">
  <div id="box08">
  <?php echo "&nbsp; <img class='icon' style='margin-top:-12px;' src='".BASE_URL."/assets/images/estrutura/news.png' border='0' ' />"; ?>
  
  <span style="color:rgb(0,102,153); margin-left:-5px;">Painel de Notícias FS</span></div>
  </div>
  
  <?php
    // Variavel local para filtrar noticias por obra / FS
    $local='fscon';
	echo "<div style='overflow:auto;height:220px; width:460px'>";
    // Loop no array noticias: título, corpo, autor, data e hora
    foreach($noticias as $noticias):
      echo "&nbsp; <img class='icon' style='margin-top:2px;' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' /><span class='Sub06' style='margin-left:-3px;'><a href=".BASE_URL."/noticias/note?id=". $noticias['id'] .">"
	  .$noticias['titulo']."</a></span><br><span class='Corpo'>".substr($noticias['noticia'], 3, 190)." ...</span><div id='espaco'></div>";
	  endforeach; 
	  
	  echo "</div><br><div class='centra'>
	  <span class='Sub01'><a href='".BASE_URL."/noticias/noticias?local=$local'>	  
	  Ver todas as notícias dos últimos 90 dias!</a></span> &nbsp;| ou |&nbsp; <span class='Sub01'><a href='".BASE_URL."/noticias/news_add?local=fscon'>
	Postar uma nova publicação<span></a></div>";
	  ?>
</div><!-- Fecha notetitulo -->
</div> <!-- fecha central -->
<!-- --------------------------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------------------- -->

<div id="direita"> <!-- Ccoluna da direita ------------------------------------------------- -->
<!-- Obras ativas no sitema ---------------------------------------------------------------- -->
  <div id="box01"><div class="Sub06">Obras ativas no sistema</div></div>
  <div style="margin-bottom:10px;" class="espaco"></div>
  <div class="clear"></div>
   <!-- BOX to switch on/off -->
   <div id="box07">
  <?php echo"<img onclick='javascript:ObrasAtivas()' src='".BASE_URL."/assets/images/estrutura/bt_ativas.png' width='200' height= '28' name='picpincountry'/>"; ?>
  </div> <!-- fecha box07 -->
  <div id="box02">
  <div class="control-group" id="statebox" name="statebox" style="display: none">
  <label>
 <?php 
  $var = ""; // Filtra obras para nivel 4
  if(($_SESSION['ccNivel'] == 4) OR ($_SESSION['ccNivel'] == 5)){
    foreach($outrasobras as $clientes):
      if($var != $clientes['rsocial']){ 
        echo "<img class='icon' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' />" . "<span class='cliente'>".$clientes['rsocial'] . "</span><br>"; 
	  }
      echo "<a class='obra' href=".BASE_URL."/relatorio/historico?idobra=". 
      $clientes['idobra'].">• ".$clientes['obra']."</a><br>";
      $var = $clientes['rsocial'];
    endforeach;
  echo "<br>";
  }else{ // Lista todas
    foreach($clientes as $clientes):
      if($var != $clientes['rsocial']){ 
        echo "<img class='icon'  src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' />
" . "<a class='cliente' href=".BASE_URL."/clientes/edit?idcli=". $clientes['idcli'].">".$clientes['rsocial'] . "<br>"; 
      }
    echo "<a class='obra' href=".BASE_URL."/relatorio/historico?idobra=". $clientes['idobra']."> 
	• ".$clientes['obra']."</a><br>";
	$var = $clientes['rsocial'];
  endforeach;
  }
?>
  </label>
  </div> <!-- fecha control-group -->
  </div>
  
  <!-- ANIVERSARIANTES ----------------------------------------------------------------------- -->
  <div style="margin-top:10px;" id="box02"><div class="Sub06">Aniversariantes do mês</div></div>
    <div id="box03">
    
 <?php //Aniversariantes
	if(!empty($niver)){
    foreach($niver as $niver):
	// Pegando o dia da data
	$adata = $niver['nascimento'];
	$partes = explode("-", $adata);
	$dia = $partes[2];
	
	echo "<span class='txevento'>&nbsp; ".$dia."</span> : ".$niver['nome']."<br>";
    endforeach;
	}else {
	 $mesatual = date("m");
	switch ( $mesatual ){ case 1: $mes = 'Janeiro'; break; case 2: $mes = 'Fevereiro'; break; case 3: $mes = 'Março'; break; case 4: $mes = 'Abril'; break; case 5: $mes = 'Maio'; break; case 6: $mes = 'Junho'; break; case 7: $mes = 'Julho'; break; case 8: $mes = 'Agosto'; break; case 9: $mes = 'Setembro'; break; case 10: $mes = 'Outubro'; break; case 11: $mes = 'Novembro'; break; case 12: $mes = 'Dezembro'; break; default: $mes = ''; }
	
	echo "<span class='txLegFoto'>Não foram localizados lançamentos no mês de ".$mes.".</span>";}
	?>
    
    </div><!--  Fecha direita -->
 
<div id="espaco"></div>

<!-- Calendario --------------------------------------------------------------------------------------- -->
<!-- Carrega iframe do calendário -->
  <iframe src="<?php echo BASE_URL ?>/views/calendario.php" frameborder="0" height="240" 
  width="100%" marginwidth="0" marginheight="0" scrolling="no"></iframe>
<!-- --------------------------------------------------------------------------------------- -->
  <div id="espaco">&nbsp;</div>
  
<!-- Links úteis --------------------------------------------------------------------------- -->
  <div id="box02"><div class="Sub06">Links úteis</div></div>
  <div id="box03">
  <div id="espaco2"></div>
 
  <select id="botao" style="height:25px;" onchange="location.href=this.value">
    <option target="new" >Selecione Aqui</option>
    <option value="http://www.crea-mg.org.br">CREA Minas Gerais</option>
    <option value="http://www.cub.org.br" target="new">CUB/m2 Brasil</option>
    <option value="http://www.sinduscon-mg.org.br">Sinduscon Minas Gerais</option>
    <option value="http://www.cbic.org.br">CBIC - Câmara Brasileira</option>
  </select>
 
  
</div> <!--  Fecha box03 -->
   <div id="espaco"></div>
  
<!-- Notificações --------------------------------------------------------------------------------------- -->
  <?php if(!empty($notifica)){
    echo "<div id='box02'><div class='Sub05' style='color: rgb(198,75,57);'>Notificações:</div></div><div id='box03'>";
    foreach($notifica as $notifica):
      echo "<img class='icon' style='margin-right:5px;' src='".BASE_URL."/assets/images/estrutura/tag.png' border='0' ' /> 
      <span class='Sub01'><a href='".BASE_URL."/notifica/notiUser?id=".$notifica['id']."'>".$notifica['titulo'].
      "</a></span> : <span class='txLegFoto'>".$notifica['data']."</span>
	  <div class='espaco'></div>";
    endforeach;
    echo "</div>"; //Fecha box03
    }
  ?>
  <div id="espaco">&nbsp;</div>
  
  
  
</div><!-- fecha direita -->


<div class="clear"></div>
</div> <!-- fecha container dos dados -->
