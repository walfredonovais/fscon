<?php class Obras extends model {
  private $obrasInfo;
  
 // Busca em duas tabelas usando dois models diferentes - Obras e Clientes, Left Join
		public function getObras() {
        $array = array();
		if(isset($_GET['idobra']) && !empty($_GET['idobra'])) {
			$sql = $this->db->prepare("SELECT obras.*, clientes.rsocial
			FROM obras LEFT JOIN clientes ON clientes.idcli = obras.id_imp
			WHERE obras.idobra = :idobra");
		$sql->bindValue(":idobra", $_GET['idobra']);
		$sql->execute();

		}else{	
		$sql = "SELECT obras.*, clientes.rsocial
			FROM obras LEFT JOIN clientes ON clientes.idcli = obras.id_imp 
			ORDER BY obra";
		$sql = $this->db->query($sql);
		}
		if($sql->rowCount() >0){
			$array = $sql->fetchAll();
			}
		return $array;
    	}	
  
  
    public function getOutrasObras($str) {
    $array = array();
		
    $sql = $this->db->prepare("SELECT obras.*, clientes.rsocial
    FROM obras LEFT JOIN clientes ON clientes.idcli = obras.id_imp
    WHERE ativo = 1 AND idobra IN(".$str.")");
		
    $sql->execute();

    if($sql->rowCount() >0){
      $array = $sql->fetchAll();
    }		
    return $array;
		
    }	
	
	// GET PAGINADO
		public function getObrasPag() {
        $array = array();
		
		if(isset($_GET['it']) && !empty($_GET['it'])) {
			$obr=$_GET['it']; }else
			{$obr='la';}

		$itenspor_pg = 20;
		//Pegar a página atual por GET
		$pg = (isset($_GET['p']))? $_GET['p']:null;
		if(isset($pg)){
		$page = $pg;
		}else{
		$page = 1;
		}
		$total=0;
		if($obr == 'lt'){
			$limite= '';}else { $limite= 'WHERE ativo = 1';}
			
		$sql= "SELECT COUNT(*) as o FROM obras $limite";
		
		$sql = $this->db->query($sql);
		$sql= $sql->fetch();
		$total= $sql['o'];
		$paginas = $total/$itenspor_pg;
		$_POST['NRP'] = $paginas;
		$_POST['page'] = $page;
		
		$p= 0; $pg=1;
		if(isset($_GET['p']) && !empty($_GET['p'])){
			$pg = addslashes($_GET['p']);
		}
		
		$p=($pg-1) * $itenspor_pg; 
		
		$sql="SELECT obras.*, clientes.rsocial
        FROM obras LEFT JOIN clientes ON clientes.idcli = obras.id_imp
        $limite ORDER BY obra ASC LIMIT $p,$itenspor_pg";
		$sql = $this->db->query($sql);
		
		if($sql->rowCount() > 0){
		$array = $sql->fetchAll();
			}
		return $array;
    	}	
	
    public function getAtivas() {
    $array = array();
      if(isset($_GET['idobra']) && !empty($_GET['idobra'])) {
        $sql = $this->db->prepare("SELECT obras.*, clientes.rsocial, clientes.logo
          FROM obras LEFT JOIN clientes ON clientes.idcli = obras.id_imp
          WHERE obras.idobra = :idobra");
        $sql->bindValue(":idobra", $_GET['idobra']);
        $sql->execute();
		}else{	
		$sql = "SELECT obras.*, clientes.rsocial
          FROM obras LEFT JOIN clientes ON clientes.idcli = obras.id_imp
          WHERE ativo = 1 ORDER BY obra";
		$sql = $this->db->query($sql);
		}
		if($sql->rowCount() >0){
			$array = $sql->fetchAll();
			}
		return $array;
    	}	
		
		//- Funçao ADD ---------------------------------------------------------------
		public function addObras($id_imp, $obra, $cnpj_obra, $ie_obra, $im_obra, $comp_obra, $tel_obra, $cel_obra, $fax_obra, $end_obra, $cep_obra, $bairro_obra, $cid_obra, $est_obra, $escopo, 
			$area, $ini_cont, $term_cont, $ini_obra, $term_obra, $descricao, $contatos, $ativo, $prazo, $engobra, $engfs, $meta1, $orctotal, $financeiro, $data_entrega, $observa) {
				
		// Para evitar duplicidade de obras
		$dado1 = $obra;
		$sql="SELECT * FROM obras WHERE obra='$dado1'";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
		// O alerta
		echo '<script language="javascript">alert("Ops! Já existe esta obra no sistema")</script>';
		// Retorno de pagina
		$var = "<script>javascript:history.back(-1)</script>";
		echo $var;
		exit;
		// --------------------------------------------------------
		}else {
		// Volta ao caminho normal
				
		$sql = $this->db->prepare("INSERT INTO obras SET  id_imp = :id_imp, obra = :obra, cnpj_obra = :cnpj_obra, ie_obra = :ie_obra, im_obra = :im_obra, comp_obra = :comp_obra, tel_obra = :tel_obra, cel_obra = :cel_obra, fax_obra = :fax_obra, end_obra = :end_obra, cep_obra = :cep_obra, bairro_obra = :bairro_obra, cid_obra = :cid_obra, est_obra = :est_obra, escopo = :escopo, area = :area, ini_cont = :ini_cont, term_cont = :term_cont, ini_obra = :ini_obra, term_obra = :term_obra, descricao = :descricao, contatos = :contatos, ativo = :ativo, prazo = :prazo, engobra = :engobra, engfs = :engfs, meta1 = :meta1, orctotal = :orctotal, financeiro = :financeiro, data_entrega = :data_entrega, observa = :observa");	
		//$sql->bindValue(":idobra", $idobra);
		$sql->bindValue(":id_imp", $id_imp);
		$sql->bindValue(":obra", $obra);
		$sql->bindValue(":cnpj_obra", $cnpj_obra);
		$sql->bindValue(":ie_obra", $ie_obra);
		$sql->bindValue(":im_obra", $im_obra);
		$sql->bindValue(":comp_obra", $comp_obra);
		$sql->bindValue(":tel_obra", $tel_obra);
		$sql->bindValue(":cel_obra", $cel_obra);
		$sql->bindValue(":fax_obra", $fax_obra);
		$sql->bindValue(":end_obra", $end_obra);
		$sql->bindValue(":cep_obra", $cep_obra);
		$sql->bindValue(":bairro_obra", $bairro_obra);
		$sql->bindValue(":cid_obra", $cid_obra);
		$sql->bindValue(":est_obra", $est_obra);
		$sql->bindValue(":escopo", $escopo);
		$sql->bindValue(":area", $area);
		$sql->bindValue(":ini_cont", $ini_cont);
		$sql->bindValue(":term_cont", $term_cont);
		$sql->bindValue(":ini_obra", $ini_obra);
		$sql->bindValue(":term_obra", $term_obra);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":contatos", $contatos);
		$sql->bindValue(":ativo", $ativo);
		$sql->bindValue(":prazo", $prazo);
		$sql->bindValue(":engobra", $engobra);
		$sql->bindValue(":engfs", $engfs);
		$sql->bindValue(":meta1", $meta1);
		$sql->bindValue(":orctotal", $orctotal);
		$sql->bindValue(":financeiro", $financeiro);
		$sql->bindValue(":data_entrega", $data_entrega);
		$sql->bindValue(":observa", $observa);
		$sql->execute();
		return $this->db->lastInsertId();
			}
			}
		
		// - Funçao EDIT ---------------------------------------------------------------
		public function editarObras($idobra, $id_imp, $obra, $cnpj_obra, $ie_obra, $im_obra, $comp_obra, $tel_obra, $cel_obra, $fax_obra, $end_obra, $cep_obra, $bairro_obra, $cid_obra, $est_obra, $escopo, 
			$area, $ini_cont, $term_cont, $ini_obra, $term_obra, $descricao, $contatos, $ativo, $prazo, $engobra, $engfs, $meta1, $orctotal, $financeiro, $data_entrega, $observa) {
		$sql = $this->db->prepare("UPDATE obras SET id_imp = :id_imp, obra = :obra, cnpj_obra = :cnpj_obra, ie_obra = :ie_obra, im_obra = :im_obra, comp_obra = :comp_obra, tel_obra = :tel_obra, cel_obra = :cel_obra, fax_obra = :fax_obra, end_obra = :end_obra, cep_obra = :cep_obra, bairro_obra = :bairro_obra, cid_obra = :cid_obra, est_obra = :est_obra, escopo = :escopo, area = :area, ini_cont = :ini_cont, term_cont = :term_cont, ini_obra = :ini_obra, term_obra = :term_obra, descricao = :descricao, contatos = :contatos, ativo = :ativo, prazo = :prazo, engobra = :engobra, engfs = :engfs, meta1 = :meta1, orctotal = :orctotal, financeiro = :financeiro, data_entrega = :data_entrega, observa = :observa WHERE idobra = :idobra");
		
		$sql->bindValue(":idobra", $idobra);
		$sql->bindValue(":id_imp", $id_imp);
		$sql->bindValue(":obra", $obra);
		$sql->bindValue(":cnpj_obra", $cnpj_obra);
		$sql->bindValue(":ie_obra", $ie_obra);
		$sql->bindValue(":im_obra", $im_obra);
		$sql->bindValue(":comp_obra", $comp_obra);
		$sql->bindValue(":tel_obra", $tel_obra);
		$sql->bindValue(":cel_obra", $cel_obra);
		$sql->bindValue(":fax_obra", $fax_obra);
		$sql->bindValue(":end_obra", $end_obra);
		$sql->bindValue(":cep_obra", $cep_obra);
		$sql->bindValue(":bairro_obra", $bairro_obra);
		$sql->bindValue(":cid_obra", $cid_obra);
		$sql->bindValue(":est_obra", $est_obra);
		$sql->bindValue(":escopo", $escopo);
		$sql->bindValue(":area", $area);
		$sql->bindValue(":ini_cont", $ini_cont);
		$sql->bindValue(":term_cont", $term_cont);
		$sql->bindValue(":ini_obra", $ini_obra);
		$sql->bindValue(":term_obra", $term_obra);
		$sql->bindValue(":descricao", $descricao);
		$sql->bindValue(":contatos", $contatos);
		$sql->bindValue(":ativo", $ativo);
		$sql->bindValue(":prazo", $prazo);
		$sql->bindValue(":engobra", $engobra);
		$sql->bindValue(":engfs", $engfs);
		$sql->bindValue(":meta1", $meta1);
		$sql->bindValue(":orctotal", $orctotal);
		$sql->bindValue(":financeiro", $financeiro);
		$sql->bindValue(":data_entrega", $data_entrega);
		$sql->bindValue(":observa", $observa);
		$sql->execute();
			}
}
?>