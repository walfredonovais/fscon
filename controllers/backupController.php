<?php
class backupController extends controller {
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
		$backup = new Backup(); // Aqui carrega o model
		$dados['backup'] = $backup->todos();
		
			$this->loadTemplate('backup', $dados);
	}

	
	public function bkdb() { // Aqui define o link: /eventos/lista
		$dados=array();
		//$backup = new Backup(); // Aqui carrega o model
		
		//$dados['backup'] = $backup->getBackup();
		
			$this->loadTemplate('bk_DB', $dados);
	}
	
	
	// - ADD obras -----------------------------------------------------------------	
	public function add() {
		
		$dados = array();
		$backup = new Backup(); // Aqui carrega o model
		if(isset($_POST['responsavel']) && !empty($_POST['responsavel'])) {

// Coneverte data
$data=implode('-', array_reverse(explode('/', addslashes($_POST['data']))));
		
			$responsavel = addslashes($_POST['responsavel']);
			
			$backup->add($responsavel, $data);
			header("Location: ".BASE_URL."/backup/lista"); // Pagina de saida
			//header("Location: ".BASE_URL."/home"); // Pagina de saida
		exit;
		}else{
                $this->loadTemplate('backup', $dados);
		}
		}
	
	// - EDITAR Evento -----------------------------------------------------------------	
	public function edit() {
		
		$dados = array();
		$backup = new Backup(); // Aqui carrega o model
		$dados['backup'] = $backup->Bkup();
			
		if(isset($_POST['id']) && !empty($_POST['id'])) {	
			$id = addslashes($_POST['id']);
			$responsavel = addslashes($_POST['responsavel']);
// Coneverte data
$data=implode('-', array_reverse(explode('/', addslashes($_POST['data']))));

			$backup->edit($id, $responsavel, $data);
			
			header("Location: ".BASE_URL."/backup/lista"); // Pagina de saida
		exit;
		}else{
			
			if(isset($_GET['id']) && !empty($_GET['id'])) {	
			$this->loadTemplate('backup_edit', $dados);
			
        	}
		}
		}
	
	
}
?>