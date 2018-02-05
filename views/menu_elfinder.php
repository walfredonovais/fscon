
<?php echo "<link href='../assets/css/menu2.css' rel='stylesheet' />"; ?>

<nav id='cssmenu'>
<ul><!-- ABRE UL --------------- -->
	<!-- Home --------------- -->
<li><?php
	$id_hist=$_POST['hist'];
	 echo "<a href='../elfinder/index/?id_hist=".$id_hist."'><span>Home</span></a>"; 
	 ?>
</li>
<!-- Logout --------------- -->
<li><a href="../login/logout">  ENCERRAR</a></li>
    
</ul><!-- FECHA UL --------------- -->

</nav>
