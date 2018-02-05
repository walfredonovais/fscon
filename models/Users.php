<?php
class Users extends Model {
  private $userInfo;
		
  public function isLogged() {
    if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
      return true;
    }else {
      return false;
    }
  }
  
// - User logado ----------------------------------------------	
  public function setLoggedUser() {
  if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
    $id = $_SESSION['ccUser'];

    $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

      if($sql->rowCount() > 0) {
      $this->userInfo = $sql->fetch();
      $this->userInfo['id'];
      }
  }
  }
  
// - Verifica login ----------------------------------------------	
  public function doLogin($usuario, $password) {
	  
  $sql = $this->db->prepare("SELECT usuarios.*, clientes.rsocial, clientes.idcli, clientes.logo
  FROM usuarios LEFT JOIN clientes ON clientes.idcli = usuarios.imp_cliente
  WHERE usuario = :usuario AND senha = :password");
		
  $sql->bindValue(':usuario',$usuario);
  $sql->bindValue(':password', base64_encode($password));
  $sql->execute();
  if ($sql->rowCount() > 0){
    $row = $sql->fetch();
    $_SESSION['ccUser'] = $row['id'];
    $_SESSION['ccNome'] = $row['nome'];
    $_SESSION['ccNivel'] = $row['nivel'];
    $_SESSION['ccCliente'] = $row['imp_cliente'];
    $_SESSION['ccLogo'] = $row['logo'];
    $_SESSION['ccObras'] = $row['obra'];
			
    return true;
  }else{
    return false;
    }
  } // Fecha funtion do Login
		
// LOGOUT ---------------------------------------------------------
  public function logout() {
  unset($_SESSION['ccUser']);
  session_destroy();
  }

// - Aniversariantes ----------------------------------------------		
  public function getNiver() {
  $array = array();
  $mesatual = date("m");
    $sql="SELECT nascimento, nome FROM usuarios WHERE MONTH(nascimento) = MONTH(NOW()) AND ativo = '1' AND (fscon = '1' OR fscon = '2') ORDER BY nascimento DESC";
    $sql = $this->db->query($sql);
    if($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
      return $array;
    }	
	
// - Funçao getUser equipamentos e Notificações----------------------------------------------		
  public function getUsuariosEqp() {
    $array = array();
    $sql="SELECT * FROM usuarios WHERE ativo = '1' AND (fscon = '1' OR fscon = '2') ORDER BY nome";
    $sql = $this->db->query($sql);
    if($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
      return $array;
  }	
		
//Funçao getUsuarios para LISTAR os usuarios
  public function getUsuarios() {
    $array = array();
    if(isset($_GET['id']) && !empty($_GET['id'])) {
      $sql = $this->db->prepare("SELECT usuarios.*, clientes.rsocial, clientes.idcli
      FROM usuarios LEFT JOIN clientes ON clientes.idcli = usuarios.imp_cliente
      WHERE usuarios.id = :id");
      $sql->bindValue(':id', $_GET['id']);
      $sql->execute();			
    }else{	
      $sql = "SELECT * FROM usuarios ORDER BY fscon DESC, usuario ASC";
      $sql = $this->db->query($sql);
    }
    if($sql->rowCount() >0){
      $array = $sql->fetchAll();
    }
      return $array;
  }	
		
// - Funçao getUsuariosPaginado ----------------------------------------------		
  public function getUsuariosPaginado() {
    $array = array();
    $itenspor_pg = 20;
    //Pegar a página atual por GET
    $pg = (isset($_GET['p']))? $_GET['p']:null;
    if(isset($pg)){
      $page = $pg;
    }else{
      $page = 1;
    }

    $total=0;
    $sql= "SELECT COUNT(*) as c FROM usuarios";
    $sql = $this->db->query($sql);
    $sql= $sql->fetch();
    $total= $sql['c'];
    $paginas = $total/$itenspor_pg;
    $_POST['NRP'] = $paginas;
    $_POST['page'] = $page;
		
    $p= 0; $pg=1;
    if(isset($_GET['p']) && !empty($_GET['p'])){
      $pg = addslashes($_GET['p']);
    }
    $p=($pg-1) * $itenspor_pg; 
    $sql="SELECT * FROM usuarios ORDER BY nome ASC LIMIT $p,$itenspor_pg";
    $sql = $this->db->query($sql);
    if($sql->rowCount() > 0){
    $array = $sql->fetchAll();
    }
    return $array;
  }	
		
// - Funçao getUsuariosFS ----------------------------------------------		
  public function getUsuariosFs() {
    $array = array();
    $itenspor_pg = 20;
    //Pegar a página atual por GET
    $pg = (isset($_GET['p']))? $_GET['p']:null;
    if(isset($pg)){
    $page = $pg;
    }else{
    $page = 1;
    }
    $total=0;
    $sql= "SELECT COUNT(*) as c FROM usuarios 
	WHERE ativo = '1' AND (fscon = '1' OR fscon = '2')";
    $sql = $this->db->query($sql);
    $sql= $sql->fetch();
    $total= $sql['c'];
    $paginas = $total/$itenspor_pg;
    $_POST['NRP'] = $paginas;
    $_POST['page'] = $page;
		
    $p= 0; $pg=1;
    if(isset($_GET['p']) && !empty($_GET['p'])){
      $pg = addslashes($_GET['p']);
    }
    $p=($pg-1) * $itenspor_pg;
    $sql="SELECT * FROM usuarios  WHERE ativo = '1' AND (fscon = '1' OR fscon = '2') 
	ORDER BY usuario ASC LIMIT $p,$itenspor_pg";
    $sql = $this->db->query($sql);
    if($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
    return $array;
  }	
		
// - Funçao Engenheiros FS ----------------------------------------------		
  public function getUsuariosEngFs() {
    $array = array();
    $sql="SELECT * FROM usuarios WHERE fscon = '2' AND ativo = '1' ORDER BY nome";
    $sql = $this->db->query($sql);
    if($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
      return $array;
  }	
		
// - Funçao EDIT ---------------------------------------------------------------
public function edit($id, $nome, $usuario, $senha, $nivel, $obra, $ativo, $email, $ramal, $fscon, $local, $celular, $celular2, $pass_email, $imp_cliente, $nascimento, $emergencia) {
    $sql = $this->db->prepare("UPDATE usuarios SET 
    nome = :nome, usuario = :usuario, senha = :senha, nivel = :nivel, obra = :obra, ativo = :ativo, email = :email, ramal = :ramal, fscon = :fscon, local = :local, celular = :celular, celular2 = :celular2, pass_email = :pass_email, imp_cliente = :imp_cliente, nascimento = :nascimento, emergencia = :emergencia WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":usuario", $usuario);
    $sql->bindValue(":senha", base64_encode($senha));
    $sql->bindValue(":nivel", $nivel);
    $sql->bindValue(":obra", $obra);
    $sql->bindValue(":ativo", $ativo);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":ramal", $ramal);
    $sql->bindValue(":fscon", $fscon);
    $sql->bindValue(":local", $local);
    $sql->bindValue(":celular", $celular);
	$sql->bindValue(":celular2", $celular2);
    $sql->bindValue(":pass_email", $pass_email);
    $sql->bindValue(":imp_cliente", $imp_cliente);
	$sql->bindValue(":nascimento", $nascimento);
	$sql->bindValue(":emergencia", $emergencia);
	
    $sql->execute();
  }
		
// - Funçao ADD ----------------------------------------------------------------
  public function add($nome, $usuario, $senha, $nivel, $obra, $ativo, $email, $ramal, $fscon, $local, $celular, $celular2, $pass_email, $imp_cliente, $nascimento, $emergencia) {
// Para evitar duplicidade no nome de usuario
    $dado1 = $nome;
    $dado2 = $usuario;
    $sql="SELECT * FROM usuarios WHERE nome='$dado1' OR usuario='$dado2'";
    $sql = $this->db->query($sql);
    if($sql->rowCount() > 0){
      // O alerta
      echo '<script language="javascript">alert("Ops! Já existe este Nome ou Usuário")</script>';
      // Retorno de pagina
      $var = "<script>javascript:history.back(-1)</script>";
      echo $var;
      exit;
    }else {
    // Volta ao caminho normal

    $sql = $this->db->prepare("INSERT INTO usuarios SET 
    nome = :nome, usuario = :usuario, senha = :senha, nivel = :nivel, obra = :obra, ativo = :ativo, email = :email,  ramal = :ramal, fscon = :fscon, local = :local, celular = :celular, celular2 = :celular2, pass_email = :pass_email, imp_cliente = :imp_cliente, nascimento = :nascimento, emergencia = :emergencia");
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":usuario", $usuario);
    $sql->bindValue(":senha", base64_encode($senha));
    $sql->bindValue(":nivel", $nivel);
		
    /* Obras no form com multipla seleção, para enviar ao banco precisa converter para string
    então: implode no array antes de enviar para gravar no DB 
    if para caso venha um string vazio e não array*/
		
    if(isset($obra) && !empty($obra)){
      $asobras = implode(",", $obra);
    }else { $asobras = $obra; }
    $sql->bindValue(":obra", $asobras);
		
    $sql->bindValue(":ativo", $ativo);
    $sql->bindValue(":email", $email);

    $sql->bindValue(":ramal", $ramal);
    $sql->bindValue(":fscon", $fscon);
    $sql->bindValue(":local", $local);
    $sql->bindValue(":celular", $celular);
	$sql->bindValue(":celular2", $celular2);
    $sql->bindValue(":pass_email", $pass_email);
    $sql->bindValue(":imp_cliente", $imp_cliente);
	$sql->bindValue(":nascimento", $nascimento);
	$sql->bindValue(":emergencia", $emergencia);
    $sql->execute();
    return $this->db->lastInsertId();
    }
  }
		
//Funçao getUsuarios para Ramais
  public function getRamais() {
    $array = array();
    $sql = "SELECT nome, usuario, ramal FROM usuarios WHERE ramal !='0' AND ativo !='0' ORDER BY usuario ASC";
    $sql = $this->db->query($sql);
    if($sql->rowCount() >0){
      $array = $sql->fetchAll();
    }
    return $array;
  }	
	
// - RECUPERA Senha ----------------------------------------------	
  public function doLogin2($email) {
    $sql = $this->db->prepare("SELECT * FROM usuarios 
    WHERE email = :email");
    $sql->bindValue(':email',$email);
    $sql->execute();
    if ($sql->rowCount() > 0){
      $row = $sql->fetch();
      $_SESSION['ccSenha'] = $row['senha'];
      $asenha = base64_decode($row['senha']);
// ---------------------------------------------------------------
      $destinatarios = $email;
/* ## CAMPO 2 ## Informe o nome que será exibido no e-mail do formulário */
      $nomeDestinatario = $row['nome'];

      $usuario = 'walfredo@fsconsultores.com.br';
      $senha = '1756Piracatu';

/*abaixo as veriaveis principais, que devem conter em seu formulario*/
$nome = $row['nome'];
$assunto = "Recuperação de senha";
$_POST['mensagem'] = nl2br('E-mail cadastrado: '. '<br>' . $_POST['email'] . '<br><br>' . 'Senha: '. $asenha);

/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/
include_once("phpMailer/class.phpmailer.php");
//include_once("../../assets/phpmailer/class.phpmailer.php");
$To = $destinatarios;
$Subject = $assunto;
$Message = $_POST['mensagem'];

$Host = 'smtp.'.substr(strstr($usuario, '@'), 1);
$Username = $usuario;
$Password = $senha;
$Port = "587";

$mail = new PHPMailer();
$body = $Message;
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host = $Host; // SMTP server
$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->Port = $Port; // set the SMTP port for the service server
$mail->Username = $Username; // account username
$mail->Password = $Password; // account password

$mail->SetFrom($usuario, $nome);
$mail->Subject = $Subject;
$mail->MsgHTML($body);
$mail->AddAddress($To, "");

if(!$mail->Send()) {
$mensagemRetorno = 'Erro ao enviar e-mail: '. print($mail->ErrorInfo);
} else {
$mensagemRetorno = 'E-mail enviado com sucesso!';
}		
// -----------------------------------
    return true;
    }else{
    return false;
    }
  } // Fecha recupera senha
  
} // Fecha a class Users