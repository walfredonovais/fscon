<?php
class Mensagens extends model{
	
// - GET GERAL ----------------------------------------------	
  public function getMsg() {
  $array = array();
    if(isset($_POST['id']) && !empty($_POST['id'])) {
      $sql = $this->db->prepare("SELECT * FROM mensagem WHERE id =:id ORDER BY titulo");
      $sql->bindValue(":obra", $_POST['id']);
      $sql->execute();
    }else {
      if(isset($_GET['obra']) && !empty($_GET['obra'])) {
        $sql = $this->db->prepare("SELECT * FROM mensagem WHERE obra =:obra ORDER BY titulo");
		$sql->bindValue(":obra", $_GET['obra']);
        $sql->execute();
      }
      if ($sql->rowCount() > 0){
        $array = $sql->fetchAll();
      }
        return $array;
     }
  }
  
  // - GET GERAL ----------------------------------------------	
  public function getMsgObra($obra) {
  $array = array();
      $sql = $this->db->prepare("SELECT * FROM mensagem WHERE obra =:obra ORDER BY titulo");
      $sql->bindValue(":obra", $obra);
      $sql->execute();
   
      if ($sql->rowCount() > 0){
        $array = $sql->fetchAll();
      }
        return $array;
     }
	 
	 
	 
	 // - GET GERAL ----------------------------------------------	
  public function getOne() {
  $array = array();
 
      $sql = $this->db->prepare("SELECT * FROM mensagem WHERE id =:id ");
      $sql->bindValue(":id", $_GET['id']);
      $sql->execute();
   
      if ($sql->rowCount() > 0){
        $array = $sql->fetchAll();
      }
        return $array;
     }
	 
	  // - GET Comentario ----------------------------------------------	
  public function getComenta($id_imp) {
  $array = array();

      $sql = $this->db->prepare("SELECT * FROM comenta WHERE id_imp =:id_imp ");
      $sql->bindValue(":id_imp", $id_imp);
      $sql->execute();
   
      if ($sql->rowCount() > 0){
        $array = $sql->fetchAll();
      }
        return $array;
     }
  
	
// - Funçao ADD ----------------------------------------------------------------
  public function add($titulo, $msg, $data, $autor, $obra) {
	 
    $sql = $this->db->prepare("INSERT INTO mensagem SET 
    titulo = :titulo, msg = :msg, data = :data, autor = :autor, obra = :obra");

    $sql->bindValue(":titulo", $titulo);
    $sql->bindValue(":msg", $msg);
    $sql->bindValue(":data", $data);
    $sql->bindValue(":autor", $autor);
    $sql->bindValue(":obra", $obra);
		
    $sql->execute();
    return $this->db->lastInsertId();
  }
			
// - Funçao EDIT ---------------------------------------------------------------
  public function edit($id, $titulo, $msg, $data, $autor, $obra) {
    $sql = $this->db->prepare("UPDATE mensagem SET 
    titulo = :titulo, msg = :msg, data = :data, autor = :autor, obra = :obra WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":titulo", $titulo);
    $sql->bindValue(":msg", $msg);
    $sql->bindValue(":data", $data);
    $sql->bindValue(":autor", $autor);
    $sql->bindValue(":obra", $obra);
    $sql->execute();
  }
 
// - Funçao ADD ----------------------------------------------------------------
  public function add_comenta($id_imp, $comentario, $data, $autor) {
	 
    $sql = $this->db->prepare("INSERT INTO comenta SET 
    id_imp = :id_imp, comentario = :comentario, data = :data, autor = :autor");

    $sql->bindValue(":id_imp", $id_imp);
    $sql->bindValue(":comentario", $comentario);
    $sql->bindValue(":data", $data);
    $sql->bindValue(":autor", $autor);
		
    $sql->execute();
    return $this->db->lastInsertId();
  }
  
}
?>