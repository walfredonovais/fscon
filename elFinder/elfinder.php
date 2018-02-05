<!DOCTYPE html>
<html>
	<head>
    
    <!-- CONFERIR O ENDEREÇO N0 connector.minimal.php -->
    
    <?php 
	if(isset($_GET['nivel']) && !empty($_GET['nivel'])) {
	$nivel=$_GET['nivel'];
	}else{ $nivel=$_POST['nivel'];}
	
	
	if(isset($_GET['idobra']) && !empty($_GET['idobra'])) {
	$id_hist=$_GET['id_hist'];
	$endpasta=$_GET['idcli']."/".$_GET['idobra']; 
	}
	
	if(isset($_POST['hist']) && !empty($_POST['hist'])) {
	$id_hist=$_POST['hist'];
	$endpasta=$_POST['idcli']."/".$_POST['obra']; 
	}
	if(isset($_POST['qualidade']) && !empty($_POST['qualidade'])) {
	$endpasta="qualidade"; 
	}
	if(isset($_POST['estrategico']) && !empty($_POST['estrategico'])) {
	$endpasta="estrategico"; 
	}
	if(isset($_POST['atestados']) && !empty($_POST['atestados'])) {
	$endpasta="atestados"; 
	}
	if(isset($_POST['tecnico']) && !empty($_POST['tecnico'])) {
	$endpasta="tecnico"; 
	}
	if(isset($_POST['folder']) && !empty($_POST['folder'])) {
	$endpasta="folder"; 
	}
	if(isset($_POST['ti']) && !empty($_POST['ti'])) {
	$endpasta="ti"; 
	}
	?>
<meta charset="utf-8">
<title>Intranet FS | Usuário: <?php 
  if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
  echo $_SESSION['ccNome']; }else{ echo "Login"; } ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2" />
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="screen" />
	
<script data-main="./main.default.js" src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.3.2/require.min.js"></script>
  <script>
    define('elFinderConfig', {
    defaultOpts : {
    url : 'php/connector.minimal.php?endpasta=<?php echo $endpasta; ?>&nivel=<?php echo $nivel; ?>'
    ,
	
	commandsOptions : {
      edit : {
        extraOptions : {
          creativeCloudApiKey : '',
          managerUrl : ''
        }
      }
    ,quicklook : {
// to enable preview with Google Docs Viewer
      googleDocsMimes : ['application/pdf', 'image/tiff', 'application/vnd.ms-office', 'application/msword', 'application/vnd.ms-word', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']
    }
	}
// bootCalback calls at before elFinder boot up 
    ,bootCallback : function(fm, extraObj) {
    /* any bind functions etc. */
      fm.bind('init', function() {
      // any your code
      });
    // for example set document.title dynamically.
    var title = document.title;
    fm.bind('open', function() {
      var path = '',
      cwd  = fm.cwd();
      if (cwd) {
        path = fm.path(cwd.hash) || null;
      }
      document.title = path? path + ':' + title : title;
      }).bind('destroy', function() {
       document.title = title;
      });
    }
    },
    managers : {
    // 'DOM Element ID': { /* elFinder options of this DOM Element */ }
    'elfinder': {}
    }
  });
</script>
        
        
</head>
<body>
<!-- Carrega o layout template -->

  <div id="global">
    <div id="header">
      <div id="logo"><a href="<?php if($_SESSION['ccNivel'] > 4){ echo BASE_URL;}else {echo "#";} ?>">
        <img src="<?php echo '../assets/images/estrutura/fslogo.png'; ?>" 
        width="80" height="90" border="0" alt="" /></a>
      </div> <!-- ....... Fim Logo -->
      
    <div id="slogan">
      <?php if(($_SESSION['ccLogo'] != '0') && ($_SESSION['ccNivel'] < '4') && (@GetImageSize($logo))) { 
        $logo = "mkC".$_SESSION['ccCliente'].".png";
          echo "<img src='../assets/images/logo_cliente/".$logo."' width='180' height='75'  alt='' />  "; 
	   }else{ echo "<img src='../assets/images/estrutura/folder.png' width='220' height='60'  alt='' />  "; 
	   }
	   ?>
       
    </div> <!-- ...................... Fim Slogan -->
  </div> <!-- ............................ Fim Header -->

    <div id="page">
      <?php require("../views/menu_elfinder.php"); ?>
      
    <!-- Element where elFinder will be created (REQUIRED) -->
    <div id="elfinder"></div>
    </div> <!-- ................... Fim page -->

    <div id="footer">Dúvidas e Sugestões:
    <a href="mailto:walfredo@fsconsultores.com.br">TI • FS Consultores</a>
    </div> <!-- ..... Fim footer -->
  </div> <!-- ............ Fim global -->

</body>
</html>
