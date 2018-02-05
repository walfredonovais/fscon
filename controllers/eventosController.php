<?php
class eventosController extends controller {
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
	
  public function lista() { // Aqui define o link: /eventos/lista
    $eventos = new Eventos(); // Aqui carrega o model
    $dados['eventos'] = $eventos->getTodos();
    $this->loadTemplate('eventos', $dados);
  }
  
  public function eventos() { // Aqui define o link: /eventos/lista
    $eventos = new Eventos(); // Aqui carrega o model
    $dados['eventos'] = $eventos->getEventos();
    $this->loadTemplate('eventos', $dados);
  }
  
   public function busca() { // Aqui define o link: /eventos/lista	
    $eventos = new Eventos(); // Aqui carrega o model
    $dados['eventos'] = $eventos->getBusca();
	if(isset($_POST['palavra']) && !empty($_POST['palavra'])) {	
    $this->loadTemplate('eventos', $dados);
	}
  }
	
  public function evento() { // Aqui define o link: /eventos/evento
    $eventos = new Eventos(); // Aqui carrega o model
    $dados['eventos'] = $eventos->getEvento();	
    if(isset($_GET['id']) && !empty($_GET['id'])) {	
      $this->loadTemplate('evento', $dados);
    }else { $this->loadTemplate('home', $dados); }
  }
	
// - ADD obras -----------------------------------------------------------------	
  public function add() {
    $dados = array();
    $eventos = new Eventos(); // Aqui carrega o model
    if(isset($_POST['title']) && !empty($_POST['title'])) {	
	
      $data = explode('/', addslashes($_POST['start']));
      $adata = $data[2].'-'.$data[1].'-'.$data[0];
	  
	  
      $title = addslashes($_POST['title']);
      $start = $adata;
      $autor = addslashes($_POST['autor']);
      $nota = addslashes($_POST['nota']);

      $eventos->add($title, $start, $autor, $nota);
      header("Location: ".BASE_URL."/home"); // Pagina de saida
      exit;
    }else{
      $this->loadTemplate('evento_add', $dados);
    }
  }
	
// - EDITAR Evento -----------------------------------------------------------------	
  public function edit() {
    $dados = array();
    $eventos = new Eventos(); // Aqui carrega o model
    $dados['eventos'] = $eventos->getEvento();
	
			
    if(isset($_POST['id']) && !empty($_POST['id'])) {	
	 $data = explode('/', addslashes($_POST['start']));
      $adata = $data[2].'-'.$data[1].'-'.$data[0];
	  
      $id = addslashes($_POST['id']);
      $title = addslashes($_POST['title']);
      $start = $adata;
      $autor = addslashes($_POST['autor']);
      $nota = addslashes($_POST['nota']);
	  $altera = addslashes($_POST['altera']);
			
      $eventos->editEventos($id, $title, $start, $autor, $nota, $altera);
	  header("Location: ".BASE_URL."/eventos/evento?id=$id"); // Pagina de saida
      exit;
    }else{
      if(isset($_GET['id']) && !empty($_GET['id'])) {	
        $this->loadTemplate('evento_edit', $dados);
      }
    }
  }
	
}
?>