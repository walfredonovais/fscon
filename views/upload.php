
  <?php

  // image
 //if(isset($_POST['gravar'])){   
  $img  = $_FILES['file'];
  $name =$img['name'];
  $tmp  =$img['tmp_name'];
  $ext  =end(explode('.',$name));
  if($ext == 'JPG'){
	  $ext = 'jpg';
	  }
 if($ext != 'jpg'){
	  echo '<script language="javascript">alert("Ops! O sistema só aceita arquivos jpg")</script>';
	  $var = "<script>javascript:history.back(-1)</script>";
		echo $var;
  exit;
	 }
	
	$local = $_POST['path']; // local /52/75
	$id=$_POST['nome']."_".$_POST['id']; //nome enviado ok - nome digitado pelo user
	$pasta = '../assets/clientes/'.$local.'/images/'; // Diretório das imagens
  $permitido=array('jpg', 'jpeg', 'png');
 // $name = uniqid().'.'.$ext; $uid = uniqid();
  $name = $id.'.'.$ext; 
  // pega o ultimo elemento da string id
  $rest = substr($id, -1);
  //$uid = uniqid();


  $upload = move_uploaded_file($tmp, $pasta.'/'.$name); //Faz o upload da imagem para o servidor
  if($upload){
  function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 60){
  $imgsize = getimagesize($source_file);
  $width = $imgsize[0];
  $height = $imgsize[1];
  $mime = $imgsize['mime'];
  
  $image_create = "imagecreatefromjpeg";
  $image = "imagejpeg";
  $quality = 60;
  
  $dst_img = imagecreatetruecolor($max_width, $max_height);
  $src_img = $image_create($source_file);
  $width_new = $height * $max_width / $max_height;
  $height_new = $width * $max_height / $max_width;
  	if($width_new > $width){
 	 $h_point = (($height - $height_new) / 2);
  	imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
  	}else{
 	 $w_point = (($width - $width_new) / 2);
  	imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
 	}
 $image($dst_img, $dst_dir, $quality);
if($dst_img)imagedestroy($dst_img);
 if($src_img)imagedestroy($src_img);
 	 
  }
  
  $var1="<script language='javascript'>alert('Ops! upload confirmado')</script>";
	$var2 = "<script>javascript:history.back(-1)</script>";
  //Tamanho da Imagem final
  if($_POST['id'] == 'graf') {
  resize_crop_image(1148, 800, $pasta.'/'.$name, $pasta.'/'.$name);
  echo $var1; echo $var2; exit;
  }
  if($_POST['id'] == 'graf_mini') {
  resize_crop_image(250, 250, $pasta.'/'.$name, $pasta.'/'.$name);
  echo $var1; echo $var2; exit;
  }
  if($rest == b){
	  resize_crop_image(90, 90, $pasta.'/'.$name, $pasta.'/'.$name); echo $var1; echo $var2; exit;
	  }else { resize_crop_image(720, 450, $pasta.'/'.$name, $pasta.'/'.$name); echo $var1; echo $var2; exit; }
  }

  ?>