<?php
class relatorioController extends controller {
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
	
// - Navega nos relatorios de uma obra NEXT BACK ----------------------------------------------	
	public function historico() { // Aqui define o link: /relatorio/historico	
    if(isset($_POST['imp_obra']) && !empty($_POST['imp_obra'])) {
		$obra=$_POST['imp_obra'];
		$relatorio = new Relatorio(); // Aqui carrega o model
		$mensagem = new Mensagens(); // Aqui carrega o model
		// Verifica se retornou algo 
				if($relatorio->getHistbacknext() == true) {
					$dados['historico'] = $relatorio->getHistbacknext();
					$dados['mensagem'] = $mensagem->getMsgObra($obra);
					$this->loadTemplate('obra_rel', $dados);
					exit; }
					
				if($relatorio->getHistbacknext() == false) {
					if(isset($_POST['back']) && !empty($_POST['back'])) {
						//$relatorio = new Relatorio(); // Aqui carrega o model
						$dados['historico'] = $relatorio->getHist();
						$dados['error1'] = 'Não há lançamentos anteriores!';
						$dados['mensagem'] = $mensagem->getMsgObra($obra);
						$this->loadTemplate('obra_rel', $dados);
						exit; }
						
						if(isset($_POST['next']) && !empty($_POST['next'])) {
						//$relatorio = new Relatorio(); // Aqui carrega o model
						$dados['historico'] = $relatorio->getHist();
						$dados['error2'] = 'Este foi o último lançamento!';
						$dados['mensagem'] = $mensagem->getMsgObra($obra);
						$this->loadTemplate('obra_rel', $dados);
						exit; }
						
						 }
		}
		
		// REQUISICAO DO EDITAR ???????
		if(isset($_GET['id_hist']) && !empty($_GET['id_hist'])) {	
		$relatorio = new Relatorio(); // Aqui carrega o model
		$dados['historico'] = $relatorio->getHist();
			$this->loadTemplate('obra_rel', $dados);
			exit;
		} else{ 
		// Veio pelo GET na HOME	
		$obra=$_GET['idobra'];
		$relatorio = new Relatorio(); // Aqui carrega o model
		$mensagem = new Mensagens(); // Aqui carrega o model
		$dados['historico'] = $relatorio->getHistorico();
		$dados['mensagem'] = $mensagem->getMsgObra($obra);
		if($_SESSION['ccNivel'] >= 5){
		//$this->loadTemplate2('relat_lista', $dados); exit; }else{
		$this->loadTemplate('obra_rel', $dados); exit; }else{
		$this->loadTemplate('obra_rel', $dados);}
		exit;
		 }
	}
	
	
	// LISTAGEM GERAL - ADMINISTRADOR
	public function lista() { // Aqui define o link: /relatorio/lista	

		$relatorio = new Relatorio(); // Aqui carrega o model
		$dados['historico'] = $relatorio->getLista();
		// Listagem dos lançamentos
		$this->loadTemplate('relat_list', $dados);
			exit;
	}
	
	// REQUISICAO VEIO DO LOGUIN ------------------------------------
	public function obra_rel() { // Aqui define o link: /relatorio/obra_rel	
  /* no loguin foram recuperados os seguintes dados e gravados na SESSION: ID do usuário, nome,
  nivel, id do cliente (imp-cliente), logo do cliente, obras desse usuario. */
			
  $str = $_SESSION['ccObras'];
  $arr = explode(',', $str); // transforma a string em array.
			
  /* VALIDO PARA USUARIO COM NIVEL MENOR QUE 5 SE 4 vai para HOME
  Para usuarios com nivel igual a 4 o superior vai para a intarnet com listagem de obras
  O problema: se nao houver nenhuma obra uma tela de escape falando que nao tem obras
  Se a primeira obra estiver sem lançamento procurar a proxima com lançamento
  */
			// Verifica se o string obras está vazio
  if (empty($str)) {
			 // SE NIVEL 4
			 if ($_SESSION['ccNivel'] == 4){ header("Location: ".BASE_URL); exit; }else{
			// SE MENOR QUE 4
			$dados['outrasobras'] = "";
			$dados['error'] = 'Não encontramos lançamentos registrados para este usuário!
			<br><br>Por favor faça contato com o engenheiro da FS Consultores relatando esta ocorrência!';
			 // carrega dados para a caixa de selecao
			 $this->loadTemplate('obra_rel', $dados); exit;
			 }
		}
	
// Essa requisição é feita na home usuarios > 4 ------------------------------------
	if(isset($_GET['idobra']) && !empty($_GET['idobra'])) {		
	$dados = array();	
	$obras = new Obras(); // Aqui carrega o model
					$obra = $_POST['idobra'];
					$relatorio = new Relatorio(); // Aqui carrega o model
					$mensagem = new Mensagens(); // Aqui carrega o model
					$dados['historico'] = $relatorio->getHistorico();
					$dados['mensagem'] = $mensagem->getMsgObra($obra);
					$this->loadTemplate('obra_rel', $dados);
					exit;
					}
					

		// Requisição na pagina obra_rel NEXT BACK		
		if(isset($_POST['back']) OR isset($_POST['next'])) {	
		$relatorio = new Relatorio(); // Aqui carrega o model
		
		// Verifica se retornou algo 
				if($relatorio->getHistbacknext() == true) {
					$obras = new Obras(); // Aqui carrega o model
					$dados['outrasobras'] = $obras->getOutrasObras($str);
		
					$dados['historico'] = $relatorio->getHistbacknext();
					$this->loadTemplate('obra_rel', $dados);
					exit; }
					
				if($relatorio->getHistbacknext() == false) {
					if(isset($_POST['back']) && !empty($_POST['back'])) {
						//$relatorio = new Relatorio(); // Aqui carrega o model
						$obras = new Obras(); // Aqui carrega o model
						$dados['outrasobras'] = $obras->getOutrasObras($str);
		
						$dados['historico'] = $relatorio->getHist();
						$dados['error1'] = 'Não há lançamentos anteriores!';
						$this->loadTemplate('obra_rel', $dados);
						exit; }
						
						if(isset($_POST['next']) && !empty($_POST['next'])) {
						//$relatorio = new Relatorio(); // Aqui carrega o model
						$obras = new Obras(); // Aqui carrega o model
						$dados['outrasobras'] = $obras->getOutrasObras($str);
						
						$dados['historico'] = $relatorio->getHist();
						$dados['error2'] = 'Este foi o último lançamento!';
						$this->loadTemplate('obra_rel', $dados);
						exit; }
				}
					}
	
	// Requisição feita no obra_rel CLIENTE
	if(isset($_POST['imp_obra']) && !empty($_POST['imp_obra'])) {
	$dados = array();	
					// Outras obras
					$obras = new Obras(); // Aqui carrega o model
					$dados['outrasobras'] = $obras->getOutrasObras($str);
					$obra = $_POST['imp_obra'];
					$relatorio = new Relatorio(); // Aqui carrega o model
					$dados['historico'] = $relatorio->getHistLog($obra);
					
					 if($relatorio->getHistLog($obra) == false) {
						 
						 
						 // O alerta
		echo '<script language="javascript">alert("Obra sem lançamentos!")</script>';
		// Retorno de pagina
		$var = "<script>javascript:history.back(-1)</script>";
		echo $var;
		exit;
						 
					// $dados['error'] = 'Não encontramos lançamentos registrados para esta obra!<br><br>Por favor escolha outra opção na caixa de seleção da barra de menu!'; 
					}
					
					$this->loadTemplate('obra_rel', $dados);
					exit;
					}
					
	/* verifica se existem obras e se estas obras tem lançamentos */
	
  	// Conta o numero de elementos do array obras	
  	$contagem = count($arr);
    /* Elimina a possibilidade de obra com id 0, herdada da base de dados antiga 
    e pega o segundo valor */
    if($arr[0] != 0){
    $obra = $arr[0]; // pega o primeiro valor
    }else{ $obra = $arr[1]; } // pega o segundo valor
	
      // Faz a primeira busca e se retornar false começa o loop 
      $relatorio = new Relatorio(); // Aqui carrega o model
      $relatorio->getHistLog($obra);
      $dados = array();
      // Valor inicial da variavel i;
        $i = $obra;
        if($relatorio->getHistLog($obra) == false) {
		$obra = $arr[($i+1)];
        $relatorio = new Relatorio(); // Aqui carrega o model
        $relatorio->getHistLog($obra);
        $i++;
        }
		
		 // Se depois do loop não tiver resultado true vai para a pagina sem lançamentos
		 if($relatorio->getHistLog($obra) == false) {
			 // SE NIVEL é 4
			 if ($_SESSION['ccNivel'] == 4){ header("Location: ".BASE_URL); exit; }else{
			// SE MENOR QUE 4
			 
			 $dados['error'] = 'Obra(s) sem lançamentos!';
			 // carrega dados para a caixa de selecao
             $obras = new Obras(); // Aqui carrega o model
             $dados['outrasobras'] = $obras->getOutrasObras($str);
			 $this->loadTemplate('obra_rel', $dados); exit; } }
			 
		// Se achou obras
		// SE NIVEL 4
			 if ($_SESSION['ccNivel'] == 4){ 
		$obras = new Obras(); // Aqui carrega o model
		$dados['outrasobras'] = $obras->getOutrasObras($str);
		$dados['historico'] = $relatorio->getHistLog($obra);
		
		$this->loadTemplate('home', $dados);
		exit; }else{
			 
			// SE MENOR QUE 4
      $obras = new Obras(); // Aqui carrega o model
      $dados['outrasobras'] = $obras->getOutrasObras($str);
      $dados['historico'] = $relatorio->getHistLog($obra);
      $this->loadTemplate('obra_rel', $dados);
      exit; }
			
	}
	// - upload -----------------------------------------------------------------
	public function upload(){
		$dados=array();
		$dest=$_POST['caminho'];
		//Corta os 5 primeiros caracteres da string
		$dest = substr_replace($dest, "", 0, 5);
		$dados['upload'] = $dest . $_FILES['arquivo']['name'];
		$this->loadTemplate('upload', $dados);
		
		//$dest=$_POST['caminho'];
		//Corta os 5 primeiros caracteres da string
		//$dest = substr_replace($dest, "", 0, 5);
	}
	// - upload -----------------------------------------------------------------
	
	// - Adicionar Lançamento -----------------------------------------------------------------
	public function add() {
		$dados = array();
		$historico = new Relatorio();
		// Faz buscas no users para comobox
		$user = new Users();
		$dados['user'] = $user->getUsuariosEqp();
		
		/* Faz busca nas obras ativas para o combobox de obras do user */
		$ob = new Obras();
		$dados['obras'] = $ob->getAtivas();
		
		if(isset($_POST['imp_obra']) && !empty($_POST['imp_obra'])) {
			
			// Manipula o formato da data
			
			$partesmeta2 = explode('/', addslashes($_POST["meta2"]));
			$meta02 = $partesmeta2[2].'-'.$partesmeta2[1].'-'.$partesmeta2[0];
			$partescorrente = explode('/', addslashes($_POST["corrente"]));
			$corrente = $partescorrente[2].'-'.$partescorrente[1].'-'.$partescorrente[0];
			$partesdata = explode('/', addslashes($_POST["data_lancamento"]));
			$data_lancamento = $partesdata[2].'-'.$partesdata[1].'-'.$partesdata[0];
			
			$imp_obra = addslashes($_POST['imp_obra']);
			
			// Controlar duplicidade MES/ANO ??????
			
			$mes = addslashes($_POST['mes']);
			$ano = addslashes($_POST['ano']);
			$meta2 = $meta02;
			$corrente = $corrente;
			
			$a_previsto= str_replace (',','.',addslashes($_POST['a_previsto']));
			$b_realizado= str_replace (',','.',addslashes($_POST['b_realizado']));
			$c_previsto= str_replace (',','.',addslashes($_POST['c_previsto']));
			$c_realizado= str_replace (',','.',addslashes($_POST['c_realizado']));
			$c_final= str_replace (',','.',addslashes($_POST['c_final']));
			
			$analise = addslashes($_POST['analise']);
			$data_lancamento = $data_lancamento;
			$resp = addslashes($_POST['resp']);
			$reordem = addslashes($_POST['reordem']);
			$historico->add($imp_obra, $mes, $ano, $meta2, $corrente, $a_previsto, $b_realizado, $c_previsto, $c_realizado, $c_final, $analise, $data_lancamento, $resp, $reordem);
			
			header("Location: ".BASE_URL);
			//$this->loadTemplate('Home', $dados); // Pagina de saida
		exit;
		}else{
          $this->loadTemplate('relat_add', $dados);
        	}
		}

// - EDITAR HISTORICO -----------------------------------------------------------------
  public function editar() {
    $historico = new Relatorio(); // Aqui carrega o model
	  $u = new Users();
	  $dados['usuarios'] = $u->getUsuariosEqp();
	  $dados['historico'] = $historico->getHist();
	
	if(isset($_POST['id_hist']) && !empty($_POST['id_hist'])) {
  
	  // Coneverte data
$meta2=implode('-', array_reverse(explode('/', addslashes($_POST['meta2']))));
// Coneverte data
$corrente=implode('-', array_reverse(explode('/', addslashes($_POST['corrente']))));
// Coneverte data
$data_lancamento=implode('-', array_reverse(explode('/', addslashes($_POST['data_lancamento']))));

	  $id_hist = addslashes($_POST['id_hist']);
	  $imp_obra = addslashes($_POST['imp_obra']);
	  $mes = addslashes($_POST['mes']);
	  $ano = addslashes($_POST['ano']);
	  $meta2 = $meta2;
	  $corrente = $corrente;
	  
	  //troca virgula por ponto na entrada do usuário
	  $a_previsto= str_replace (',','.',addslashes($_POST['a_previsto']));
	  $b_realizado= str_replace (',','.',addslashes($_POST['b_realizado']));
	  $c_previsto= str_replace (',','.',addslashes($_POST['c_previsto']));
	  $c_realizado= str_replace (',','.',addslashes($_POST['c_realizado']));
	  $c_final= str_replace (',','.',addslashes($_POST['c_final']));
	  // --------------------------------------------------------------------
	  
	  $analise = addslashes($_POST['analise']);
	  $data_lancamento = $data_lancamento;
	  $resp = addslashes($_POST['resp']);
	  $reordem = addslashes($_POST['reordem']);
			
			$historico->edit($id_hist, $imp_obra, $mes, $ano, $meta2, $corrente, $a_previsto, $b_realizado, 
			$c_previsto, $c_realizado, $c_final, $analise, $data_lancamento, $resp, $reordem);
			//header("Location: ".BASE_URL."/equipa/editar_eqp?id_eqp=$id_eqp");
			header("Location: ".BASE_URL."/relatorio/historico?id_hist=".$id_hist.""); // Pagina de saida
		exit;
		}else{
			if(isset($_GET['id_hist']) && !empty($_GET['id_hist'])) {	
                $this->loadTemplate('rel_edit', $dados);
        	}
		}
		}
	
}
	?>