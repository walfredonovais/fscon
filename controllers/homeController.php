<?php
class homeController extends controller {

  public function __construct() {
    parent::__construct();
		
      $u = new Users();
     if($u->isLogged() == false) {
        header("Location:".BASE_URL."/login");
      exit;
      }
  }
	
  public function index() {
    $dados = array();  
    $u = new Users();
    $c = new Clientes();
    $niver = new Users();
    $noticias = new Noticias();
    $quali = new Noticias();
    $eventos = new Eventos(); 
    $notifica = new Notifica(); 
	
    $u->setLoggedUser();
	
    $data['clientes'] = $c->getAtivosObras();
    $data['niver'] = $niver->getNiver();
    $data['noticias'] = $noticias->getNoticias();
    $data['fsnoticias'] = $noticias->getFSNoticias();
    $data['eventos'] = $eventos->getEventos();
    $data['qualidade'] = $quali->getQualidade();
    $data['notifica'] = $notifica->getNotif();
	
    // Para nível 4
    $str = $_SESSION['ccObras'];
    $arr = explode(',', $str); // transforma a string em array.
    $obras = new Obras(); // Aqui carrega o model
    $data['outrasobras'] = $obras->getOutrasObras($str);
		
    // bloqueia acesso ao nivel 4
		if($_SESSION['ccNivel'] < 4){
		echo '<script language="javascript">alert("Ops! acesso negado")</script>';
		// Retorno de pagina
		$var = "<script>javascript:history.back(-1)</script>";
		echo $var;
		exit; }
        $this->loadTemplate('home', $data);
    }
	
	//para carregar uma pagina simples: http://localhost/fscon/home/intranet
		public function intranet() {
    $dados = array();
    $this->loadTemplate2('intranet', $dados);
    }
} // Fecha home controller