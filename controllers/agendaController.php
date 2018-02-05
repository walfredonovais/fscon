<?php
class agendaController extends controller {
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
	
	// - Lista TODOS ou UM Contato ----------------------------------------------	
	public function lista() { // Aqui define o link: /agenda/lista
		$agenda = new Agenda(); // Aqui carrega o model
		if(isset($_GET['idag']) && !empty($_GET['idag'])) {	
		$dados['agenda'] = $agenda->getAgenda();	
		$this->loadTemplate('agd_contact', $dados);
		}else{
			$dados['agenda'] = $agenda->getAgenda();
			if(isset($_POST['palavra']) && !empty($_POST['palavra'])) {	
				$this->loadTemplate('agenda', $dados);
			}else { $this->loadTemplate('ag_listagem', $dados);}
		}
	}
	
	// - Lista Agenda pagimnado ---------------------------------------------------------	
	public function ag_pag() { // Aqui define o link: /agenda/ag_pag
		$agenda = new Agenda(); // Aqui carrega o model
		if(isset($_GET['p']) && !empty($_GET['p'])) {	
		$dados['agenda'] = $agenda->getAgendaPag();
		$this->loadTemplate('agenda',$dados);
		}else{
		$dados['agenda'] = $agenda->getAgendaPag();	
		$this->loadTemplate('agenda', $dados);
		}
	}

// - EDITAR Agenda -----------------------------------------------------------------	
	public function editar() {
		$agenda = new Agenda(); // Aqui carrega o model
		$dados['agenda'] = $agenda->getAgenda();
		if(isset($_POST['idag']) && !empty($_POST['idag'])) {
			$idag = addslashes($_GET['idag']);
			$categoria = addslashes($_POST['categoria']);
			$empresa = addslashes($_POST['empresa']);
			$nome = addslashes($_POST['nome']);
			$telefone = addslashes($_POST['telefone']);
			$ramal = addslashes($_POST['ramal']);
			$celular = addslashes($_POST['celular']);
			$fax = addslashes($_POST['fax']);
			$email = addslashes($_POST['email']);
			$site = addslashes($_POST['site']);
			$anotacao = addslashes($_POST['anotacao']);
			$endereco = addslashes($_POST['endereco']);
			$cep = addslashes($_POST['cep']);
			$cidade = addslashes($_POST['cidade']);
			$estado = addslashes($_POST['estado']);
			$maisfalado = addslashes($_POST['maisfalado']);
			$data = addslashes($_POST['data']);
			$user = addslashes($_POST['user']);
			$agenda->edit($idag, $categoria, $empresa, $nome, $telefone, $ramal, $celular, $fax, $email, $site, $anotacao, $endereco, $cep, $cidade, $estado, $maisfalado, $data, $user);
			//header("Location: ".BASE_URL."/agenda/lista?idag=$idag"); // Pagina de saida
				
			 $this->loadTemplate('agd_contact', $dados);
		exit;
		}else{
			if(isset($_GET['idag']) && !empty($_GET['idag'])) {	
                $this->loadTemplate('agenda_edit', $dados);
        	}
		}
		}
		
// - Adicionar Item Agenda -----------------------------------------------------------------
	public function add() {
		$dados = array();
		$agenda = new Agenda(); // Aqui carrega o model
		//$dados['usuarios'] = $usuarios->getUsuarios();
		if(isset($_POST['nome']) && !empty($_POST['nome'])) {
			$categoria = addslashes($_POST['categoria']);
			$empresa = addslashes($_POST['empresa']);
			$nome = addslashes($_POST['nome']);
			$telefone = addslashes($_POST['telefone']);
			$ramal = addslashes($_POST['ramal']);
			$celular = addslashes($_POST['celular']);
			$fax = addslashes($_POST['fax']);
			$email = addslashes($_POST['email']);
			$site = addslashes($_POST['site']);
			$anotacao = addslashes($_POST['anotacao']);
			$endereco = addslashes($_POST['endereco']);
			$cep = addslashes($_POST['cep']);
			$cidade = addslashes($_POST['cidade']);
			$estado = addslashes($_POST['estado']);
			$maisfalado = addslashes($_POST['maisfalado']);
			$data = addslashes($_POST['data']);
			$user = addslashes($_POST['user']);
			//retirei $id
			$agenda->add($categoria, $empresa, $nome, $telefone, $ramal, $celular, $fax, $email, $site, $anotacao, $endereco, $cep, $cidade, $estado, $maisfalado, $data, $user);
			
			header("Location: ".BASE_URL."/agenda/ag_pag");
			//$this->loadTemplate('lista', $dados); // Pagina de saida
		exit;
		}else{
          $this->loadTemplate('agenda_add', $dados);
        	}
		}
}
?>