<?php
class clientesController extends controller {
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
		
// - Lista TODOS ou UM Cliente ----------------------------------------------	
	public function cliente() { // Aqui define o link: /users/lista
		$clientes = new Clientes(); // Aqui carrega o model
		$dados['cliente'] = $clientes->getCliente();	
		if(isset($_GET['idcli']) && !empty($_GET['idcli'])) {	
			//$this->loadTemplate('users_edit', $dados);
			$this->loadTemplate('cliente', $dados);
		}else { $this->loadTemplate('cliente', $dados); }
	}
	
	// - Lista Clientes pagimnado ---------------------------------------------------------	
	public function paginado() { // Aqui define o link: /equipamento/eqp_pag
		$clientes = new Clientes(); // Aqui carrega o model
		if(isset($_GET['p']) && !empty($_GET['p'])) {	
		$dados['clientes'] = $clientes->getClientesPag();
		$this->loadTemplate('clientes',$dados);
		}else{
		$dados['clientes'] = $clientes->getClientesPag();	
		$this->loadTemplate('clientes', $dados);
		}
	}
	
	// - EDITAR Cliente -----------------------------------------------------------------	
	public function edit() {
		$clientes = new Clientes(); // Aqui carrega o model
		$dados['clientes'] = $clientes->getCliente();
		if(isset($_POST['idcli']) && !empty($_POST['idcli'])) {
			$idcli = addslashes($_POST['idcli']);
			$rsocial = addslashes($_POST['rsocial']);
			$cnpj = addslashes($_POST['cnpj']);
			$insc_est = addslashes($_POST['insc_est']);
			$insc_munic = addslashes($_POST['insc_munic']);
			$contato = addslashes($_POST['contato']);
			$contato2 = addslashes($_POST['contato2']);
			$telefone = addslashes($_POST['telefone']);
			$celular = addslashes($_POST['celular']);
			$fax = addslashes($_POST['fax']);
			$email = addslashes($_POST['email']);
			$email2 = addslashes($_POST['email2']);
			$site = addslashes($_POST['site']);
			$endereco = addslashes($_POST['endereco']);
			$complemento = addslashes($_POST['complemento']);
			$bairro = addslashes($_POST['bairro']);
			$cep = addslashes($_POST['cep']);
			$cidade = addslashes($_POST['cidade']);
			$estado = addslashes($_POST['estado']);
			$logo = addslashes($_POST['logo']);
			
			$clientes->edit($idcli, $rsocial, $cnpj, $insc_est, $insc_munic, $contato, $contato2, $telefone, $celular, $fax, $email, $email2, $site, $endereco, $complemento, $bairro, $cep, $cidade, $estado, $logo);
			//header("Location: ".BASE_URL."/equipa/editar_eqp?id_eqp=$id_eqp");
			header("Location: ".BASE_URL."/clientes/cliente?idcli=$idcli"); // Pagina de saida
		exit;
		}else{ $this->loadTemplate('cliente_edit', $dados); }
		}
		
// - Adicionar Cliente -----------------------------------------------------------------
	public function add() {
		$dados = array();
		$clientes = new Clientes(); // Aqui carrega o model
		if(isset($_POST['rsocial']) && !empty($_POST['rsocial'])) {
			$rsocial = addslashes($_POST['rsocial']);
			$cnpj = addslashes($_POST['cnpj']);
			$insc_est = addslashes($_POST['insc_est']);
			$insc_munic = addslashes($_POST['insc_munic']);
			$contato = addslashes($_POST['contato']);
			$contato2 = addslashes($_POST['contato2']);
			$telefone = addslashes($_POST['telefone']);
			$celular = addslashes($_POST['celular']);
			$fax = addslashes($_POST['fax']);
			$email = addslashes($_POST['email']);
			$email2 = addslashes($_POST['email2']);
			$site = addslashes($_POST['site']);
			$endereco = addslashes($_POST['endereco']);
			$complemento = addslashes($_POST['complemento']);
			$bairro = addslashes($_POST['bairro']);
			$cep = addslashes($_POST['cep']);
			$cidade = addslashes($_POST['cidade']);
			$estado = addslashes($_POST['estado']);
			$logo = addslashes($_POST['logo']);
			
			$clientes->add($rsocial, $cnpj, $insc_est, $insc_munic, $contato, $contato2, $telefone, $celular, $fax, $email, $email2, $site, $endereco, $complemento, $bairro, $cep, $cidade, $estado, $logo);
			header("Location: ".BASE_URL."/clientes/paginado");
			//$this->loadTemplate('Home', $dados); // Pagina de saida
		exit;
		}else{
          $this->loadTemplate('cliente_add', $dados);
        	}
	}
}
?>