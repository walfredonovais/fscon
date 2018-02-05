<?php require("menu.php"); ?>


<!-- IDENTIFICAÇAO -->
<?php foreach($equipamento as $equipamento):

	endforeach; ?>
    
    <div id="container">
  <div id="esq_form">
&nbsp;
  </div><!-- Fecha esq3 -->
  <div id="dir_form">
  <div id="contact3">
  <!--
  <div id="foto">
   &nbsp;
  </div> <!-- fecha foto -->

  
  <div id="contactBox04CT">
  <div class="titulo" style="margin-left:155px;"><?php echo mb_strtoupper($equipamento['patrimonio']); ?></div>
 <div class="subtitulo" style="margin-left:155px;"><?php echo $equipamento['nome']. " id : ".$equipamento['id_eqp']; ?></div>
 <div class="clear">&nbsp;</div>
   
   
 <div id="contactBox02CT">Tipo:</div><div id="contactBox03CT">
 <?php echo $equipamento['tipo']; ?>
 </div>
 
  <div id="contactBox02CT">Marca:</div><div id="contactBox03CT">
 <?php echo $equipamento['marca']; ?>
 </div>
 
 <div id="contactBox02CT">Modêlo:</div><div id="contactBox03CT">
 <?php echo $equipamento['modelo']; ?>
 </div>
 
 <div id="contactBox02CT">Serial:</div><div id="contactBox03CT">
 <?php echo $equipamento['serial']; ?>
 </div>
 
 <div id="contactBox02CT">Nota Fiscal:</div><div id="contactBox03CT">
 <?php echo $equipamento['nf']; ?>
 </div>
 
 <div id="contactBox02CT">Nome SMB:</div><div id="contactBox03CT">
 <?php echo $equipamento['smb']; ?>
 </div>
 
 <div id="contactBox02CT">Ponto de rede:</div><div id="contactBox03CT">
 <?php echo $equipamento['pt_rede']; ?>
 </div>
 
 <div id="contactBox02CT">Placa Mãe:</div><div id="contactBox03CT">
 <?php echo $equipamento['motherboard']; ?>
 </div>
 <div id="contactBox02CT">Processador:</div><div id="contactBox03CT">
 <?php echo $equipamento['processador']; ?>
 </div>
 <div id="contactBox02CT">Memória instalad:</div><div id="contactBox03CT">
 <?php echo $equipamento['memoria']; ?>
 </div>
 <div id="contactBox02CT">Sistema operacional:</div><div id="contactBox03CT">
 <?php echo $equipamento['sistema']; ?>
 </div>
    <div class="clear"></div>
    <?php
    if(isset($equipamento['data_baixa']) && !empty($equipamento['data_baixa'])) {
    echo "<div id='contactBox02CT'>Data da baixa:</div>
    <div id='contactBox03CT'>".$equipamento['data_baixa']."</div>"; }
    ?>
    <div class="clear"></div>
    <?php
    if(isset($equipamento['obs_baixa']) && !empty($equipamento['obs_baixa'])) {
    echo "<div id='contactBox02CT'>Observações da baixa:</div><div id='contactBox03CT'>".
    $equipamento['obs_baixa'].
    "</div>"; } 
    ?>
    <div class="clear"></div>
    <?php
    if(isset($equipamento['suporte']) && !empty($equipamento['suporte'])) {
    echo "<div id='contactBox02CT'>Manutenção:</div><div id='contactBox03CT'>".
    $equipamento['suporte'].
    "</div>"; } 
    ?>
    <div class="clear"></div>
    
    
    <?php  if($_SESSION['ccNivel'] > 3){ ?>
 <div id="contactBox02CT">&nbsp;</div><div id="contactBox03CT2">
 
 <div class="clear"></div>
      <form <?php echo "action='".BASE_URL."/equipa/editar_eqp?id_eqp=". $equipamento['id_eqp']."'"; ?> method="post" >
      <input type="submit" name="submit"  value="EDITAR" id="css_btn_class" />
      </form>
  </div>
  <?php } ?>
	 
    
  

</div> <!-- fecha contactBox01 -->

  <div class="clear"></div>
  </div> <!-- fecha contact3 -->
  <div class="espaco">&nbsp;</div>
  

 </div><!-- Fecha dir_form -->

  <div class="clear">&nbsp;</div>
</div> <!-- Fecha container -->