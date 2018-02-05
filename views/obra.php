

<?php
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
  <link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />";


  require("menu.php");

$idobra = $_GET['idobra'];
if(isset($_GET['saida']) && !empty($_GET['saida'])) {
$pg_saida = $_GET['saida']; }else{ $pg_saida = ""; }

foreach($obras as $obras):

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
      if($obras['logo'] != 0){
        $img="mkC".$obras['id_imp'].".png";
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
    <div class="titulo"><?php echo mb_strtoupper($obras['obra']); ?></div>
 <?php echo "<span class='subtitulo'>". $obras['rsocial'] ."</span>"; ?>
 <div class="espaco"></div>
 
 <?php if($obras['tel_obra'] != ""){
  echo "<div id='contactBox02'>Telefone fixo:</div><div id='contactBox03'>"
  .$obras['tel_obra']."</div>"; } ?>
 
  <?php if($obras['cel_obra'] != ""){
  echo "<div id='contactBox02'>Celular:</div><div id='contactBox03'>"
  .$obras['cel_obra']."</div>"; } ?>
  
  <?php if($obras['contatos'] != ""){
  echo "<div id='contactBox05'>Contatos:</div><div id='contactBox06'>"
  .$obras['contatos']."</div>"; } ?>
 
  <?php if($obras['end_obra'] != ""){
  echo "<div id='contactBox02'>Endereço:</div><div id='contactBox03'>"
  .$obras['end_obra']."</div>"; } ?>
  
  <?php if($obras['comp_obra'] != ""){
  echo "<div id='contactBox02'>Complemento:</div><div id='contactBox03'>"
  .$obras['comp_obra']."</div>"; } ?>
  
  <?php if($obras['bairro_obra'] != ""){
  echo "<div id='contactBox02'>Bairro:</div><div id='contactBox03'>"
  .$obras['bairro_obra']."</div>"; } ?>
  
  <?php if($obras['cep_obra'] != ""){
  echo "<div id='contactBox02'>CEP:</div><div id='contactBox03'>"
  .$obras['cep_obra']."</div>"; } ?>
  
  <?php if($obras['cid_obra'] != ""){
  echo "<div id='contactBox02'>Cidade:</div><div id='contactBox03'>"
  .$obras['cid_obra']."</div>"; } ?>
  
  <?php if($obras['est_obra'] != ""){
  echo "<div id='contactBox02'>UF:</div><div id='contactBox03'>"
  .$obras['est_obra']."</div>"; } ?>

  
   <?php if($obras['escopo'] != ""){
  echo "<div id='contactBox02'>Escopo:</div><div id='contactBox03'>
  <textarea style='float:left; font-size:1em; line-height:1.4em; border:none; outline:none; resize:none;
  width:315px; margin:-4px 0 20px 0px;'>".$obras['escopo']."</textarea></div>"; } ?>
  <div class="clear">&nbsp;</div>
  <div class="espaco"></div>
  
  <?php if($obras['ini_cont'] != ""){
	  $ini_cont = implode("/",array_reverse(explode("-",$obras['ini_cont'])));
	  $term_cont = implode("/",array_reverse(explode("-",$obras['term_cont'])));
  echo "<div id='contactBox02'>Contrato:</div><div id='contactBox03'>"
  .$ini_cont." /  ".$term_cont."</div>"; } ?>
  
  <?php if($obras['ini_obra'] != ""){
	  $ini_obra = implode("/",array_reverse(explode("-",$obras['ini_obra'])));
	  $term_obra = implode("/",array_reverse(explode("-",$obras['term_obra'])));
  echo "<div id='contactBox02'>Obra (início/termino):</div><div id='contactBox03'>"
  .$ini_obra." /  ".$term_obra."</div>"; } ?>
  
 
  <?php if($obras['descricao'] != ""){
  echo "<div id='contactBox02'>Descrição:</div><div id='contactBox03'>
  <textarea style='float:left; font-size:1em; line-height:1.4em; border:none; outline:none; resize:none;
  width:315px; margin:-4px 0 20px 0px;'>".$obras['descricao']."</textarea></div>"; } ?>
  <div class="clear">&nbsp;</div>
  <div class="espaco"></div>
  
   <?php if($obras['prazo'] != ""){
  echo "<div id='contactBox02'>Prazo:</div><div id='contactBox03'>"
  .$obras['prazo']." meses.</div>"; } ?>
  
   <?php if($obras['engobra'] != ""){
  echo "<div id='contactBox02'>Engenheiro da obra:</div><div id='contactBox03'>"
  .$obras['engobra']."</div>"; } ?>

 <?php if($obras['engfs'] != ""){
  echo "<div id='contactBox02'>Engenheiro FS:</div><div id='contactBox03'>"
  .$obras['engfs']."</div>"; } ?>

<?php if($obras['data_entrega'] != ""){
	$data_entrega = implode("/",array_reverse(explode("-",$obras['data_entrega'])));
  echo "<div id='contactBox02'>Data de entrega:</div><div id='contactBox03'>"
  .$data_entrega."</div>"; } ?>

<?php if($obras['meta1'] != ""){
	$meta1 = implode("/",array_reverse(explode("-",$obras['meta1'])));
  echo "<div id='contactBox02'>Meta inicial:</div><div id='contactBox03'>"
  .$meta1."</div>"; } ?>
  
  <?php if($obras['orctotal'] != ""){
	  $orctotal=number_format($obras['orctotal'], 2, ',', '.');
  echo "<div id='contactBox02'>Orçamento total:</div><div id='contactBox03'>R$ "
  .$orctotal."</div>"; } ?>

  
  <?php if($obras['observa'] != ""){
  echo "<div id='contactBox02'>Observacoes:</div><div id='contactBox03'>
  <textarea style='float:left; font-size:1em; line-height:1.4em; border:none; outline:none; resize:none;
  width:315px; margin:-4px 0 20px 0px;'>".$obras['observa']."</textarea></div>"; } ?>
  <div class="clear">&nbsp;</div>
  
    
   
  
   <?php  if($_SESSION['ccNivel'] > 4){ ?>
 <div id="contactBox02">&nbsp;</div><div id="contactBox03">
 <div class="clear"></div>
      <form <?php echo "action='".BASE_URL."/obras/editar?idobra=". $obras['idobra']."&&saida=".$pg_saida."'"; ?> method="post" >
      <input type="submit" name="submit"  value="EDITAR" id="css_btn_class" />
      </form>
  </div>
  <?php } ?>
   <div class="clear">&nbsp;</div>
   <?php  if($_SESSION['ccNivel'] > 6){ ?>
 <div id="contactBox02">&nbsp;</div><div id="contactBox03">
 <div class="clear"></div>
      <form <?php echo "action='".BASE_URL."/obras/criarpasta?idobra=". $obras['idobra'] ."&idcliente=". $obras['id_imp'] ."'"; ?> method="post" >
      <input type="submit" name="submit"  value="Criar Pasta" id="css_btn_class" />
      </form>
  </div>
  <?php } ?>
  
   <div class="clear">&nbsp;</div>
  
    </div> <!-- fecha contactBox01 -->

  <div class="clear"></div>
  </div> <!-- fecha contact3 -->
  <div class="espaco">&nbsp;</div>
  
  
  
 
 </div><!-- Fecha dir_form -->

  <div class="clear">&nbsp;</div>
</div> <!-- Fecha container -->

