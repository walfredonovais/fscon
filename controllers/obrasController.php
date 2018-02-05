<?php
class obrasController extends controller {
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
	
	// - Lista das obras ativas ----------------------------------------------	
	public function listagem() { // Aqui define o link: /obras/lista
		$o = new Obras(); // Aqui carrega o model
		$dados['obras'] = $o->getObras();
		$this->loadTemplate('obras_listg', $dados); 
	}
	// - Lista das obras ativas ----------------------------------------------	
	public function obras() { // Aqui define o link: /obras/lista
		$o = new Obras(); // Aqui carrega o model
		$dados['obras'] = $o->getAtivas();	
		if(isset($_GET['idobra']) && !empty($_GET['idobra'])) {	
			$this->loadTemplate('obra', $dados);
		}else { 
		$this->loadTemplate('obras', $dados); }
	}
	
// - Listagem todas as obras ----------------------------------------------	
	public function paginado() { // Aqui define o link: /obras/paginado
		$o = new Obras(); // Aqui carrega o model
		$dados['obras'] = $o->getObrasPag();
		$this->loadTemplate('obras', $dados);
	}
	
	// - Criar pasat ----------------------------------------------	
	public function criarpasta() { // Aqui define o link: /users/lista
	
	$o = new Obras(); // Aqui carrega o model
		$c = new Clientes();
		
		$obra = $_GET['idobra'];
		$cliente = $_GET['idcliente'];
		
		$ed=BASE_URL."/assets/clientes/";

		
		// Subtrai parte da string: http://localhost
		$edd = substr($ed,34);
		// Acrescenta ..
		$end=".".$edd;
		//$end=$edd;
		
		
		//echo $end; exit;
		
		$end01=$end.$cliente."/";
		$end02=$end.$cliente."/".$obra."/";
		$end03=$end.$cliente."/".$obra."/atas/";
		$end04=$end.$cliente."/".$obra."/relatorios/";
		$end05=$end.$cliente."/".$obra."/projetos/";
		$end06=$end.$cliente."/".$obra."/images/";
		
		//echo $end06; exit;
		
	if(!file_exists($end01)){ mkdir($end01, 0777, true); }
	if(!file_exists($end02)){ mkdir($end02, 0777, true); }
	if(!file_exists($end03)){ mkdir($end03, 0777, true); }
	if(!file_exists($end04)){ mkdir($end04, 0777, true); }
	if(!file_exists($end05)){ mkdir($end05, 0777, true); }
	if(!file_exists($end06)){ mkdir($end06, 0777, true); }
	print "<script> alert('Criado dom sucesso!');</SCRIPT>\n";

		$dados['obras'] = $o->getAtivas();
		$dados['clientes'] = $c->getCliente();	
		if(isset($_GET['idobra']) && !empty($_GET['idobra'])) {	
		$dados['obras'] = $o->getAtivas($c->getCliente());
			$this->loadTemplate('obra', $dados);
	}
	}

	
	// - ADD obras -----------------------------------------------------------------	
	public function add() {
		$dados = array();
		$obras = new Obras(); // Aqui carrega o model
		
		$c = new Clientes();
		$u = new Users();
		$dados['obras'] = $obras->getObras();
		$dados['clientes'] = $c->getCliente();
		$dados['usuarios'] = $u->getUsuariosEngFs();
		//$dados['obras'] = $obras->getObras();
		if(isset($_POST['obra']) && !empty($_POST['obra'])) {
			//$idobra = addslashes($_POST['idobra']);
			$id_imp = addslashes($_POST['id_imp']);
			$obra = addslashes($_POST['obra']);
			$cnpj_obra = addslashes($_POST['cnpj_obra']);
			$ie_obra = addslashes($_POST['ie_obra']);
			$im_obra = addslashes($_POST['im_obra']);
			$comp_obra = addslashes($_POST['comp_obra']);
			$tel_obra = addslashes($_POST['tel_obra']);
			$cel_obra = addslashes($_POST['cel_obra']);
			$fax_obra = addslashes($_POST['fax_obra']);
			$end_obra = addslashes($_POST['end_obra']);
			$cep_obra = addslashes($_POST['cep_obra']);
			$bairro_obra = addslashes($_POST['bairro_obra']);
			$cid_obra = addslashes($_POST['cid_obra']);
			$est_obra = addslashes($_POST['est_obra']);
			$escopo = addslashes($_POST['escopo']);
			$area = addslashes($_POST['area']);
// Coneverte data
$ini_cont=implode('-', array_reverse(explode('/', addslashes($_POST['ini_cont']))));			
// Coneverte data
$term_cont=implode('-', array_reverse(explode('/', addslashes($_POST['term_cont']))));			
// Coneverte data
$ini_obra=implode('-', array_reverse(explode('/', addslashes($_POST['ini_obra']))));			
// Coneverte data
$term_obra=implode('-', array_reverse(explode('/', addslashes($_POST['term_obra']))));			
			$term_obra = addslashes($_POST['term_obra']);
			$descricao = addslashes($_POST['descricao']);
			$contatos = addslashes($_POST['contatos']);
			$ativo = addslashes($_POST['ativo']);
			$prazo = addslashes($_POST['prazo']);
			$engobra = addslashes($_POST['engobra']);
			$engfs = addslashes($_POST['engfs']);
// Coneverte data
$meta1=implode('-', array_reverse(explode('/', addslashes($_POST['meta1']))));			
			$orctotal = addslashes($_POST['orctotal']);
			$financeiro = addslashes($_POST['financeiro']);
// Coneverte data
$data_entrega=implode('-', array_reverse(explode('/', addslashes($_POST['data_entrega']))));			
			$observa = addslashes($_POST['observa']);
			
			$obras->addObras($id_imp, $obra, $cnpj_obra, $ie_obra, $im_obra, $comp_obra, $tel_obra, $cel_obra, $fax_obra, $end_obra, $cep_obra, $bairro_obra, $cid_obra, $est_obra, $escopo, 
			$area, $ini_cont, $term_cont, $ini_obra, $term_obra, $descricao, $contatos, $ativo, $prazo, $engobra, $engfs, $meta1, $orctotal, $financeiro, $data_entrega, $observa);
			//header("Location: ".BASE_URL."/equipa/editar_eqp?id_eqp=$id_eqp");
			header("Location: ".BASE_URL."/obras/paginado"); // Pagina de saida
		exit;
		}else{
                $this->loadTemplate('obra_add', $dados);
		}
		}
	
	// - EDITAR obras -----------------------------------------------------------------	
	public function editar() {
		$obras = new Obras(); // Aqui carrega o model
		$c = new Clientes();
		$u = new Users();
		$dados['obras'] = $obras->getObras();
		$dados['usuarios'] = $u->getUsuariosEngFs();
			
		if(isset($_POST['idobra']) && !empty($_POST['idobra'])) {
			$idobra = addslashes($_POST['idobra']);
			$id_imp = addslashes($_POST['id_imp']);
			$obra = addslashes($_POST['obra']);
			$cnpj_obra = addslashes($_POST['cnpj_obra']);
			$ie_obra = addslashes($_POST['ie_obra']);
			$im_obra = addslashes($_POST['im_obra']);
			$comp_obra = addslashes($_POST['comp_obra']);
			$tel_obra = addslashes($_POST['tel_obra']);
			$cel_obra = addslashes($_POST['cel_obra']);
			$fax_obra = addslashes($_POST['fax_obra']);
			$end_obra = addslashes($_POST['end_obra']);
			$cep_obra = addslashes($_POST['cep_obra']);
			$bairro_obra = addslashes($_POST['bairro_obra']);
			$cid_obra = addslashes($_POST['cid_obra']);
			$est_obra = addslashes($_POST['est_obra']);
			$escopo = addslashes($_POST['escopo']);
			$area = addslashes($_POST['area']);
// Coneverte data
	$ini_cont=implode('-', array_reverse(explode('/', addslashes($_POST['ini_cont']))));
// Coneverte data
	$term_cont=implode('-', array_reverse(explode('/', addslashes($_POST['term_cont']))));
// Coneverte data
	$ini_obra=implode('-', array_reverse(explode('/', addslashes($_POST['ini_obra']))));
// Coneverte data
	$term_obra=implode('-', array_reverse(explode('/', addslashes($_POST['term_obra']))));
			$descricao = addslashes($_POST['descricao']);
			$contatos = addslashes($_POST['contatos']);
			$ativo = addslashes($_POST['ativo']);
			$prazo = addslashes($_POST['prazo']);
			$engobra = addslashes($_POST['engobra']);
			$engfs = addslashes($_POST['engfs']);
// Coneverte data
	$meta1=implode('-', array_reverse(explode('/', addslashes($_POST['meta1']))));
// Troca virgula por ponto
	$orctotal= str_replace (',','.',addslashes($_POST['orctotal']));
			$financeiro = addslashes($_POST['financeiro']);
// Coneverte data
	$data_entrega=implode('-', array_reverse(explode('/', addslashes($_POST['data_entrega']))));
			$observa = addslashes($_POST['observa']);
			
			$obras->editarObras($idobra, $id_imp, $obra, $cnpj_obra, $ie_obra, $im_obra, $comp_obra, $tel_obra, $cel_obra, $fax_obra, $end_obra, $cep_obra, $bairro_obra, $cid_obra, $est_obra, $escopo, 
			$area, $ini_cont, $term_cont, $ini_obra, $term_obra, $descricao, $contatos, $ativo, $prazo, $engobra, $engfs, $meta1, $orctotal, $financeiro, $data_entrega, $observa);
		
			if(isset($_POST['saida']) && !empty($_POST['saida']) && ($_POST['saida'] == 'obra')){
			header("Location: ".BASE_URL."/obras/obras?idobra=$idobra&&saida=obra"); // Pagina de saida
			}else { header("Location: ".BASE_URL."/relatorio/historico?idobra=$idobra"); }
		exit;
		}else{
			if(isset($_GET['idobra']) && !empty($_GET['idobra'])) {	
                $this->loadTemplate('obra_edit', $dados);
        	}
		}
		}
}
?>