<?php
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />";
  require("menu.php");

  foreach($cliente as $cliente):
  endforeach;
 
?>

<div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  <div id="dir_form">
  <div id="contact3">
  
  <div id="foto">
    <?php 
      if($cliente['logo'] != 0){
        $img="mkC".$cliente['idcli'].".png";
        $path="/assets/images/logo_cliente/";
        $image = BASE_URL.$path.$img;
          if (@GetImageSize($image)) { echo "<img src='". $image."' width='220' height='80' alt=''/>"; }	
      }else {
        $img="cli.png";
        $path="/assets/clientes/users/";
        $image = BASE_URL.$path.$img;
        echo "<img src='". $image."' width='190' height='220' alt=''/>";
      } 
   ?>
  </div> <!-- fecha foto -->
  
  <div id="contactBox04">
    <div class="titulo"><?php echo mb_strtoupper($cliente['rsocial']); ?></div>
 <?php echo "<span class='subtitulo'>". $cliente['idcli'] ." id</span>"; ?>
 <div class="espaco"></div>
 
 <?php if($cliente['cnpj'] != ""){
  echo "<div id='contactBox02'>CNPJ:</div><div id='contactBox03'>"
  .$cliente['cnpj']."</div>"; } ?>
 
  <?php if($cliente['contato'] != ""){
  echo "<div id='contactBox02'>Contato:</div><div id='contactBox03'>"
  .$cliente['contato']."</div>"; } ?>
 
  <?php if($cliente['telefone'] != ""){
  echo "<div id='contactBox02'>Celular/Telefone:</div><div id='contactBox03'>"
  .$cliente['telefone']."</div>"; } ?>
 
 <div id="contactBox02">e-mail:</div><div id="contactBox03">
 <?php echo "<span class='subcontact'><a href='mailto:".$cliente['email']."'>".$cliente['email']."</a></span>"; ?>
 </div>
 
 <?php if($cliente['site'] != ""){
  echo "<div id='contactBox02'>Site:</div><div id='contactBox03'>"
  .$cliente['site']."</div>"; } ?>
  
 <?php if($cliente['contato2'] != ""){
  echo "<div id='contactBox02'>Contato:</div><div id='contactBox03'>"
  .$cliente['contato2']."</div>"; } ?>
 
 <?php if($cliente['celular'] != ""){
  echo "<div id='contactBox02'>Celular:</div><div id='contactBox03'>"
  .$cliente['celular']."</div>"; } ?>
  
   <div id="contactBox02">e-mail:</div><div id="contactBox03">
 <?php echo "<span class='subcontact'><a href='mailto:".$cliente['email2']."'>".$cliente['email2']."</a></span>"; ?>
 </div>
  
  <?php if($cliente['fax'] != ""){
  echo "<div id='contactBox02'>Fax:</div><div id='contactBox03'>"
  .$cliente['fax']."</div>"; } ?>
 
 <?php if(($cliente['insc_est'] != "") OR ($cliente['insc_munic'] != "")){
  echo "<div id='contactBox02'>Inscricões (Est/Mun):</div><div id='contactBox03'>"
  .$cliente['insc_est']. " / " .$cliente['insc_munic']."</div>"; } ?>
  
  <?php if($cliente['endereco'] != ""){
  echo "<div id='contactBox02'>Endereço:</div><div id='contactBox03'>"
  .$cliente['endereco']."</div>"; } ?>
  
  <?php if($cliente['complemento'] != ""){
  echo "<div id='contactBox02'>Complemento:</div><div id='contactBox03'>"
  .$cliente['complemento']."</div>"; } ?>
  
  <?php if($cliente['bairro'] != ""){
  echo "<div id='contactBox02'>Bairro:</div><div id='contactBox03'>"
  .$cliente['bairro']."</div>"; } ?>
  
  <?php if($cliente['cep'] != ""){
  echo "<div id='contactBox02'>Cep:</div><div id='contactBox03'>"
  .$cliente['cep']."</div>"; } ?>
  
  <?php if($cliente['cidade'] != ""){
  echo "<div id='contactBox02'>Cidade:</div><div id='contactBox03'>"
  .$cliente['cidade']."</div>"; } ?>
  
  <?php if($cliente['estado'] != ""){
  echo "<div id='contactBox02'>UF:</div><div id='contactBox03'>"
  .$cliente['estado']."</div>"; } ?>
    
    
  
  <?php  if($_SESSION['ccNivel'] > 5){ ?>
 <div id="contactBox02">&nbsp;</div><div id="contactBox03">
 
 <div class="clear"></div>
      <form <?php echo "action='".BASE_URL."/clientes/edit?idcli=". $cliente['idcli']."'"; ?> method="post" >
      <input type="submit" name="submit"  value="EDITAR" id="css_btn_class" />
      </form>
  </div>
  <div class="clear">&nbsp;</div>
  <?php } ?>

<div class="clear">&nbsp;</div>
    </div> <!-- fecha contactBox01 -->
  <div class="clear"></div>
  </div> <!-- fecha contact3 -->
  <div class="espaco"></div>
  
  
  
 
 </div><!-- Fecha dir_form -->

  <div class="clear">&nbsp;</div>
</div> <!-- Fecha container -->