<?php
  class Notifica extends model{	
  // - GET GERAL ----------------------------------------------	
    public function getNotifica() {
    $array = array();
    if(isset($_POST['usuario']) && !empty($_POST['usuario'])) {
      $sql = $this->db->prepare("SELECT * FROM notifica WHERE usuario =:usuario");
      $sql->bindValue(":usuario", $_POST['usuario']);
      $sql->execute();
      }else {
        if(isset($_GET['id']) && !empty($_GET['id'])) {
          $sql = $this->db->prepare("SELECT * FROM notifica WHERE id =:id");
          $sql->bindValue(":id", $_GET['id']);
          $sql->execute();
        }
        if ($sql->rowCount() > 0){
          $array = $sql->fetch();
        }
          return $array;
      }
    }

// - GET NOTIFICACOES ----------------------------------------------	
  public function getNotificacao() {
    $array = array();
    $sql = $this->db->prepare("SELECT * FROM notifica 
    WHERE data BETWEEN DATE_ADD(NOW(), INTERVAL -2 DAY) AND DATE_ADD(NOW(), INTERVAL 30 DAY)
    ORDER BY data DESC LIMIT 0, 8");
    $sql->execute();
    if ($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
      return $array;
  }
  
  // - GET NOTIFICACOES ----------------------------------------------	
  public function getNotificacoes() {
    $array = array();
    $sql = $this->db->prepare("SELECT * FROM notifica 
    ORDER BY data DESC");
    $sql->execute();
    if ($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
      return $array;
  }
  
   // - GET NOTIFICACOES ----------------------------------------------	
  public function getNoti() {
    $array = array();
    $usuario=$_GET['usuario'];
    $sql = $this->db->prepare("SELECT * FROM notifica 
      WHERE usuario = :usuario
      ORDER BY data DESC");
    $sql->bindValue(":usuario", $usuario);
    $sql->execute();
    if ($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
      return $array;
    }
  
  // - GET NOTIFICACOES ----------------------------------------------	
  public function getNotif() {
    $array = array();
	$usuario=$_SESSION['ccNome'];

    $sql = $this->db->prepare("SELECT * FROM notifica 
    WHERE usuario = :usuario AND ativo = :ativo AND data BETWEEN DATE_ADD(NOW(), INTERVAL -2 DAY) AND DATE_ADD(NOW(), INTERVAL 30 DAY)
    ORDER BY data DESC LIMIT 0, 8");
	$ativo = "1";
	$sql->bindValue(":usuario", $usuario);
	$sql->bindValue(":ativo", $ativo);
    $sql->execute();
    if ($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
      return $array;
  }
		
		
// - Funçao ADD ----------------------------------------------------------------
  public function addNotifica($usuario, $titulo, $alerta, $data, $ativo, $autor) {
    $sql = $this->db->prepare("INSERT INTO notifica SET 
    usuario = :usuario, titulo = :titulo, alerta = :alerta, data = :data, ativo = :ativo, autor = :autor");
    $sql->bindValue(":usuario", $usuario);
    $sql->bindValue(":titulo", $titulo);
	$sql->bindValue(":alerta", $alerta);
	$sql->bindValue(":data", $data);
	$sql->bindValue(":ativo", $ativo);
	$sql->bindValue(":autor", $autor);
    $sql->execute();
    return $this->db->lastInsertId();

  }
		
// - Funçao EDIT ---------------------------------------------------------------
  public function editNotifica($id, $usuario, $titulo, $alerta, $data, $ativo, $autor) {
    $sql = $this->db->prepare("UPDATE notifica SET 
	usuario = :usuario, titulo = :titulo, alerta = :alerta, data = :data, ativo = :ativo, autor = :autor  WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":usuario", $usuario);
	$sql->bindValue(":titulo", $titulo);
    $sql->bindValue(":alerta", $alerta);
    $sql->bindValue(":data", $data);
	$sql->bindValue(":ativo", $ativo);
	$sql->bindValue(":autor", $autor);
    $sql->execute();
	
  }
	
}

?>