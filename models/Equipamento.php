<?php
// a class Users extende model que faz a conexao com o DB em /core/model
 	class Equipamento extends model {
		private $eqpInfo;
		
    	public function getEquipamento() {
        $array = array();
		if(isset($_GET['id_eqp']) && !empty($_GET['id_eqp'])) {
			$sql = $this->db->prepare("SELECT * FROM equipa WHERE id_eqp = :id_eqp");
			$sql->bindValue(':id_eqp', $_GET['id_eqp']);
			$sql->execute();
		}else{	
		$sql = "SELECT * FROM equipa ORDER BY patrimonio";
		$sql = $this->db->query($sql);
		}
		if($sql->rowCount() >0){
			$array = $sql->fetchAll();
			}
		return $array;
    	}	
		
		public function getSmb() {
        $array = array();
		
		$sql = "SELECT * FROM equipa ORDER BY smb";
		$sql = $this->db->query($sql);
		$sql->execute();
		
		if($sql->rowCount() >0){
			$array = $sql->fetchAll();
			}
		return $array;
    	}	
		

// - Funçao getEquipaPag ----------------------------------------------		
		public function getEquipaPag() {
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
		$sql= "SELECT COUNT(*) as c FROM equipa";
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
		$sql="SELECT * FROM equipa ORDER BY patrimonio ASC LIMIT $p,$itenspor_pg";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
		$array = $sql->fetchAll();
			}
		return $array;
    	}	

// - Funçao EDIT ---------------------------------------------------------------
		public function editar_eqp($id_eqp, $patrimonio, $nome, $serial, $nf, $smb, $pt_rede, $tipo, $marca, $modelo, $processador, $motherboard, $memoria, $sistema, $data_baixa, $obs_baixa, $local, $suporte) {
		$sql = $this->db->prepare("UPDATE equipa SET 
		patrimonio = :patrimonio, nome = :nome, serial = :serial, nf = :nf, smb = :smb, pt_rede = :pt_rede, tipo = :tipo, marca = :marca, modelo = :modelo, processador = :processador, motherboard = :motherboard, memoria = :memoria, sistema = :sistema, data_baixa = :data_baixa, obs_baixa = :obs_baixa, local = :local, suporte = :suporte WHERE id_eqp = :id_eqp");
		$sql->bindValue(":id_eqp", $id_eqp);
		$sql->bindValue(":patrimonio", $patrimonio);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":serial", $serial);
		$sql->bindValue(":nf", $nf);
		$sql->bindValue(":smb", $smb);
		$sql->bindValue(":pt_rede", $pt_rede);
		$sql->bindValue(":tipo", $tipo);
		$sql->bindValue(":marca", $marca);
		$sql->bindValue(":modelo", $modelo);
		$sql->bindValue(":processador", $processador);
		$sql->bindValue(":motherboard", $motherboard);
		$sql->bindValue(":memoria", $memoria);
		$sql->bindValue(":sistema", $sistema);
		$sql->bindValue(":data_baixa", $data_baixa);
		$sql->bindValue(":obs_baixa", $obs_baixa);
		$sql->bindValue(":local", $local);
		$sql->bindValue(":suporte", $suporte);
		$sql->execute();
		}
		
// - Funçao ADD ----------------------------------------------------------------
		//retirei $id
		public function add_eqp($patrimonio, $nome, $serial, $nf, $smb, $pt_rede, $tipo, $marca, $modelo, $processador, $motherboard, $memoria, $sistema, $data_baixa, $obs_baixa, $local, $suporte) {
			
		// Para evitar duplicidade no número de ptrimonio
		$dado1 = $patrimonio;
		$sql="SELECT * FROM equipa WHERE patrimonio='$dado1'";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
		// O alerta
		echo '<script language="javascript">alert("Ops! Já existe este número de patrimônio")</script>';
		// Retorno de pagina
		$var = "<script>javascript:history.back(-1)</script>";
		echo $var;
		exit;
		// --------------------------------------------------------
		}else {
		// Volta ao caminho normal
			
		$sql = $this->db->prepare("INSERT INTO equipa SET 
		patrimonio = :patrimonio, nome = :nome, serial = :serial, nf = :nf, smb = :smb, pt_rede = :pt_rede, tipo = :tipo, marca = :marca, modelo = :modelo, processador = :processador, motherboard = :motherboard, memoria = :memoria, sistema = :sistema, data_baixa = :data_baixa, obs_baixa = :obs_baixa, local = :local, suporte = :suporte");
		$sql->bindValue(":patrimonio", $patrimonio);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":serial", $serial);
		$sql->bindValue(":nf", $nf);
		$sql->bindValue(":smb", $smb);
		$sql->bindValue(":pt_rede", $pt_rede);
		$sql->bindValue(":tipo", $tipo);
		$sql->bindValue(":marca", $marca);
		$sql->bindValue(":modelo", $modelo);
		$sql->bindValue(":processador", $processador);
		$sql->bindValue(":motherboard", $motherboard);
		$sql->bindValue(":memoria", $memoria);
		$sql->bindValue(":sistema", $sistema);
		$sql->bindValue(":data_baixa", $data_baixa);
		$sql->bindValue(":obs_baixa", $obs_baixa);
		$sql->bindValue(":local", $local);
		$sql->bindValue(":suporte", $suporte);
		$sql->execute();
		return $this->db->lastInsertId();
		}
		}
	}
	?>