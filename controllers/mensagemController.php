<?php
class mensagemController extends controller {
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
		$mensagem = new Mensagens(); // Aqui carrega o model
		if(isset($_POST['obra']) && !empty($_POST['obra'])) {	
		$dados['mensagem'] = $mensagem->getMsg();	
		$this->loadTemplate('mensagens', $dados);
		}
	}
	
	// - Noticias -----------------------------------------------------------------
	public function mensagens() {
		$dados = array();
		$mensagem = new Mensagens();
		if(isset($_GET['obra']) && !empty($_GET['obra'])) {
		$dados['mensagem'] = $mensagem->getMsg();
		$this->loadTemplate('mensagem', $dados);
        	exit;
		}
	}
	
	// - Noticias -----------------------------------------------------------------
	public function msg() {
		$dados = array();
		$id_imp=$_GET['id'];
		$mensagem = new Mensagens();
		$comenta = new Mensagens();
		if(isset($_GET['id']) && !empty($_GET['id'])) {
		$dados['comentarios'] = $comenta->getComenta($id_imp);
		$dados['mensagem'] = $mensagem->getOne();
		$this->loadTemplate('msg', $dados);
        	exit;
		}
	}
	
	
	// - Adicionar Mensagem -----------------------------------------------------------------
	public function add() {
		$dados = array();
		$mensagem = new Mensagens();
		if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
			$titulo = addslashes($_POST['titulo']);
			$msg = addslashes($_POST['msg']);
			$data = addslashes($_POST['data']);
			$autor = addslashes($_POST['autor']);
			$obra = addslashes($_POST['obra']);
			$mensagem->add($titulo, $msg, $data, $autor, $obra);
			header("Location: ".BASE_URL."/home"); // Pagina de saida
		exit;
		}else{
          $this->loadTemplate('msg_add', $dados);
        	}
	}
	
	// - EDITAR Mensagens -----------------------------------------------------------------	
	public function edit() {
		
		$mensagem = new Mensagens(); // Aqui carrega o model	
		$dados['mensagem'] = $mensagem->getOne();
		if(isset($_POST['id']) && !empty($_POST['id'])) {
			$id = addslashes($_POST['id']);
			$titulo = addslashes($_POST['titulo']);
			$msg = addslashes($_POST['msg']);
			$data = addslashes($_POST['data']);
			$autor = addslashes($_POST['autor']);
			$obra = addslashes($_POST['obra']);
			
			$mensagem->edit($id, $titulo, $msg, $data, $autor, $obra);

			header("Location: ".BASE_URL."/mensagem/msg?id=$id"); // Pagina de saida
		exit;
		}else{
			if(isset($_GET['id']) && !empty($_GET['id'])) {	
                $this->loadTemplate('msg_edit', $dados);
        	}
		}
		}
		
		// - Adicionar Mensagem -----------------------------------------------------------------
	public function add_comenta() {
		$dados = array();
		$mensagem = new Mensagens();
		if(isset($_POST['id_imp']) && !empty($_POST['id_imp'])) {
			$id_imp = addslashes($_POST['id_imp']);
			$comentario = addslashes($_POST['comentario']);
			$data = addslashes($_POST['data']);
			$autor = addslashes($_POST['autor']);
			$mensagem->add_comenta($id_imp, $comentario, $data, $autor);
			header("Location: ".BASE_URL."/home"); // Pagina de saida
		exit;
		}else{
          $this->loadTemplate('comenta_add', $dados);
        	}
	}	
}
?>