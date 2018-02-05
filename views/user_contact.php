<?php
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />";
  require("menu.php");

  foreach($usuarios as $usuarios):
  endforeach;
?>

<div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  <div id="dir_form">
  <div id="contact">
  <div id="foto">
   <?php 
   if(isset($usuarios['imp_cliente']) && ($usuarios['imp_cliente'] != "")){
	   $img="mkC".$usuarios['imp_cliente'].".png";
	   $path="/assets/images/logo_cliente/";
	   $image = BASE_URL.$path.$img;
	    if (@GetImageSize($image)) { echo "<img src='". $image."' width='220' height='80' alt=''/>"; }	
   }else {
   $img="id_".$usuarios['id'].".jpg";
   $path="/assets/clientes/users/";
   $image = BASE_URL.$path.$img;
   if (@GetImageSize($image)) { echo "<img src='". $image."' width='190' height='220' alt=''/>"; }else {
	   
	  //if($usuarios['nivel'] > 3){
	  // $img="fs_logo.png";
	 //  $path="/assets/clientes/users/";
       //$image = BASE_URL.$path.$img; echo "<img src='". $image."' width='220'  alt=''/>"; } else{
		$img="u_generico.png";
	   $path="/assets/clientes/users/";
       $image = BASE_URL.$path.$img; echo "<img src='". $image."' width='220'  alt=''/>";
		  // }
	   } 
	   }
   
   ?>

  </div> <!-- fecha foto -->
  <div id="contactBox01">
 <div class="titulo"><?php echo $usuarios['nome']; ?></div>
 <div class="subtitulo"><?php echo $usuarios['usuario']; ?></div>
 <div class="espaco"></div>
 
 <div id="contactBox02">e-mail:</div><div id="contactBox03">
 <?php echo "<span class='subcontact'><a href='mailto:".$usuarios['email']."'>".$usuarios['email']."</a></span>"; ?>
 </div>
 
 <div id="contactBox02">Celular:</div><div id="contactBox03">
 <?php echo $usuarios['celular']; ?>
 </div>
 
 <div id="contactBox02">Celular pessoal:</div><div id="contactBox03">
 <?php echo $usuarios['celular2']; ?>
 </div>
 
 <div id="contactBox02">Local de trabalho:</div><div id="contactBox03">
 <?php $c = $usuarios['local']; 
 switch($c) { case '' : echo "*"; break; 
 case 'BHZ' : echo "Belo Horizonte, MG"; break; 
 case 'BAURU' : echo "Bauru, SP"; break; 
 default: echo $usuarios['local']; }
 ?>
 </div>
 
 <div id="contactBox02">Ramal:</div><div id="contactBox03">
 <?php echo $usuarios['ramal']; ?>
 </div>
 
  <div id="contactBox02">Data de Nascimento:</div><div id="contactBox03">
  <?php
  if(isset($usuarios['nascimento']) && ($usuarios['nascimento'] != "0000-00-00")){
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    echo ucfirst( utf8_encode( strftime("%d de %B de %Y", strtotime($usuarios['nascimento']) ) ) ); }?>
  </div>
 <div class="clear"></div>
  <div id="contactBox02">FS / Empresa:</div><div id="contactBox03">
  <?php 
  if(isset($usuarios['imp_cliente']) && ($usuarios['imp_cliente'] != "")){ echo $usuarios['rsocial']; }else {
  if(isset($usuarios['fscon']) && ($usuarios['fscon'] > 0)){ 
    $b = $usuarios['fscon']; switch($b) { 
    case 1 : echo "Equipe FS"; break; 
    case 2 : echo "Equipe de Engenharia FS"; }
  } } ?>
  </div>
 
 <div id="contactBox02">Status:</div><div id="contactBox03">
 <?php $b = $usuarios['ativo']; switch($b) { case 0 : echo "Não ativo"; break; 
 case 1 : echo "Ativo"; break; default: echo $usuarios['ativo']; } ?>
 </div>
 
 <div id="contactBox02">Emergências:</div><div id="contactBox03">
<?php if(isset($usuarios['imp_cliente']) && ($usuarios['imp_cliente'] == "")){
 echo $usuarios['emergencia']; }?>
 </div>
 

 <?php  if($_SESSION['ccNivel'] > 3){ ?>
 <div id="contactBox02">&nbsp;</div><div id="contactBox03">
 

      <form <?php echo "action='".BASE_URL."/users/lista2?id=". $usuarios['id']."'"; ?> method="post" >
      <input type="submit" name="submit"  value="Cadastro" id="css_btn_class" />
      </form>
  </div>
  <?php } ?>
 <div class="clear">&nbsp;</div>
 
 
 </div><!-- Fecha contactBox01 -->
 
 </div><!-- Fecha form -->
</div>
  <div class="clear">&nbsp;</div>
</div> <!-- Fecha container -->