<?php
echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/style.css' media='screen' />
<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/form.css' media='screen' />";
  require("menu.php");

  foreach($agenda as $agenda):
  endforeach;
?>
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
  <div class="titulo" style="margin-left:155px;"><?php echo mb_strtoupper($agenda['empresa']); ?></div>
  <div class="subtitulo" style="margin-left:155px;"><?php echo $agenda['nome']; ?></div>
  <div class="clear">&nbsp;</div>
  
 <div id="contactBox02CT">e-mail:</div><div id="contactBox03CT">
 <?php echo "<span class='subcontact'><a href='mailto:".$agenda['email']."'>".$agenda['email']."</a></span>"; ?>
 </div>
 <div class="espaco2">&nbsp;<br><br></div>
 <div id="contactBox02CT">Categoria:</div><div id="contactBox03CT">
 <?php echo $agenda['categoria']; ?>
 </div>
 
 <div id="contactBox02CT">Site internet:</div><div id="contactBox03CT">
 <?php echo $agenda['site']; ?>
 </div>
 
 <div id="contactBox02CT">Telefone:</div><div id="contactBox03CT">
 <?php echo $agenda['telefone']; ?>
 </div>
 
 <div id="contactBox02CT">Ramal:</div><div id="contactBox03CT">
 <?php echo $agenda['ramal']; ?>
 </div>
 
 <div id="contactBox02CT">Celular:</div><div id="contactBox03CT">
 <?php echo $agenda['celular']; ?>
 </div>
 
 <div id="contactBox02CT">FAX:</div><div id="contactBox03CT">
 <?php echo $agenda['fax']; ?>
 </div>
 
 <div id="contactBox02CT">Endereço:</div><div id="contactBox03CT">
 <?php echo $agenda['endereco']; ?>
 </div>
 
 <div id="contactBox02CT">CEP:</div><div id="contactBox03CT">
 <?php echo $agenda['cep']; ?>
 </div>
 
 <div id="contactBox02CT">Cidade:</div><div id="contactBox03CT">
 <?php echo $agenda['cidade']; ?>
 </div>
 
 <div id="contactBox02CT">UF:</div><div id="contactBox03CT">
 <?php echo $agenda['estado']; ?>
 </div>
  <div class="clear"></div>
 <div id="contactBox02CT">Anotações:</div><div id="contactBox03CT2">
 <textarea style="overflow:auto; margin-top:2px; margin-left:2px; 
 width:515px; border: #F6F6F6 solid 1px; height:60px;"><?php echo $agenda['anotacao']; ?></textarea>
 </div>
 <div class="clear"></div>
 
 <?php  if($_SESSION['ccNivel'] > 3){ ?>
 <div id="contactBox02CT">&nbsp;</div><div id="contactBox03CT2">
 
 <div class="clear"></div>
      <form <?php echo "action='".BASE_URL."/agenda/editar?idag=". $agenda['idag']."'"; ?> method="post" >
      <input type="submit" name="submit"  value="EDITAR" id="css_btn_class" />
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