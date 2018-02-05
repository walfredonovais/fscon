<?php
class loginController  extends controller {
  public function index() {
    $data = array();
	
	if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
      $usuario = addslashes($_POST['usuario']);
      $pass = addslashes($_POST['password']);

      $u = new Users(); // Chama o model Users
      // O LOGUIN
      if($u->doLogin($usuario, $pass)){
		  
   
        if($_SESSION['ccNivel'] < 4){	
          header("Location: ".BASE_URL."/relatorio/obra_rel");
          exit;
        }else{
          header("Location: ".BASE_URL."/home"); }
          exit;
        }else{
        // ERRO NO LOGUIN
            $data['error'] = 'Usuario e/ou senha inválidos!';
          }
        }else{
		// RECUPERACAO DE SENHA	
          if(isset($_POST['email']) && !empty($_POST['email'])){
          $email = addslashes($_POST['email']);
          $u = new Users(); // Chama o model Users
          if($u->doLogin2($email)){
            header("Location: ".BASE_URL);
          }
		// ERRO NA RECUPERACAO
           $data['error'] = 'O email digitado não corresponde a um email no banco de dados!';
          }
		}
		// VOLTA A TELA DE LOGUIN
       $this->loadTemplate('login', $data);   
    }

// LOGOUT
public function logout() {
  $u = new Users();
  $u->logout();
  header("Location: http://www.fsconsultores.com.br");
  }
}
?>