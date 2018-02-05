<?php
class noticiasController extends controller {
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
	// - Busca TAG ----------------------------------------------	
	public function busca() { // Aqui define o link: /agenda/lista
		$noticias = new Noticias(); // Aqui carrega o model
		if(isset($_POST['palavra']) && !empty($_POST['palavra'])) {	
		$local=$_POST['local'];
		if(isset($_POST['local']) && !empty($_POST['local'])) {	
		$dados['local'] = $_POST['local'];
		}
		$dados['noticias'] = $noticias->getTag();	
		$this->loadTemplate('noticias', $dados);
		}
	}
	// - Filtra pelo TAG ----------------------------------------------	
	public function tag() { // Aqui define o link: /agenda/lista
		$noticias = new Noticias(); // Aqui carrega o model
		if(isset($_GET['tag']) && !empty($_GET['tag'])) {	
		$local=$_GET['local'];
		if(isset($_GET['local']) && !empty($_GET['local'])) {	
		$dados['local'] = $_GET['local'];
		}
		$dados['noticias'] = $noticias->getTags();	
		$this->loadTemplate('noticias', $dados);
		}
	}
	
	// - Noticias -----------------------------------------------------------------
	public function noticias() {
		$dados = array();
		$noticias = new Noticias();
		if(isset($_GET['local']) && !empty($_GET['local'])) {
		$dados['noticias'] = $noticias->getNot();
		$this->loadTemplate('noticias', $dados);
        	exit;
		}
	}
	
	
	// - Noticias -----------------------------------------------------------------
	public function note() {
	$n = new Noticias(); // Aqui carrega o model
    $dados['note'] = $n->getNote();
      if(isset($_GET['id']) && !empty($_GET['id'])) {	
		
			$this->loadTemplate('note', $dados);

		}else {header("Location:".BASE_URL."/home"); }
	}
	
	// - Adicionar noticia -----------------------------------------------------------------
	public function news_add() {
		$dados = array();
		$noticias = new Noticias();
		
		if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
			$titulo = addslashes($_POST['titulo']);
			$noticia = addslashes($_POST['noticia']);
			$data = addslashes($_POST['data']);
			$hora = addslashes($_POST['hora']);
			$ordem = addslashes($_POST['ordem']);
			$tag = addslashes($_POST['tag']);
			$autor = addslashes($_POST['autor']);
			$local = addslashes($_POST['local']);
			$noticias->add_News($titulo, $noticia, $data, $hora, $ordem, $tag, $autor, $local);
			header("Location: ".BASE_URL."/home"); // Pagina de saida
		exit;
		}else{
          $this->loadTemplate('noticias_add', $dados);
        	}
	}
	
	// - EDITAR Noticia -----------------------------------------------------------------	
	public function edit_note() {
		$noticias = new Noticias(); // Aqui carrega o model	
		$dados['noticias'] = $noticias->getNote();
		if(isset($_POST['id']) && !empty($_POST['id'])) {
			$id = addslashes($_POST['id']);
			$titulo = addslashes($_POST['titulo']);
			$noticia = addslashes($_POST['noticia']);
			$data = addslashes($_POST['data']);
			$hora = addslashes($_POST['hora']);
			$ordem = addslashes($_POST['ordem']);
			$tag = addslashes($_POST['tag']);
			$autor = addslashes($_POST['autor']);
			$local = addslashes($_POST['local']);
			
			$noticias->news_edit($id, $titulo, $noticia, $data, $hora, $ordem, $tag, $autor, $local);

			header("Location: ".BASE_URL."/noticias/note?id=$id"); // Pagina de saida
		exit;
		}else{
			if(isset($_GET['id']) && !empty($_GET['id'])) {	
                $this->loadTemplate('noticias_edit', $dados);
        	}
		}
		}	
}
?>