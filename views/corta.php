

  <?php
  if(isset($_POST['gravar'])){ 
  $img  = $_FILES['file'];
  $name =$img['name'];
  $tmp  =$img['tmp_name'];
  $ext  =end(explode('.',$name));


  $local = $_POST['local']; // local
 
  $id=$_POST['id']; //nome enviado
    if($local == "clientes/users"){
      $pasta = '../assets/'.$local.'/'; // Diretório das imagens
    }else{
     $pasta = '../assets/images/'.$local.'/'; // Diretório das imagens
    }
  
  //$pasta ='NOMEDAPASTA/'; //Pasta onde a imagem será salva

  $permiti  =array('jpg', 'jpeg', 'png');
 // $name = uniqid().'.'.$ext; $uid = uniqid();
  $name = $id.'.'.$ext; $uid = uniqid();
  
  if($local == "clientes/users"){
	  $name = 'id_'.$id.'.'.$ext; $uid = uniqid();
    }else{
     $name = $id.'.'.$ext; $uid = uniqid();
    }
  

  $upload   = move_uploaded_file($tmp, $pasta.'/'.$name);}; //Faz o upload da imagem para o servidor

  if($upload){
  function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 60){
  $imgsize = getimagesize($source_file);
  $width = $imgsize[0];
  $height = $imgsize[1];
  $mime = $imgsize['mime'];
  //resize and crop image by center
  switch($mime){
  case 'image/gif':
  $image_create = "imagecreatefromgif";
  $image = "imagegif";
  break;
  //resize and crop image by center
  case 'image/png':
  $image_create = "imagecreatefrompng";
  $image = "imagepng";
  $quality = 6;
  break;
  //resize and crop image by center
  case 'image/jpeg':
  $image_create = "imagecreatefromjpeg";
  $image = "imagejpeg";
  $quality = 60;
  break;
  default:
  return false;
  break;
  }
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
  //Tamanho da Imagem final
  
   if($local == "clientes/users"){
	 resize_crop_image(190, 220, $pasta.'/'.$name, $pasta.'/'.$name);
    }else{
      resize_crop_image(480, 270, $pasta.'/'.$name, $pasta.'/'.$name);
    }
  
  
  }
  
  echo "<script language='javascript'>alert('Ops! upload confirmado')</script>";
		$var = "<script>javascript:history.back(-1)</script>";
        
		echo $var;
exit;


  ?>