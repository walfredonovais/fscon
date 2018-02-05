<?php
  class Eventos extends model{	
  // - GET GERAL ----------------------------------------------	
    public function getEvento() {
    $array = array();
    if(isset($_POST['id']) && !empty($_POST['id'])) {
      $sql = $this->db->prepare("SELECT * FROM eventos WHERE id =:id");
      $sql->bindValue(":id", $_POST['id']);
      $sql->execute();
      }else {
        if(isset($_GET['id']) && !empty($_GET['id'])) {
          $sql = $this->db->prepare("SELECT * FROM eventos WHERE id =:id");
          $sql->bindValue(":id", $_GET['id']);
          $sql->execute();
        }
        if ($sql->rowCount() > 0){
          $array = $sql->fetch();
        }
          return $array;
      }
    }

// - GET NOTICIAS PARA HOME ----------------------------------------------	
  public function getEventos() {
    $array = array();
    $sql = $this->db->prepare("SELECT * FROM eventos 
    WHERE start BETWEEN DATE_ADD(NOW(), INTERVAL -2 DAY) AND DATE_ADD(NOW(), INTERVAL 30 DAY)
    ORDER BY start DESC LIMIT 0, 6");
    $sql->execute();
    if ($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
      return $array;
  }
  
  // - GET NOTICIAS PARA HOME ----------------------------------------------	
  public function getBusca() {
	  $palavra=$_POST['palavra'];
    $array = array();
	$sql = $this->db->prepare("SELECT * FROM eventos 
		WHERE title LIKE :palavra");
		$sql->bindValue(':palavra', '%'.$palavra.'%');
    $sql->execute();
    if ($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
      return $array;
  }
		
// - GET Todos ----------------------------------------------	
  public function getTodos() {
    $array = array();

    $sql = $this->db->prepare("SELECT * FROM eventos 
    WHERE start BETWEEN DATE_ADD(NOW(), INTERVAL -60 DAY) AND DATE_ADD(NOW(), INTERVAL 90 DAY)
    ORDER BY start DESC");
    $sql->execute();
		
    if ($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
      return $array;
  }
		
// - Funçao ADD ----------------------------------------------------------------
  public function add($title, $start, $autor, $nota) {
    $sql = $this->db->prepare("INSERT INTO eventos SET 
    title = :title, start = :start, autor = :autor, nota = :nota");
    $sql->bindValue(":title", $title);
    $sql->bindValue(":start", $start);
    $sql->bindValue(":autor", $autor);
    $sql->bindValue(":nota", $nota);
		
    $sql->execute();
    return $this->db->lastInsertId();
  }
		
// - Funçao EDIT ---------------------------------------------------------------
  public function editEventos($id, $title, $start, $autor, $nota, $altera) {
    $sql = $this->db->prepare("UPDATE eventos SET 
    title = :title, start = :start, autor = :autor, nota = :nota, altera = :altera WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":title", $title);
    $sql->bindValue(":start", $start);
    $sql->bindValue(":autor", $autor);
    $sql->bindValue(":nota", $nota);
	$sql->bindValue(":altera", $altera);
    $sql->execute();
  }
	
}

?>