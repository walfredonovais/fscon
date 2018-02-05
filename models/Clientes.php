<?php
class Clientes extends model {
  private $clienteInfo;
	
    public function getCliente() {
    $array = array();
      if(isset($_GET['idcli']) && !empty($_GET['idcli'])) {
        $sql = $this->db->prepare("SELECT * FROM clientes WHERE idcli = :idcli");
        $sql->bindValue(':idcli', $_GET['idcli']);
        $sql->execute();
		
      }else{	
        $sql = "SELECT * FROM clientes ORDER BY rsocial";
        $sql = $this->db->query($sql);
      }
      if($sql->rowCount() >0){
        $array = $sql->fetchAll();
      }
        return $array;
      }	
	  
	  
	  
    public function getAtivosObras() {
      $array = array();
      $sql = $this->db->prepare("SELECT clientes.rsocial, clientes.idcli, clientes.logo, obras.id_imp, obras.obra, obras.idobra
      FROM clientes  LEFT JOIN obras ON obras.id_imp = clientes.idcli
      WHERE obras.ativo = 1 ORDER BY clientes.rsocial"); 
      $sql->execute();
			
      if($sql->rowCount() >0){
        $array = $sql->fetchAll();
      }
        return $array;
      }	
	  
	  // - Funçao getUsuariosPaginado ----------------------------------------------		
		public function getClientesPag() {
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
		$sql= "SELECT COUNT(*) as c FROM clientes";
		$sql = $this->db->query($sql);
		$sql= $sql->fetch();
		$total= $sql['c'];
		$paginas = $total/$itenspor_pg;
		$_POST['NRP'] = $paginas;
		$_POST['page'] = $page;
		$_POST['total_pg'] = $total;
		
		$p= 0; $pg=1;
		if(isset($_GET['p']) && !empty($_GET['p'])){
			$pg = addslashes($_GET['p']);
		}
		$p=($pg-1) * $itenspor_pg; // onde 10 é o numero de itens por pagina
		// ORDEM FSCOM DESC (fscon = 1) e nome ASC
		$sql="SELECT * FROM clientes ORDER BY rsocial ASC LIMIT $p,$itenspor_pg";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
		$array = $sql->fetchAll();
			}
		return $array;
    	}	
		
// - Funçao EDIT ---------------------------------------------------------------
		public function edit($idcli, $rsocial, $cnpj, $insc_est, $insc_munic, $contato, $contato2, $telefone, $celular, $fax, $email, $email2, $site, $endereco, $complemento, $bairro, $cep, $cidade, $estado, $logo) {
		$sql = $this->db->prepare("UPDATE clientes SET 
		rsocial = :rsocial, cnpj = :cnpj, insc_est = :insc_est, insc_munic = :insc_munic, contato = :contato, contato2 = :contato2, telefone = :telefone, celular = :celular, fax = :fax, email = :email, email2 = :email2, site = :site, endereco = :endereco, complemento = :complemento, bairro = :bairro, cep = :cep, cidade = :cidade, estado = :estado, logo = :logo WHERE idcli = :idcli");
		$sql->bindValue(":idcli", $idcli);
		$sql->bindValue(":rsocial", $rsocial);
		$sql->bindValue(":cnpj", $cnpj);
		$sql->bindValue(":insc_est", $insc_est);
		$sql->bindValue(":insc_munic", $insc_munic);
		$sql->bindValue(":contato", $contato);
		$sql->bindValue(":contato2", $contato2);
		$sql->bindValue(":telefone", $telefone);
		$sql->bindValue(":celular", $celular);
		$sql->bindValue(":fax", $fax);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":email2", $email2);
		$sql->bindValue(":site", $site);
		$sql->bindValue(":endereco", $endereco);
		$sql->bindValue(":complemento", $complemento);
		$sql->bindValue(":bairro", $bairro);
		$sql->bindValue(":cep", $cep);
		$sql->bindValue(":cidade", $cidade);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":logo", $logo);
		$sql->execute();
		}
		
// - Funçao ADD ----------------------------------------------------------------
		//retirei $id
		public function add($rsocial, $cnpj, $insc_est, $insc_munic, $contato, $contato2, $telefone, $celular, $fax, $email, $email2, $site, $endereco, $complemento, $bairro, $cep, $cidade, $estado, $logo) {
		
		// Para evitar duplicidade no lancamento
		$dado1 = $rsocial;
		$sql="SELECT * FROM clientes WHERE rsocial='$dado1' ";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
		// O alerta
		echo '<script language="javascript">alert("Ops! Já existe um lançamento com esta Razão Social")</script>';
		// Retorno de pagina
		$var = "<script>javascript:history.back(-1)</script>";
		echo $var;
		exit;
		// --------------------------------------------------------
		
		// Volta ao caminho normal
		}else {	
			
		$sql = $this->db->prepare("INSERT INTO clientes SET 
		rsocial = :rsocial, cnpj = :cnpj, insc_est = :insc_est, insc_munic = :insc_munic, contato = :contato, contato2 = :contato2, telefone = :telefone, celular = :celular, fax = :fax, email = :email, email2 = :email2, site = :site, endereco = :endereco, complemento = :complemento, bairro = :bairro, cep = :cep, cidade = :cidade, estado = :estado, logo = :logo");
		$sql->bindValue(":rsocial", $rsocial);
		$sql->bindValue(":cnpj", $cnpj);
		$sql->bindValue(":insc_est", $insc_est);
		$sql->bindValue(":insc_munic", $insc_munic);
		$sql->bindValue(":contato", $contato);
		$sql->bindValue(":contato2", $contato2);
		$sql->bindValue(":telefone", $telefone);
		$sql->bindValue(":celular", $celular);
		$sql->bindValue(":fax", $fax);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":email2", $email2);
		$sql->bindValue(":site", $site);
		$sql->bindValue(":endereco", $endereco);
		$sql->bindValue(":complemento", $complemento);
		$sql->bindValue(":bairro", $bairro);
		$sql->bindValue(":cep", $cep);
		$sql->bindValue(":cidade", $cidade);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":logo", $logo);
		$sql->execute();
		return $this->db->lastInsertId();
		}
		}
        
}
?>