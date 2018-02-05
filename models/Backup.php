<?php
// a class Users extende model que faz a conexao com o DB em /core/model
 	class Backup extends model{
		//private $newsInfo;
		
		// - GET GERAL ----------------------------------------------	
		public function todos() {
		$array = array();
		
		$sql = $this->db->prepare("SELECT * FROM backup ORDER BY data DESC LIMIT 0, 52");
        $sql->execute();
		
			if ($sql->rowCount() > 0){
           	$array = $sql->fetchAll();
			}
			return $array;
    	}

// - GET GERAL ----------------------------------------------	
		public function Bkup() {
		$array = array();
 		if(isset($_POST['id']) && !empty($_POST['id'])) {
		$sql = $this->db->prepare("SELECT * FROM backup WHERE id =:id");
		$sql->bindValue(":id", $_POST['id']);
        $sql->execute();
		}else{
			 if(isset($_GET['id']) && !empty($_GET['id'])) {
		$sql = $this->db->prepare("SELECT * FROM backup WHERE id =:id");
		$sql->bindValue(":id", $_GET['id']);
        $sql->execute();
			 }
		}
			if ($sql->rowCount() > 0){
           	$array = $sql->fetchAll();
			}
			return $array;
    	}

		
		// - Funçao ADD ----------------------------------------------------------------
		//retirei $id
		public function add($responsavel, $data) {
		
		$sql = $this->db->prepare("INSERT INTO backup SET 
		responsavel = :responsavel, data = :data");
		$sql->bindValue(":responsavel", $responsavel);
		$sql->bindValue(":data", $data);
		
		$sql->execute();
		return $this->db->lastInsertId();
		}
		
	
		
		// - Funçao EDIT ---------------------------------------------------------------
		public function edit($id, $responsavel, $data) {
			
		$sql = $this->db->prepare("UPDATE backup SET 
		responsavel = :responsavel, data = :data WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":responsavel", $responsavel);
		$sql->bindValue(":data",$data);
		$sql->execute();
		}
		
	}
?>