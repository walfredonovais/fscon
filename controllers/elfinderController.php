<?php
class elfinderController extends controller {
  //VERIFICA LOGADO
  public function __construct() {
  parent::__construct();
  // Verifica se está logado, se não vai para login 
    $u = new Users();
    if($u->isLogged() == false) {
      header("Location:".BASE_URL."/login");
      exit;
    }
  }
	
  public function index() {
  if($_SESSION['ccNivel'] < 4){	
    header("Location: ".BASE_URL."/relatorio/obra_rel");
    exit;
    }else{
      header("Location: ".BASE_URL."/home"); }
      exit;
  }
	
  public function elfinder() { 
    $this->loadTemplate('elfinder');
    exit;
  }
  
}
?>