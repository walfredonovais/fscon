<?php
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/home.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/relatorio.css' media='screen' />";

echo "<link rel='stylesheet' href='".BASE_URL."/assets/css/lightbox.min.css' media='screen' />";
echo"<script type='text/javascript' src='".BASE_URL."/assets/js/lightbox-plus-jquery.min.js'></script>";

// Muda o MENU em função do nivel do usuários
if($_SESSION['ccNivel'] < 4){ require("cliente_m.php"); }else{ require("menuBK.php"); }



// USUARIO DE NIVEL 01 ---------------------------------------------------------------------
if($_SESSION['ccNivel'] == 1){
	echo "<div id='conteudo'>
	<div id='esq'>&nbsp;</div>
	<div id='dir'>";
	// Mensagem de erro sem lançamentos
	if (isset($error) && !empty($error)){ echo "
    <div class='boxarea' style='font-size:1.1em;'>". $error."</div>
	</div>
	<div class='clear'></div>
	</div>"; exit; }
	echo "<div class='subtitleE' style='margin:40px 0px 40px 40px;'>Clientes e Obras</div>";
		$var = ""; 
	 foreach($outrasobras as $obras):
	 if($var != $obras['rsocial']){ 
	 echo "<div class='subtitleE' style='margin:0px 0px 10px 40px;'>".$obras['rsocial']."</div>";
	 }
      echo "<a  href=".BASE_URL."/elFinder/elfinder.php?idobra=". $obras['idobra']."&&idcli=". $obras['id_imp']."&&id_hist=".$historico['id_hist']."&&nivel=".$_SESSION['ccNivel'].">
	  
	  <div class='subtitleE' style='margin:10px 0px 10px 60px;'>". $obras['obra']."</a></div>";
	  $var = $obras['rsocial'];
      endforeach;
	 echo "</div><div class='clear'></div></div>"; // Fecha conteudo
	 exit;
	} 
// ERRO PARA OS OUTROS USUARIOS

// Imprime mensage de erro se houver
if (isset($error) && !empty($error)){ echo "<div class='container2'>&nbsp;
    <div class='boxarea' style='font-size:1.1em;'>". $error."</div>
	<div class='clear'>&nbsp;</div><br><br>
	</div>"; exit; }



	
// CARREGA AS VARIÁVEIS -----------------------------------------------------------------------------------
	$status = $historico['status']; $omes = $historico['mes']; $oano = $historico['ano'];
// Para escolher nova obra, usuarios de nivel menor que 4
	if($_SESSION['ccNivel'] < 4){ foreach($outrasobras as $obras){ } }
// CONVERTE MES ---------------------------------------------------
switch($omes) { case 1: $zmes = 'JANEIRO'; break; case 2: $zmes = 'FEVEREIRO'; break; case 3: $zmes = 'MARÇO'; break; case 4: $zmes = 'ABRIL'; break; case 5: $zmes = 'MAIO'; break; case 6: $zmes = 'JUNHO'; break; case 7: $zmes = 'JULHO'; break; case 8: $zmes = 'AGOSTO'; break; case 9: $zmes = 'SETEMBRO'; break; case 10: $zmes = 'OUTUBRO'; break; case 11: $zmes = 'NOVEMBRO'; break; case 12: $zmes = 'DEZEMBRO'; break; }
// -------------------------------------------------------------------------------------------------------
// Acompanhamento Físico
// Esse calculo deve entrar antes da conversao de - para /
	if($historico['meta2'] == '0000-00-00') {
	// Se não existir meta2 troca por meta1
	$dateTime = new DateTime($historico['meta1']); } else {$dateTime = new DateTime($historico['meta2']); }
	// Se não existir data corrente manda 0000
	if($historico['corrente'] !== '0000-00-00') {
		$dateDiff = $dateTime->diff(new DateTime($historico['corrente']));
		$historico['atraso'] = $dateDiff->format('%a');
		} else { $historico['atraso'] = ""; } // senao manda vazio
// MANIPULA AS DATAS - ALTERA OS VALORES NO ARRAY ---------------------------------------------------------
		if(isset($historico['meta1']) && ($historico['meta1'] !== '0000-00-00')) {
			$dateTime = DateTime::createFromFormat('Y-m-d', $historico['meta1']);
			$historico['meta1'] = $dateTime->format('d/m/Y');  } else { $historico['meta1'] = '';}
		if(isset($historico['meta2']) && ($historico['meta2'] !== '0000-00-00')) {	
			$dateTime = DateTime::createFromFormat('Y-m-d', $historico['meta2']);
			$historico['meta2'] = $dateTime->format('d/m/Y'); } else { $historico['meta2'] = '';}
		if(isset($historico['corrente']) && ($historico['corrente'] !== '0000-00-00')) {	
			$dateTime = DateTime::createFromFormat('Y-m-d', $historico['corrente']);
			$historico['corrente'] = $dateTime->format('d/m/Y'); } else { $historico['corrente'] = '';}
// -------------------------------------------------------------------------------------------------------
// Resultado economico
if(($historico['c_previsto'] != 0) && ($historico['c_realizado'] != 0)){
	$resultado = $historico['c_previsto'] - $historico['c_realizado'];
	// percentual
	$p_resultado = ($resultado * 100) / $historico['c_previsto'] ;
	// Converte formato dos dados
	// Percentual em duas casas decimais
	$p_resultado=number_format($p_resultado, 2, ',', '.'); 
	// Converte resultado
	$resultado=number_format($resultado, 2, ',', '.');  } else {$resultado=0.00; $p_resultado=0; }

// -------------------------------------------------------------------------------------------------------
// Resultado projetado
	 if(($historico['c_final'] > 0) && ($historico['orctotal'] > 0)){
	 $projetado= ($historico['c_final'] * 100) / $historico['orctotal']; 
	 	$projetado=number_format($projetado, 2, ',', '.'); 
		$c_final=number_format($historico['c_final'], 2, ',', '.'); } else { $projetado=0.0; $c_final=0.0; }
// Resultado economico projetado
		if(($historico['orctotal'] > 0) && ($historico['c_final'] > 0) ){
		$r_projetado=($historico['orctotal']-$historico['c_final']); 
		$rprojetado=number_format($r_projetado, 2, ',', '.'); 
		// Percentual do resultado projetado
		$p_projetado=($r_projetado * 100) / $historico['orctotal']; 
		$p_projetado=number_format($p_projetado, 2, ',', '.'); }else { $rprojetado=0.0; $p_projetado=0; }
// -------------------------------------------------------------------------------------------------------

// IMAGENS Define o endereço das imagens do grafico  -------------------------------------------------------
$grafico=$historico['id_hist']."_graf.jpg";
$graficoB=$historico['id_hist']."_graf_mini.jpg";
// Verifica se existe
$filename = BASE_URL."/assets/clientes/".$historico['idcli']."/".$historico['imp_obra']."/images/".$grafico;
$filenameB = BASE_URL."/assets/clientes/".$historico['idcli']."/".$historico['imp_obra']."/images/".$graficoB;
$filenameZ = BASE_URL."/assets/images/estrutura/obras2.png";

// Define o endereço das imagens

$img01=$historico['id_hist']."_1.jpg"; $img01b=$historico['id_hist']."_1b.jpg";
$img02=$historico['id_hist']."_2.jpg"; $img02b=$historico['id_hist']."_2b.jpg";
$img03=$historico['id_hist']."_3.jpg"; $img03b=$historico['id_hist']."_3b.jpg";
$img04=$historico['id_hist']."_4.jpg"; $img04b=$historico['id_hist']."_4b.jpg";
$img05=$historico['id_hist']."_5.jpg"; $img05b=$historico['id_hist']."_5b.jpg";
$img06=$historico['id_hist']."_6.jpg"; $img06b=$historico['id_hist']."_6b.jpg";
$img07=$historico['id_hist']."_7.jpg"; $img07b=$historico['id_hist']."_7b.jpg";
$img08=$historico['id_hist']."_8.jpg"; $img08b=$historico['id_hist']."_8b.jpg";
$img09=$historico['id_hist']."_9.jpg"; $img09b=$historico['id_hist']."_9b.jpg";

$path="/assets/clientes/".$historico['idcli']."/".$historico['imp_obra']."/images/";

// Verifica se existe
$image01 = BASE_URL.$path.$img01; $image01b = BASE_URL.$path.$img01b;
$image02 = BASE_URL.$path.$img02; $image02b = BASE_URL.$path.$img02b;
$image03 = BASE_URL.$path.$img03; $image03b = BASE_URL.$path.$img03b;
$image04 = BASE_URL.$path.$img04; $image04b = BASE_URL.$path.$img04b;
$image05 = BASE_URL.$path.$img05; $image05b = BASE_URL.$path.$img05b;
$image06 = BASE_URL.$path.$img06; $image06b = BASE_URL.$path.$img06b;
$image07 = BASE_URL.$path.$img07; $image07b = BASE_URL.$path.$img07b;
$image08 = BASE_URL.$path.$img08; $image08b = BASE_URL.$path.$img08b;
$image09 = BASE_URL.$path.$img09; $image09b = BASE_URL.$path.$img09b;

// -------------------------------------------------------------------------------------------------------
?>


    

<div id="conteudo">

<!-- SE EXISTIR ANALISE TROCA A esq PARA esqB -->
<?php if($historico['analise'] !=""){
	 echo "<div id='esqB'>"; } else { echo "<div id='esq'>"; } ?>
  
<!-- SE EXISTIR ANALISE TROCA A COL03 PARA 03B -->
<?php if($historico['analise'] !=""){
	 echo "<div class='col03B'>"; } else { echo "<div class='col03'>"; } ?>
       
      <div class="titulo" style="color:rgb(255,255,255); margin-top:8px;">Relatório Mensal</div>
      
      <!-- Editar Relatorio -->
  <?php if($_SESSION['ccNivel'] > 4){ echo "<div class='subtitle'><a  href=".BASE_URL."/relatorio/editar?id_hist=". $historico['id_hist']." title='Editar histórico' > ".$zmes." / ".$oano." *</a></div>"; } else{ echo "<div class='subtitle'>".$zmes." / ".$oano."</div>"; } ?><br>
            
  <span class="subtitle" style="font-size:1.4em; color:rgb(255,255,255); letter-spacing:0.03em;">
  <?php echo $historico['rsocial']; ?></span><br><br /><div class="espaco">&nbsp;</div>
  
  <span class="subtitle" style="font-size:1.1em;">Prazo da Obra: </span>
  <span class="subtitle" style="color:rgb(255,255,255);"><?php echo $historico['prazo']; ?> meses</span><br><br>
  
  <span class="subtitle" style="font-size:1.1em;">Meta inicial: </span>
  <span class="subtitle" style="color:rgb(255,255,255);"><?php echo $historico['meta1']; ?></span><br><br>
  
  <span class="subtitle" style="font-size:1.1em;">Orçamento:</span>
  <span class="subtitle" style="color:rgb(255,255,255);">
  R$ <?php $orctotal=number_format($historico['orctotal'], 2, ',', '.');
  echo $orctotal; ?> </span> 
  
  <div class="espaco">&nbsp;</div>
  
  <!-- Outras obras ------------------------------------------------------------------------- -->
  <?php if(!empty($outrasobras) && ($outrasobras != "")){ ?>
    <form method="POST">
    <input  type="hidden" name="id_hist" value="<?php echo $historico['id_hist']; ?>"/>
    <input  type="hidden" name="reordem" value="<?php echo $historico['reordem']; ?>"/>
    <!-- onchange="this.form.submit() permite mudar sem o botao submit -->
    <select id="soflow-color"  style="height:25px; width:290px; margin-left:17px; margin-top:10px; "; name="imp_obra" onchange="this.form.submit()"> 
    <option value=""><?php echo "Selecione outra obra"; ?></option> 
    <?php 
      foreach($outrasobras as $obras):
      echo "<option value='" . $obras['idobra'] . "'>" . $obras['obra'] ."</option>";
      endforeach; ?> 
    </select> 
    </form>
  <?php } ?> 
<!-- -------------------------------------------------------------------------------------- -->  

      </div> <!-- fecha col03 -->
    
<!-- FOTOS lateral esquerda ------------------------------------------------------ -->
    <div class="col04"><!-- Box geral das fotos  --------------------------------- -->
      <div class="col05"><!-- FOTOS linha 1-->
        <div class="coluna6">
        <?php if (@GetImageSize($image01) && @GetImageSize($image01b)) { 
	    echo "<a  href='".$image01."' data-lightbox='set0' data-title=''>
	    <img src='". $image01b."' width='90' height='90' alt=''/></a>"; }else if (@GetImageSize($image01)){
		echo "<a  href='".$image01."' data-lightbox='set0' data-title=''>
	    <img src='". $image01."' width='90' height='90' alt=''/></a>"; } ?>
        </div> <!-- Foto 01 -->
        
        <div class="coluna6">
        <?php if (@GetImageSize($image02) && @GetImageSize($image02b)) { 
        echo "<a  href='".$image02."' data-lightbox='set0' data-title=''>
	    <img src='". $image02b."' width='90' height='90' alt=''/></a>"; }else if (@GetImageSize($image02)){
		echo "<a  href='".$image02."' data-lightbox='set0' data-title=''>
	    <img src='". $image02."' width='90' height='90' alt=''/></a>"; } ?>
        </div> <!-- Foto 02 -->
        
        <div class="coluna6">
        <?php if (@GetImageSize($image03) && @GetImageSize($image03b)) { 
	    echo "<a  href='".$image03."' data-lightbox='set0' data-title=''>
	    <img src='". $image03b."' width='90' height='90' alt=''/></a>"; }else if (@GetImageSize($image03)){
		echo "<a  href='".$image03."' data-lightbox='set0' data-title=''>
	    <img src='". $image03."' width='90' height='90' alt=''/></a>"; } ?>
        </div> <!-- Foto 03 -->
        
      </div> <!-- col05 -->
  
      <div class="col05"><!-- FOTOS linha 2-->
        <div class="coluna6">
        <?php if (@GetImageSize($image04) && @GetImageSize($image04b)) { 
	    echo "<a  href='".$image04."' data-lightbox='set0' data-title=''>
	    <img src='". $image04b."' width='90' height='90' alt=''/></a>"; }else if (@GetImageSize($image04)){
		echo "<a  href='".$image04."' data-lightbox='set0' data-title=''>
	   <img src='". $image04."' width='90' height='90' alt=''/></a>"; } ?>
        </div> <!-- Foto 04 -->
        
        <div class="coluna6">
        <?php if (@GetImageSize($image05) && @GetImageSize($image05b)) { 
	    echo "<a  href='".$image05."' data-lightbox='set0' data-title=''>
	    <img src='". $image05b."' width='90' height='90' alt=''/></a>"; }else if (@GetImageSize($image05)){
		echo "<a  href='".$image05."' data-lightbox='set0' data-title=''>
	    <img src='". $image05."' width='90' height='90' alt=''/></a>"; } ?>
        </div> <!-- Foto 05 -->
        
        <div class="coluna6">
        <?php if (@GetImageSize($image06) && @GetImageSize($image06b)) { 
	    echo "<a  href='".$image06."' data-lightbox='set0' data-title=''>
	    <img src='". $image06b."' width='90' height='90' alt=''/></a>"; }else if (@GetImageSize($image06)){
		echo "<a  href='".$image06."' data-lightbox='set0' data-title=''>
	    <img src='". $image06."' width='90' height='90' alt=''/></a>"; } ?>
        </div> <!-- Foto 06 -->
        
      </div> <!-- col05 -->  
    
      <div class="col05"><!-- FOTOS linha 3-->
        <div class="coluna6">
        <?php if (@GetImageSize($image07) && @GetImageSize($image07b)) { 
	    echo "<a  href='".$image07."' data-lightbox='set0' data-title=''>
	    <img src='". $image07b."' width='90' height='90' alt=''/></a>"; }else if (@GetImageSize($image07)){
		echo "<a  href='".$image07."' data-lightbox='set0' data-title=''>
	    <img src='". $image07."' width='90' height='90' alt=''/></a>"; } ?>
        </div> <!-- Foto 07 -->
        
        <div class="coluna6">
        <?php if (@GetImageSize($image08) && @GetImageSize($image08b)) { 
	    echo "<a  href='".$image08."' data-lightbox='set0' data-title=''>
	    <img src='". $image08b."' width='90' height='90' alt=''/></a>"; }else if (@GetImageSize($image08)){
		echo "<a  href='".$image08."' data-lightbox='set0' data-title=''>
	    <img src='". $image08."' width='90' height='90' alt=''/></a>"; } ?>
        </div> <!-- Foto 08 -->
        
        <div class="coluna6">
        <?php if (@GetImageSize($image09) && @GetImageSize($image09b)) { 
	    echo "<a  href='".$image09."' data-lightbox='set0' data-title=''>
	    <img src='". $image09b."' width='90' height='90' alt=''/></a>"; }else if (@GetImageSize($image09)){
		echo "<a  href='".$image09."' data-lightbox='set0' data-title=''>
	    <img src='". $image09."' width='90' height='90' alt=''/></a>"; }  ?>
        </div> <!-- Foto 09 -->
        
      </div> <!-- col05 -->
      
      
      
  </div> <!-- fecha col04 -->    
  
  </div><!-- fecha esq -->
<!-- Fechou coluna esquerda ------------------------------  ------------------------------- -->

<!-- SE EXISTIR ANALISE TROCA A dir PARA dirB COLUNA DIREITA-->
<?php if($historico['analise'] !=""){
	 echo "<div id='dirB'>"; } else { echo "<div id='dir'>"; } ?>
    <div class="col07B"> <!-- Título da obra-->
    <div class="obra" ><?php if($_SESSION['ccNivel'] >= 4){ 
	  echo "<a  href=".BASE_URL."/obras/editar?idobra=". $historico['imp_obra']."&&saida=".$historico['id_hist']." title='Editar dados da Obra' >".
	  $historico['obra']." *</a>"; }else{ echo $historico['obra']; } ?></div>
    </div> <!-- fecha col07B Título -->

    <div class="col2BB"><!-- Primeiro containes dentro da coluna 2 -->
        
      <div class="col10"> <!-- Container do grafico -->
      <?php 
	  if (@GetImageSize($filename)) { 
	  echo " <div class='col10B'><a  href='".$filename."'data-lightbox='set1' data-title=''>
	  <img src='".$filenameB."'  width='250' height='250' alt=''/></a></div>"; }else {
		 echo " <div class='col10B'> <img src='".$filenameZ."'  width='250' height='250' alt=''/></div>";
		  }
	   ?>
      <!-- GRAFICO  -->
      <?php  if (@GetImageSize($filename)) { echo "<div class='col10C'>
	  <span class='legenda' style='font-size:0.9em;'> Um clique na imagem para ampliar</span></div>"; } ?>
      </div>
      
      <div class="col07BB"> <!-- Conteiner da navegação -->
        <div class="dadosnav">
	    <form method="post"><input type="hidden" name="imp_obra" value="<?php echo $historico['imp_obra']; ?>"/>
        <input  type="hidden" name="id_hist" value="<?php echo $historico['id_hist']; ?>"/>
        <input  type="hidden" name="reordem" value="<?php echo $historico['reordem']; ?>"/>
        <input type="submit" class="botao" name="back" action="<?php echo BASE_URL ?>/relatorio/historico" 
        value="Lançamentos Anteriores">
	    <?php if (isset($error1) && !empty($error1)){
			echo  "  &nbsp;  <font color='red'>" . $error1 . "</font>  &nbsp;  ";} ?>
   
        <input  type="hidden" name="id_hist" value="<?php echo $historico['id_hist']; ?>"/>
        <input  type="hidden" name="reordem" value="<?php echo $historico['reordem']; ?>"/>
        <input type="submit" class="botao" name="next" action="<?php echo BASE_URL ?>/relatorio/historico" 
        value="Novos Lançamentos">
	    <?php if (isset($error2) && !empty($error2)){
			echo  "  &nbsp;  <font color='red'>" . $error2 . "</font>  &nbsp;  ";} ?> </form>
            </div> <!-- dadosnav -->
      </div> <!-- col07BB -->
      
      <div class="col07">
      <div class="subtitleE">Acompanhamento Físico Mensal</div>
      </div><!-- Titulo Físico mensal -->
      
      <div class="col08"> <!-- Container do primeiro bloco de dados -->
       
       <div class="col13">
       <div class="subtitleE">As Metas</div></div><!-- Sub titulo Metas -->
       
         <div class="col11"><!-- Container das físicas Metas -->
         <div class="col12">
           <div class="subtitleF">Meta atualizada</div>
           <div class="subtitleG"><?php echo $historico['meta2']; ?></div>
         </div>
         
          <div class="col12">
           <div class="subtitleF">Término corrente</div>
           <div class="subtitleG"><?php echo $historico['corrente']; ?></div>
         </div>
         
          <div class="col12">
           <div class="subtitleF">Variação (dias)</div>
           <div class="subtitleG"><?php echo $historico['atraso']; ?>
           <?php if($historico['status']='adiantado'){ echo "<span class='subtitleGB'>
		   ( ".$historico['status'];}else{echo "<span class='subtitleGBR'>".$historico['status'];} ?> )</span></div>
         </div>
         
         </div> <!-- Fecha col11 fisicas -->
         
       <div class="col13">
         <div class="subtitleE">Previsto x Realizado
       </div></div><!-- Sub previsto x realizado -->
       
        <div class="col11"><!-- previsto A -->
         <div class="col12">
           <div class="subtitleF">Previsto A</div>
           <div class="subtitleG"><?php echo $historico['a_previsto']; ?> %</div>
         </div>
         
          <div class="col12">
           <div class="subtitleF">Realizado B</div>
           <div class="subtitleG"><?php echo $historico['b_realizado']; ?> %</div>
         </div>
         
          <div class="col12">
           <div class="subtitleF">Diferença (B-A)</div>
           <div class="subtitleG"><?php $diferenca = $historico['b_realizado'] -
		    $historico['a_previsto']; echo $diferenca; ?> %</div>
         </div>
       
         </div><!-- col 11 previsto realizado -->
         
       
       </div> <!-- fecha col08 -->
       
    </div> <!-- fecha col2BB Box geral do grafico e metas fisicas-->
    
    <div class="col07CC" style="margin-left:10px;"><div class="subtitleE">
        Acompanhamento Financeiro
      </div>
      <div class="col07DD" style="margin-top:-23px;">
      <div class="subtitleE" style="text-align:right;">
      <?php echo "<a  href=".BASE_URL."/elFinder/elfinder.php?idobra=". $historico['imp_obra']."&&idcli=". $historico['idcli']."&&id_hist=".$historico['id_hist']."&&nivel=".$_SESSION['ccNivel'].">Atas, relatórios e projetos</a>"; ?></div>
      </div>
      </div><!-- Titulo Físico mensal -->
    
    <?php if($historico['financeiro'] != 1){
		 echo "<div class='col07' style='margin-left:10px;'>O acompanhamento financeiro não foi contratado para esta obra!</div>";}else{ ?>
         
    <div class="col08B" style="margin-left:10px;"> <!-- Container do segundo bloco de dados FINANCEIRO -->
    
      <div class="col14" >
      <div class="subtitleE">Previsto x Realizado
      </div></div><!-- Sub titulo Metas -->
       
        <div class="col15"><div class="subtitleF">Custo Previsto (C)</div>
        <div class="subtitleG"><?php $c_previsto = number_format($historico['c_previsto'], 2, ',', '.'); 
	    echo "R$ ".$c_previsto; ?></div>
        </div><!-- Bloco custo previsto -->
        
        <div class="col15"><div class="subtitleF">Custo Realizado (D)</div>
        <div class="subtitleG"><?php $c_realizado = number_format($historico['c_realizado'], 2, ',', '.'); 
	    echo "R$ ".$c_realizado; ?></div>
        </div><!-- Bloco custo previsto -->
        
        <div class="col15"><div class="subtitleF">Resultado Econômico (D-E)</div>
        <div class="subtitleG"><?php echo "R$ ".$resultado. " 
		<span class='subtitleGB'>( ".$p_resultado."% )</span>"; ?></div>
        </div><!-- Bloco custo previsto -->
     
        
       <div class="col14" style="margin-top:8px;">
         <div class="subtitleE">Resultado Projetado
        </div></div><!-- Sub titulo Metas -->
       
         <div class="col16"><div class="subtitleF">Custo Final Projetado</div>
         <div class="subtitleG"><?php echo "R$ ".$c_final ?><span class="subtitleGB">
		 <?php echo " ( ".$projetado." %)"; ?></span></div>
         </div><!-- Bloco Custo Final Projetado -->
           
         <div class="col16B"><div class="subtitleF">Resultado Econômico projetado</div>
         <div class="subtitleG"><?php echo "R$ ".$rprojetado;?><span class="subtitleGB">
		 <?php echo " (".$p_projetado." %)</span>"; ?>
         </div></div><!-- Bloco Resultado Econômico projetado -->
      
    </div><!-- fecha col08B -->
  
<?php } ?><!-- fecha financeiro -->


 
<!-- ANALISE -->    

<?php if($historico['analise'] !=""){
	 echo "<div id='analise'>";
	 echo "<div style='overflow:auto;height:90px; width:700px; margin-left:60px;'>";
	 echo $historico['analise']; echo "</div></div>";  } ?>

  
    </div> <!-- fecha dir -->

<div class="clear"></div>

<?php if($_SESSION['ccNivel'] > 3){ ?>
  <div id="esq2">
    <div id="boxup">
    <br>
    <?php if($_SESSION['ccNivel'] > 5){
   echo "<div class='Sub01' style='color:#fff; align=center;'>Upload imagens</div>
      <span class='txevento' style='color:#fff; align=center; '>
	  As imagens devem ser jpg! O grafico deve ser nomeado: graf e a miniatura graf_mini. As outras imagens nomeadas de 1 a 9, e as miniaturas 1b a 9b</span><br><br>";
	  ?>
     
     <div class="upload">
     <form action="<?php echo BASE_URL ?>/views/upload.php" method="post" enctype="multipart/form-data">
     <!-- Cria um label para o input file -->
     <label for="selecao"><span class="Sub01" style="color:rgb(255,255,255);">Selecionar uma imagem &#187;</span></label>
     <input type="file" name="file" id="selecao" /> 
        
        <div id="espaco"></div>
    <input type="hidden" name="path" 
            value="<?php echo $historico['idcli']."/".$historico['imp_obra']; ?>"/>
            <input type="hidden" name="nome" value="<?php echo $historico['id_hist']; ?>"/>
            
        	<input  type="text" name="id" class="uploadTerm" required placeholder='1, 2, 3... ou graf, 1b ou graf_mini'/>
   
        <input type="hidden" name="local" value="top"/>
        <input type="submit" name="gravar" class="uploadButton" value="" />
      </form>
      
	  </div><!-- fecha upload -->
      
	<?php  } ?>
    <div class="clear">&nbsp;</div>
    
    <?php if($_SESSION['ccNivel'] > 6){
		echo "<span class='legenda2'>imp_obra: ".$historico['imp_obra']."&nbsp; idcli: ".
		$historico['idcli']."&nbsp; id_hist: ".$historico['id_hist']."</span>";
	} ?>
	
    </div> <!-- fecha boxup -->
    
    

</div> <!-- fecha esq2 -->

	
  <div id="dir2">

   <?php
    if(($_SESSION['ccNivel'] > 3) && !empty($mensagem)){ ?>
  <div class="centra"><span class="Sub01">Comunicação interna na obra: <?php echo $historico['obra']; ?></span></div>
  
  
   <?php echo "<a  href=".BASE_URL."/mensagem/add?obra=". $historico['imp_obra']." title='Novo Comunicado' ><img class='icon' style='margin-left:20px; margin-top:10px;' src='".BASE_URL."/assets/images/estrutura/news.png' border='0' ' /></a>";  ?>
   
   <div id="comunica">
   
   <?php 
   foreach ($mensagem as $mensagem) {
   echo "<span class='amsg'><a href=".BASE_URL."/mensagem/msg?id=".$mensagem['id'].">".
   $mensagem['titulo'] ."</a></span>" .
   " &nbsp; <span class='Sub01' style='font-weight:300;'><a href=".BASE_URL."/mensagem/add_comenta?id_imp=".
   $mensagem['id']. ">Comentar</a></span>" .
    " - " .date("d/m/Y", strtotime($mensagem['data'])). "<br>";
}
   ?>
   </div>
   <?php } ?> <!-- Fecha comunicação interna -->
   
  </div> <!-- fecha esq2 -->
  
<?php } ?>
</div> <!-- fecha conteudo -->
<div class="clear"></div>