<?php
class notificaController  extends controller {
  public function __construct() {
    parent::__construct();
		
     $u = new Users();
      if($u->isLogged() == false) {
        header("Location:".BASE_URL."/login");
      exit;
      }
  }
  
   public function notifica() { // Aqui define o link:
    $notifica = new Notifica(); // Aqui carrega o model
    
    if(isset($_GET['usuario']) && !empty($_GET['usuario'])) {
		$dados['notifica'] = $notifica->getNotifica();		
      $this->loadTemplate('notifica', $dados);
    }else { 
	 $dados['notifica'] = $notifica->getNotificacao();	
	$this->loadTemplate('notifica', $dados); }
  }
  
  public function notiUser() { // Aqui define o link: 
    $notifica = new Notifica(); // Aqui carrega o model
    
    if(isset($_GET['usuario']) && !empty($_GET['usuario'])) {
		$dados['notifica'] = $notifica->getNoti();		
      $this->loadTemplate('notifica', $dados);
	}else{
		if(isset($_GET['id']) && !empty($_GET['id'])) {
		$dados['notifica'] = $notifica->getNotifica();		
      $this->loadTemplate('notifi_one', $dados);
		}
	}
  }
  
  public function notificacoes() { // Aqui define o link:
    $notifica = new Notifica(); // Aqui carrega o model
    
	$dados['notifica'] = $notifica->getNotificacoes();		
      $this->loadTemplate('notifica_list', $dados);

  }
  
 
// - ADD obras -----------------------------------------------------------------	
  public function add() {
    $dados = array();
	
	$u = new Users();
	$dados['usuarios'] = $u->getUsuariosEqp();
	
    $notifica = new Notifica(); // Aqui carrega o model
    if(isset($_POST['usuario']) && !empty($_POST['usuario'])) {	
	$adata=date('Y-m-d',strtotime($_POST['data']));
    $usuario = addslashes($_POST['usuario']);
    $data = $adata;
    $titulo = addslashes($_POST['titulo']);
	$alerta = addslashes($_POST['alerta']);
	$ativo = addslashes($_POST['ativo']);
	$autor = addslashes($_POST['autor']);
      $notifica->addNotifica($usuario, $titulo, $alerta, $data, $ativo, $autor);
      header("Location: ".BASE_URL."/home"); // Pagina de saida
      exit;
    }else{
      $this->loadTemplate('notifica_add', $dados);
    }
  }
	
// - EDITAR Evento -----------------------------------------------------------------	
  public function edit() {
    $dados = array();
    $notifica = new Notifica(); // Aqui carrega o model
	
    $dados['notifica'] = $notifica->getNotifica();
    if(isset($_POST['id']) && !empty($_POST['id'])) {	
	  $adata=date('Y-m-d',strtotime($_POST['data']));
      $id = addslashes($_POST['id']);
      $usuario = addslashes($_POST['usuario']);
      $data = $adata;
	  $titulo = addslashes($_POST['titulo']);
      $alerta = addslashes($_POST['alerta']);
	  $ativo = addslashes($_POST['ativo']);
	  $autor = addslashes($_POST['autor']);
 	
      $notifica->editNotifica($id, $usuario, $titulo, $alerta, $data, $ativo, $autor);
	  header("Location: ".BASE_URL."/notifica/notiUser?id=$id"); // Pagina de saida
      exit;
    }else{
       $this->loadTemplate('notifica_edit', $dados);
       
      //}
    }
  }
}
?>