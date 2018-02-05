<?php
  
  $id = $_GET['idobra'];

  echo "<br/>O id da obra: ".$id."<br/>";

  

  foreach($obras as $obras):
  endforeach;


?>

    <form  method="POST">

<!-- Campo readonly="readonly" só leitura -->
<label>ID Identificador DB </label>
  <input type="text" name="idobra" readonly="readonly" value="<?php echo $obras['idobra']; ?>"/>
  
  <label>Obra</label>
   <input type="text" name="obra"  value="<?php echo $obras['obra']; ?>"/>
  

<label>Cidade</label>
<input type="text" name="cid_obra"  value="<?php echo $obras['cid_obra']; ?>"/>


<label>Escopo</label>
<textarea name="escopo" ><?php echo $obras['escopo']; ?></textarea>


<label>Descrição</label>
<textarea name="descricao" ><?php echo $obras['descricao']; ?></textarea>



<label>Status Ativo / Não ativo</label>
<select name="ativo"><option value="<?php echo $obras['ativo']; ?> ">

<?php if ($obras['ativo'] == 1) { echo "Contrato em execução"; } else { echo "Não Ativo"; } ?></option>
<option value="1">Ativo</option><option value="0">Não Ativo</option> </select>




<label>Observações</label>
<textarea name="observa" ><?php echo $obras['observa']; ?></textarea>
         
	<button type="submit" value="Send" style="margin-top:10px; font-size:0.9em; width:120px;">ENVIAR</button>

</form>