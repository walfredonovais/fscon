<?php
class equipaController extends controller {
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
		$dados = array();
		$e = new Equipamento();
		$e->getEquipamento();
		$this->loadTemplate('equipamento', $dados);
	}
		
// - Lista TODOS ou UM equipamento ----------------------------------------------	
	public function lista_eqp() { // Aqui define o link: /users/lista
		$equipamento = new Equipamento(); // Aqui carrega o model
		$dados['equipamento'] = $equipamento->getEquipamento();	
		if(isset($_GET['id_eqp']) && !empty($_GET['id_eqp'])) {	
			//$this->loadTemplate('users_edit', $dados);
			$this->loadTemplate('equipamento', $dados);
		}else { $this->loadTemplate('eq_listagem', $dados); }
	}

// - Lista TODOS ou UM equipamento ----------------------------------------------	
	public function lista_smb() { // Aqui define o link: /users/lista
		$equipamento = new Equipamento(); // Aqui carrega o model
		$dados['equipamento'] = $equipamento->getSmb();	
		if(isset($_GET['id_eqp']) && !empty($_GET['id_eqp'])) {	
			//$this->loadTemplate('users_edit', $dados);
			$this->loadTemplate('equipamento', $dados);
		}else { $this->loadTemplate('eq_listasmb', $dados); }
	}
	
	// - Lista Equipamento pagimnado ---------------------------------------------------------	
	public function eqp_pag() { // Aqui define o link: /equipamento/eqp_pag
		$equipamento = new Equipamento(); // Aqui carrega o model
		if(isset($_GET['p']) && !empty($_GET['p'])) {	
		$dados['equipamento'] = $equipamento->getEquipaPag();
		$this->loadTemplate('eq_lista',$dados);
		}else{
		$dados['equipamento'] = $equipamento->getEquipaPag();	
		$this->loadTemplate('eq_lista', $dados);
		}
	}
	
	// - EDITAR EQUIPAMENTO -----------------------------------------------------------------	
	public function editar_eqp() {
		$equipamento = new Equipamento(); // Aqui carrega o model
		$u = new Users();
		$dados['equipamento'] = $equipamento->getEquipamento();
		$dados['usuarios'] = $u->getUsuariosEqp();
		
		if(isset($_POST['id_eqp']) && !empty($_POST['id_eqp'])) {
			$id_eqp = addslashes($_POST['id_eqp']);
			$patrimonio = addslashes($_POST['patrimonio']);
			$nome = addslashes($_POST['nome']);
			$serial = addslashes($_POST['serial']);
			$nf = addslashes($_POST['nf']);
			$smb = addslashes($_POST['smb']);
			$pt_rede = addslashes($_POST['pt_rede']);
			$tipo = addslashes($_POST['tipo']);
			$marca = addslashes($_POST['marca']);
			$modelo = addslashes($_POST['modelo']);
			$processador = addslashes($_POST['processador']);
			$motherboard = addslashes($_POST['motherboard']);
			$memoria = addslashes($_POST['memoria']);
			$sistema = addslashes($_POST['sistema']);
			$data_baixa = addslashes($_POST['data_baixa']);
			$obs_baixa = addslashes($_POST['obs_baixa']);
			$local = addslashes($_POST['local']);
			$suporte = addslashes($_POST['suporte']);
			
			$equipamento->editar_eqp($id_eqp, $patrimonio, $nome, $serial, $nf, $smb, $pt_rede, $tipo, $marca, $modelo, $processador, $motherboard, $memoria, $sistema, $data_baixa, $obs_baixa, $local, $suporte);
			//header("Location: ".BASE_URL."/equipa/editar_eqp?id_eqp=$id_eqp");
			header("Location: ".BASE_URL."/equipa/lista_eqp?id_eqp=$id_eqp"); // Pagina de saida
		exit;
		}else{
			if(isset($_GET['id_eqp']) && !empty($_GET['id_eqp'])) {	
                $this->loadTemplate('equipa_edit', $dados);
        	}
		}
		}
		
// - Adicionar Equipamento -----------------------------------------------------------------
	public function add() {
		$dados = array();
		$u = new Users();
		$equipamento = new Equipamento(); // Aqui carrega o model
		$dados['usuarios'] = $u ->getUsuariosEqp();
		if(isset($_POST['patrimonio']) && !empty($_POST['patrimonio'])) {
			$patrimonio = addslashes($_POST['patrimonio']);
			$nome = addslashes($_POST['nome']);
			$serial = addslashes($_POST['serial']);
			$nf = addslashes($_POST['nf']);
			$smb = addslashes($_POST['smb']);
			$pt_rede = addslashes($_POST['pt_rede']);
			$tipo = addslashes($_POST['tipo']);
			$marca = addslashes($_POST['marca']);
			$modelo = addslashes($_POST['modelo']);
			$processador = addslashes($_POST['processador']);
			$motherboard = addslashes($_POST['motherboard']);
			$memoria = addslashes($_POST['memoria']);
			$sistema = addslashes($_POST['sistema']);
			$data_baixa = addslashes($_POST['data_baixa']);
			$obs_baixa = addslashes($_POST['obs_baixa']);
			$local = addslashes($_POST['local']);
			$suporte = addslashes($_POST['suporte']);
			
			$equipamento->add_eqp($patrimonio, $nome, $serial, $nf, $smb, $pt_rede, $tipo, $marca, $modelo, $processador, $motherboard, $memoria, $sistema, $data_baixa, $obs_baixa, $local, $suporte);
			header("Location: ".BASE_URL."/equipa/eqp_pag"); // Pagina de saida
			//$this->loadTemplate2('equipa_listagem', $dados); // Pagina de saida
		exit;
		}else{
          $this->loadTemplate('equipa_add', $dados);
        	}
	}
}
?>