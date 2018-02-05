<?php
// a class Recupera extende model que faz a conexao com o DB em /core/model
 	class Agenda extends model {
		
		public function getAgenda() {
        $array = array();
		if(isset($_POST['palavra']) && !empty($_POST['palavra'])) {
		$sql = $this->db->prepare("SELECT * FROM agenda WHERE empresa LIKE CONCAT('%', :var, '%') OR nome LIKE CONCAT('%', :var, '%')  OR categoria LIKE CONCAT('%', :var, '%') OR anotacao LIKE CONCAT('%', :var, '%') ORDER BY empresa");
			
			//$sql = $this->db->prepare("SELECT * FROM agenda WHERE empresa = :empresa");
			$sql->bindValue(':var', $_POST['palavra']);
			$sql->execute();
		}else{
		if(isset($_GET['idag']) && !empty($_GET['idag'])) {
			$sql = $this->db->prepare("SELECT * FROM agenda WHERE idag = :idag");
			$sql->bindValue(':idag', $_GET['idag']);
			$sql->execute();
		}
		else{	
		$sql = "SELECT * FROM agenda ORDER BY empresa";
		$sql = $this->db->query($sql);
		}
		}
		if($sql->rowCount() >0){
			$array = $sql->fetchAll();
			}
		return $array;
    	}	

		// - Funçao getAgendaPaginado ----------------------------------------------		
		public function getAgendaPag() {
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
		$sql= "SELECT COUNT(*) as c FROM agenda";
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
		$p=($pg-1) * $itenspor_pg; // onde 10 é o numero de itens por pagina
		// ORDEM FSCOM DESC (fscon = 1) e nome ASC
		$sql="SELECT * FROM agenda ORDER BY empresa ASC LIMIT $p,$itenspor_pg";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
		$array = $sql->fetchAll();
			}
		return $array;
    	}	
		
		// - Funçao EDIT ---------------------------------------------------------------
		public function edit($idag, $categoria, $empresa, $nome, $telefone, $ramal, $celular, $fax, $email, $site, $anotacao, $endereco, $cep, $cidade, $estado, $maisfalado, $data, $user) {
		$sql = $this->db->prepare("UPDATE agenda SET 
		categoria = :categoria, empresa = :empresa, nome = :nome, telefone = :telefone, ramal = :ramal, celular = :celular, fax = :fax, email = :email, site = :site, anotacao = :anotacao, endereco = :endereco, cep = :cep, cidade = :cidade, estado = :estado, maisfalado = :maisfalado, data = :data, user = :user WHERE idag = :idag");
		$sql->bindValue(":idag", $idag);
		$sql->bindValue(":categoria", $categoria);
		$sql->bindValue(":empresa", $empresa);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":telefone", $telefone);
		$sql->bindValue(":ramal", $ramal);
		$sql->bindValue(":celular", $celular);
		$sql->bindValue(":fax", $fax);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":site", $site);
		$sql->bindValue(":anotacao", $anotacao);
		$sql->bindValue(":endereco", $endereco);
		$sql->bindValue(":cep", $cep);
		$sql->bindValue(":cidade", $cidade);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":maisfalado", $maisfalado);
		$sql->bindValue(":data", $data);
		$sql->bindValue(":user", $user);
		$sql->execute();
		}
		
// - Funçao ADD ----------------------------------------------------------------
		//retirei $id
		public function add($categoria, $empresa, $nome, $telefone, $ramal, $celular, $fax, $email, $site, $anotacao, $endereco, $cep, $cidade, $estado, $maisfalado, $data, $user) {
		// Para evitar duplicidade na agenda
		$dado1 = $empresa;
		$dado2 = $nome;
		$sql="SELECT * FROM agenda WHERE empresa='$dado1' OR nome='$dado2' ";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
		// O alerta
		echo '<script language="javascript">alert("Ops! Já existe esta empresa ou nome no sistema")</script>';
		// Retorno de pagina
		$var = "<script>javascript:history.back(-1)</script>";
		echo $var;
		exit;
		// --------------------------------------------------------
		}else {
		// Volta ao caminho normal

		$sql = $this->db->prepare("INSERT INTO agenda SET 
		categoria = :categoria, empresa = :empresa, nome = :nome, telefone = :telefone, ramal = :ramal, celular = :celular, fax = :fax, email = :email, site = :site, anotacao = :anotacao, endereco = :endereco, cep = :cep, cidade = :cidade, estado = :estado, maisfalado = :maisfalado, data = :data, user = :user");
		$sql->bindValue(":categoria", $categoria);
		$sql->bindValue(":empresa", $empresa);
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":telefone", $telefone);
		$sql->bindValue(":ramal", $ramal);
		$sql->bindValue(":celular", $celular);
		$sql->bindValue(":fax", $fax);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":site", $site);
		$sql->bindValue(":anotacao", $anotacao);
		$sql->bindValue(":endereco", $endereco);
		$sql->bindValue(":cep", $cep);
		$sql->bindValue(":cidade", $cidade);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":maisfalado", $maisfalado);
		$sql->bindValue(":data", $data);
		$sql->bindValue(":user", $user);
		$sql->execute();
		return $this->db->lastInsertId();
		}
		}
	}
	