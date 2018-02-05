<?php
class Noticias extends model{
	
// - GET GERAL ----------------------------------------------	
  public function getNote() {
  $array = array();
    if(isset($_POST['id']) && !empty($_POST['id'])) {
      $sql = $this->db->prepare("SELECT * FROM news WHERE id =:id");
      $sql->bindValue(":id", $_POST['id']);
      $sql->execute();
    }else {
      if(isset($_GET['id']) && !empty($_GET['id'])) {
        $sql = $this->db->prepare("SELECT * FROM news WHERE id =:id");
		$sql->bindValue(":id", $_GET['id']);
        $sql->execute();
      }
      if ($sql->rowCount() > 0){
        $array = $sql->fetchAll();
      }
        return $array;
     }
  }

// - GET NOTICIAS PARA HOME ----------------------------------------------	
  public function getNoticias() {
	
    $array = array();
    $sql = $this->db->prepare("SELECT * FROM news 
    ORDER BY ordem DESC, data DESC, hora DESC LIMIT 0, 6");
    $sql->execute();
    if ($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
      return $array;
  }
 
// - GET QUALIDADE ----------------------------------------------	
  public function getQualidade() {
    $array = array();
    $sql = $this->db->prepare("SELECT * FROM qualidade 
    ORDER BY id ASC");
    $sql->execute();
    if ($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
      return $array;
  }
  
// - A NOTICIA DESTAQUE HOME----------------------------------------------	
  public function getFSNoticias() {
    $array = array();
    $data = date('Y-m-d');
    $diasemana = date('w', strtotime($data));
    $tag="FS0".$diasemana;		
    $sql = $this->db->prepare("SELECT * FROM news 
    WHERE tag =:tag");
    $sql->bindValue(":tag", $tag);
    $sql->execute();
    if ($sql->rowCount() > 0){
      $array = $sql->fetch();
    }
      return $array;
  }
  
// - Busca TAG Notícias  ----------------------------------------------	FS0
  public function getTag() {
    $array = array();
		$tag=$_POST['palavra'];
		$local=$_POST['local'];
	
		$sql = $this->db->prepare("SELECT * FROM news 
		WHERE local =:local AND  tag LIKE :tag");
		$sql->bindValue(":local", $local);
		$sql->bindValue(':tag', '%'.$tag.'%');
        $sql->execute();
			if ($sql->rowCount() > 0){
           	$array = $sql->fetchAll();
			}
			return $array;
    	}
 
// - GET TODAS NOTICIAS PARA HOME ----------------------------------------------	
  public function getNot() {
    $array = array();
    $local=$_GET['local'];
    if(isset($_GET['tudo']) && !empty($_GET['tudo'])) {
      $sql = $this->db->prepare("SELECT * FROM news 
      WHERE local =:local
      ORDER BY ordem DESC, data DESC, hora DESC");
    }else{
      $sql = $this->db->prepare("SELECT * FROM news 
      WHERE local =:local AND (data BETWEEN DATE_ADD(NOW(), INTERVAL -60 DAY) AND NOW())
      ORDER BY ordem DESC, data DESC, hora DESC");
    }
    $sql->bindValue(":local", $local);
    $sql->execute();
    if ($sql->rowCount() > 0){
      $array = $sql->fetchAll();
    }
      return $array;
    }
	
// - Funçao ADD ----------------------------------------------------------------
  public function add_News($titulo, $noticia, $data, $hora, $ordem, $tag, $autor, $local) {
    $sql = $this->db->prepare("INSERT INTO news SET 
    titulo = :titulo, noticia = :noticia, data = :data, hora = :hora, tag = :tag, 
	autor = :autor, local = :local");

    $sql->bindValue(":titulo", $titulo);
    $sql->bindValue(":noticia", $noticia);
    $sql->bindValue(":data", $data);
    $sql->bindValue(":hora", $hora);
    $sql->bindValue(":tag", $tag);
    $sql->bindValue(":autor", $autor);
    $sql->bindValue(":local", $local);
		
    $sql->execute();
    return $this->db->lastInsertId();
  }
			
// - Funçao EDIT ---------------------------------------------------------------
  public function news_edit($id, $titulo, $noticia, $data, $hora, $ordem, $tag, $autor, $local) {
    $sql = $this->db->prepare("UPDATE news SET 
    titulo = :titulo, noticia = :noticia, data = :data, hora = :hora, ordem = :ordem, tag = :tag, 
	autor = :autor, local = :local WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":titulo", $titulo);
    $sql->bindValue(":noticia", $noticia);
    $sql->bindValue(":data", $data);
    $sql->bindValue(":hora", $hora);
    $sql->bindValue(":ordem", $ordem);
    $sql->bindValue(":tag", $tag);
    $sql->bindValue(":autor", $autor);
    $sql->bindValue(":local", $local);
    $sql->execute();
  }
 
}
?>