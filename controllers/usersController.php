<?php
class usersController extends controller {
  //VERIFICA SE USER ESTA LOGADO
  public function __construct() {
    parent::__construct();
    // Verifica se está logado, se não vai para pagina de login 
    $u = new Users();
    if($u->isLogged() == false) {
      header("Location:".BASE_URL."/login");
      exit;
    }
  }
		
// - Lista TODOS ou UM usuario ----------------------------------------------	
  public function lista() { // Aqui define o ação: /users/lista
    $usuarios = new Users(); // Aqui carrega o model: Users
    $dados['usuarios'] = $usuarios->getUsuarios();	
    if(isset($_GET['id']) && !empty($_GET['id'])) {	
      $this->loadTemplate('user_contact', $dados);
    }else { $this->loadTemplate('users_list', $dados);
    }
  }

// - Lista TODOS ou UM usuario ----------------------------------------------	
  public function lista2() { // Aqui define o ação: /users/lista
    $usuarios = new Users(); // Aqui carrega o model: Users
    $dados['usuarios'] = $usuarios->getUsuarios();	
    if(isset($_GET['id']) && !empty($_GET['id'])) {	
      $this->loadTemplate('usuario', $dados);
    }
  }


// - Lista PAGINADO ---------------------------------------------------------	
  public function paginado() { // Aqui define o link: /users/lista
    $usuarios = new Users(); // Aqui carrega o model
    if(isset($_GET['p']) && !empty($_GET['p'])) {	
      $dados['usuarios'] = $usuarios->getUsuariosPaginado();
      $this->loadTemplate('usuarios',$dados);
    }else{
      $dados['usuarios'] = $usuarios->getUsuariosPaginado();	
      $this->loadTemplate('usuarios', $dados);
    }
  }
	
// - Lista PAGINADO FS ---------------------------------------------------------	
  public function fscon() { // Aqui define o link: /users/fscon
    $usuarios = new Users(); // Aqui carrega o model
    if(isset($_GET['p']) && !empty($_GET['p'])) {	
      $dados['usuarios'] = $usuarios->getUsuariosFs();
      $this->loadTemplate('usuarios_FS',$dados);
    }else{
      $dados['usuarios'] = $usuarios->getUsuariosFs();	
      $this->loadTemplate('usuarios_FS', $dados);
    }
  }	
	
// - EDITAR USUARIO -----------------------------------------------------------------	
 public function editar() {
    $usuarios = new Users(); // Aqui carrega o model
    $dados['usuarios'] = $usuarios->getUsuarios();
    $c = new Clientes();
    $o = new Obras();
		
    if(isset($_POST['id']) && !empty($_POST['id'])) {
      $id = addslashes($_POST['id']);
      $nome = addslashes($_POST['nome']);
      $usuario = addslashes($_POST['usuario']);
      $senha = addslashes($_POST['senha']);
      $nivel = addslashes($_POST['nivel']);
// Troca virgula por ponto
$obra= str_replace ('.',',',addslashes($_POST['obra']));
      $ativo = addslashes($_POST['ativo']);
      $email = addslashes($_POST['email']);
      $ramal = addslashes($_POST['ramal']);
      $fscon = addslashes($_POST['fscon']);
      $local = addslashes($_POST['local']);
      $celular = addslashes($_POST['celular']);
	  $celular2 = addslashes($_POST['celular2']);
      $pass_email = addslashes($_POST['pass_email']);
	  
      //$dia = addslashes($_POST['dia']);
      //$mes = addslashes($_POST['mes']);
      
	  $imp_cliente = addslashes($_POST['imp_cliente']);
// Coneverte data
$nascimento=implode('-', array_reverse(explode('/', addslashes($_POST['nascimento']))));
	  $emergencia = addslashes($_POST['emergencia']);
      $usuarios->edit($id, $nome, $usuario, $senha, $nivel, $obra, $ativo, $email, $ramal, $fscon, $local, $celular, $celular2, $pass_email,
	   //$dia, 
	   //$mes, 
		$imp_cliente, $nascimento, $emergencia);
      header("Location: ".BASE_URL."/users/lista?id=$id"); // Pagina de saida
      exit;
    }else{
    if(isset($_GET['id']) && !empty($_GET['id'])) {	
      $dados['obras'] = $o->getAtivas();
      $dados['clientes'] = $c->getCliente();
      $this->loadTemplate('users_edit', $dados);
    }
    }
  }
			
// - Adicionar USUARIO -----------------------------------------------------------------
  public function add() {
    $dados = array();
    $new_user = new Users(); // Aqui carrega o model
    /* Faz busca nas obras ativas para o combobox de obras do user */
    $ob = new Obras();
    $dados['obras'] = $ob->getAtivas();
	$ob = new Clientes();
    $dados['clientes'] = $ob->getCliente();
    if(isset($_POST['nome']) && !empty($_POST['nome'])) {
      $nome = addslashes($_POST['nome']);
      $usuario = addslashes($_POST['usuario']);
      $senha = addslashes($_POST['senha']);
      $nivel = addslashes($_POST['nivel']);
      // caso venha um string vazio e não array
      if(isset($_POST['obra']) && !empty($_POST['obra'])){
        $obra = $_POST['obra'];
      }else { $obra='';}
      $ativo = addslashes($_POST['ativo']);
      $email = addslashes($_POST['email']);
      $ramal = addslashes($_POST['ramal']);
      $fscon = addslashes($_POST['fscon']);
      $local = addslashes($_POST['local']);
      $celular = addslashes($_POST['celular']);
	  $celular2 = addslashes($_POST['celular2']);
      $pass_email = addslashes($_POST['pass_email']);
	  
      //$dia = addslashes($_POST['dia']);
     // $mes = addslashes($_POST['mes']);
	  
      $imp_cliente = addslashes($_POST['imp_cliente']);
// Coneverte data
$nascimento=implode('-', array_reverse(explode('/', addslashes($_POST['nascimento']))));
	  $emergencia = addslashes($_POST['emergencia']);
	  
      $new_user->add($nome, $usuario, $senha, $nivel, $obra, $ativo, $email, $ramal, $fscon, $local, $celular, $celular2, $pass_email,
	  // $dia, 
	  // $mes, 
	   $imp_cliente, $nascimento, $emergencia);
			header("Location: ".BASE_URL."/users/paginado");
      exit;
      }else{
        $this->loadTemplate('users_add', $dados);
    }
  }
		
// - Lista Ramais ----------------------------------------------	
  public function ramais() { // Aqui define o link: /users/lista
    $usuarios = new Users(); // Aqui carrega o model
    $dados['usuarios'] = $usuarios->getRamais();	
    $this->loadTemplate('ramais_list', $dados); 
  }
		
}

?>