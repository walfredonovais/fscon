<?php
  // a class Relatorio extende model que faz a conexao com o DB em /core/model
  class Relatorio extends model {
      // Controla as ações dos botões NEXT BACK -----------------------------------------------------------
      public function getHistbacknext() {
        $array = array(); // define a variavel como array vazio
		// Carrega as variáveis do form next/back
		$imp_obra=$_POST['imp_obra'];
		$id_hist=$_POST['id_hist'];
		$reordem=$_POST['reordem'];
			
			// CRIANDO AS VARIAVEIS DE BUSCA
			// Verifica se o user acionou back ou next
			if((isset($_POST['back']) && !empty($_POST['back'])) 
			OR (isset($_POST['next']) && !empty($_POST['next'])) ) {	
			// Verifica se o campo reordem nao é NULL --------------------------------------
			if((isset($_POST['reordem']) && !empty($_POST['reordem']))) {
				// Cria as variáveis para a busca com o reordem
				if(isset($_POST['back']) && !empty($_POST['back'])) {
					$var = 'historico.imp_obra = :imp_obra AND historico.reordem < :reordem';
					$var2 = 'reordem DESC LIMIT 1';}
				if(isset($_POST['next']) && !empty($_POST['next'])) {
					$var = 'historico.imp_obra = :imp_obra AND historico.reordem > :reordem';
					$var2 = 'reordem ASC LIMIT 1'; }
					
					$sql = $this->db->prepare("SELECT historico.*, obras.obra, obras.prazo, obras.orctotal, obras.meta1, obras.engobra, obras.engfs, obras.financeiro, clientes.rsocial, clientes.idcli,
			FROM historico LEFT JOIN obras ON historico.imp_obra = obras.idobra LEFT JOIN clientes ON obras.id_imp = clientes.idcli
			WHERE $var ORDER BY $var2");
			
			$sql->bindValue(":imp_obra", $imp_obra);
			if((isset($_POST['reordem']) && !empty($_POST['reordem']))) {
			$sql->bindValue(":reordem", $reordem); }
			$sql->execute();
		//-----------------------------------------------------------
				} else{
					
// Reordem é NULL cria as variaveis para a busca com id_hist  ------------------------
					
					if(isset($_POST['back']) && !empty($_POST['back'])) {
					$var = 'historico.imp_obra = :imp_obra AND historico.id_hist < :id_hist';
					$var2 = 'id_hist DESC LIMIT 1';}
					
				if(isset($_POST['next']) && !empty($_POST['next'])) {
					$var = 'historico.imp_obra = :imp_obra AND historico.id_hist > :id_hist';
					$var2 = 'id_hist ASC LIMIT 1'; }
					
					$sql = $this->db->prepare("SELECT historico.*, obras.obra, obras.prazo, obras.orctotal, obras.meta1, obras.engobra, obras.engfs, obras.financeiro, clientes.rsocial, clientes.idcli
			FROM historico LEFT JOIN obras ON historico.imp_obra = obras.idobra LEFT JOIN clientes ON obras.id_imp = clientes.idcli
			WHERE $var  ORDER BY $var2");
				
			$sql->bindValue(":imp_obra", $imp_obra);
			$sql->bindValue(":id_hist", $id_hist);
			
			
			$sql->execute();
			}
			}
			
		if($sql->rowCount() >0){
			$array = $sql->fetch();
			} else { 
			return false; 
			exit;
			}
			// ATRASO OU NAO - CRIA UM NOVO ELEMENTO NO ARRAY: STATUS
			if($array['meta2'] == '0000-00-00') {
			$Inicio = strtotime($array['meta1']); } else { $Inicio = strtotime($array['meta2']); }
			$Fim = strtotime($array['corrente']);
			if($Fim <= $Inicio){ $array['status'] = "adiantado"; }else { $array['status'] = "atraso"; }

		// RETORNO O ARRAY DE getHistbacknext
		return $array;
		}
		
// RETORNOU FALSE EM getHistbacknext O GET vem de editar ------------------------------------------------
		public function getHist() { 
        $array = array();
		if(isset($_POST['id_hist']) && !empty($_POST['id_hist']) OR isset($_GET['id_hist']) && !empty($_GET['id_hist']) ) {
			$sql = $this->db->prepare("SELECT historico.*, obras.obra, obras.prazo, obras.orctotal, obras.meta1, obras.engobra, obras.engfs, obras.financeiro, clientes.rsocial, clientes.idcli
			FROM historico LEFT JOIN obras ON historico.imp_obra = obras.idobra LEFT JOIN clientes ON obras.id_imp = clientes.idcli
			WHERE historico.id_hist = :id_hist");
			
			if(isset($_POST['id_hist']) && !empty($_POST['id_hist'])){
		$sql->bindValue(":id_hist", $_POST['id_hist']); }
		if(isset($_GET['id_hist']) && !empty($_GET['id_hist'])){
		$sql->bindValue(":id_hist", $_GET['id_hist']); }
		$sql->execute();
			}
		
			$array = $sql->fetch();
			
			// ATRASO OU NAO - CRIA UM NOVO ELEMENTO NO ARRAY: STATUS
			if($array['meta2'] == '0000-00-00') {
			$Inicio = strtotime($array['meta1']); } else { $Inicio = strtotime($array['meta2']); }
			$Fim = strtotime($array['corrente']);
			if($Fim <= $Inicio){ $array['status'] = "adiantado"; }else { $array['status'] = "atraso"; }
			
			// RETORNO O ARRAY DE getHist
			return $array;
			exit;
		}
		
// --------------------------------------------------------------------		
		/* AQUI A REQUISIÇAO FEITA NA HOME COM IDOBRA NAO USA FOREACH */
		public function getHistorico() {
        $array = array();
		if(isset($_GET['idobra']) && !empty($_GET['idobra'])) {
			$sql = $this->db->prepare("SELECT historico.*, obras.obra, obras.prazo, obras.orctotal, obras.meta1, obras.engobra, obras.engfs,  obras.financeiro, clientes.rsocial, clientes.idcli
			FROM historico LEFT JOIN obras ON historico.imp_obra = obras.idobra LEFT JOIN clientes ON obras.id_imp = clientes.idcli
			WHERE obras.idobra = :idobra ORDER BY id_hist DESC LIMIT 1");
			
		$sql->bindValue(":idobra", $_GET['idobra']);
		$sql->execute();
		}
		if($sql->rowCount() >0){
			$array = $sql->fetch();
			}else{ 
			// O alerta
		echo '<script language="javascript">alert("Ops! Obra sem lançamentos")</script>';
		// Retorno de pagina
		$var = "<script>javascript:history.back(-1)</script>";
		echo $var;
		exit;
			}
			//return false; exit;}
			
			// ATRASO OU NAO - CRIA UM NOVO ELEMENTO NO ARRAY: STATUS
			if($array['meta2'] == '0000-00-00') {
			$Inicio = strtotime($array['meta1']); } else { $Inicio = strtotime($array['meta2']); }
			$Fim = strtotime($array['corrente']);
			if($Fim <= $Inicio){ $array['status'] = "adiantado"; }else { $array['status'] = "atraso"; }
			
		// RETORNO O ARRAY DE getHistorico
		return $array;
		}
		
		// --------------------------------------------------------------------
		/* AQUI A REQUISIÇAO FEITA NO LOGIN */
		
		public function getHistLog($obra) {
        $array = array();
		
			$sql = $this->db->prepare("SELECT historico.*, obras.obra, obras.prazo, obras.orctotal, obras.meta1, obras.engobra, obras.engfs, obras.financeiro, clientes.rsocial, clientes.idcli
			FROM historico LEFT JOIN obras ON historico.imp_obra = obras.idobra LEFT JOIN clientes ON obras.id_imp = clientes.idcli
			WHERE obras.idobra = :idobra ORDER BY id_hist DESC LIMIT 1");
			
		$sql->bindValue(":idobra", $obra);
		$sql->execute();
		
		if($sql->rowCount() >0){
			$array = $sql->fetch();	
			
			}else{ 
			return false; 
			}
			
			// ATRASO OU NAO - CRIA UM NOVO ELEMENTO NO ARRAY: STATUS
			if($array['meta2'] == '0000-00-00') {
			$Inicio = strtotime($array['meta1']); } else { $Inicio = strtotime($array['meta2']); }
			$Fim = strtotime($array['corrente']);
			if($Fim <= $Inicio){ $array['status'] = "adiantado"; }else { $array['status'] = "atraso"; }
			
		// RETORNO O ARRAY DE getHistorico
		return $array;
		}
		
		// -------------------------------------------------------------------------------
		
		

		
		//Listagem geral dos lançamentos USA o fetchAll / foreacah SAO VARIOS LANCAMENTOS
		public function getLista() {
        $array = array();
		
			$sql = $this->db->prepare("SELECT historico.*, obras.obra, obras.prazo, obras.orctotal, obras.meta1, obras.engobra, obras.engfs, obras.financeiro, clientes.rsocial, clientes.idcli
			FROM historico LEFT JOIN obras ON historico.imp_obra = obras.idobra LEFT JOIN clientes ON obras.id_imp = clientes.idcli
			WHERE obras.ativo = 1 ORDER BY clientes.rsocial, obras.obra");
			
		$sql->execute();
		
		if($sql->rowCount() >0){
			$array = $sql->fetchAll();
			}else{ return false; exit;}
		return $array;
		}
		
		// - Funçao ADD ----------------------------------------------------------------
		//retirei $id
		public function add($imp_obra, $mes, $ano, $meta2, $corrente, $a_previsto, $b_realizado, $c_previsto, $c_realizado, $c_final, $analise, $data_lancamento, $resp, $reordem) {
		// Para evitar duplicidade no lancamento
		$dado1 = $ano;
		$dado2 = $mes;
		$dado3 = $imp_obra;
		$sql="SELECT * FROM historico WHERE imp_obra='$dado3' AND ano='$dado1' AND mes='$dado2'";
		$sql = $this->db->query($sql);
		if($sql->rowCount() > 0){
		// O alerta
		echo '<script language="javascript">alert("Ops! Já existe um lançamento para este período")</script>';
		// Retorno de pagina
		$var = "<script>javascript:history.back(-1)</script>";
		echo $var;
		exit;
		// --------------------------------------------------------
		// Volta ao caminho normal
		}else {
		
		$sql = $this->db->prepare("INSERT INTO historico SET 
		imp_obra = :imp_obra, mes = :mes, ano = :ano, meta2 = :meta2, corrente = :corrente, a_previsto = :a_previsto, b_realizado = :b_realizado, c_previsto = :c_previsto, c_realizado = :c_realizado, c_final = :c_final, analise = :analise, data_lancamento = :data_lancamento, resp = :resp, reordem = :reordem");
		$sql->bindValue(":imp_obra", $imp_obra);
		$sql->bindValue(":mes", $mes);
		$sql->bindValue(":ano", $ano);
		$sql->bindValue(":meta2", $meta2);
		$sql->bindValue(":corrente", $corrente);
		$sql->bindValue(":a_previsto", $a_previsto);
		$sql->bindValue(":b_realizado", $b_realizado);
		$sql->bindValue(":c_previsto", $c_previsto);
		$sql->bindValue(":c_realizado", $c_realizado);
		$sql->bindValue(":c_final", $c_final);
		$sql->bindValue(":analise", $analise);
		$sql->bindValue(":data_lancamento", $data_lancamento);
		$sql->bindValue(":resp", $resp);
		$sql->bindValue(":reordem", $reordem);
		$sql->execute();
		return $this->db->lastInsertId();
		}
		} // fecha a verificacao de duplicidade
		
		// - Funçao EDIT ---------------------------------------------------------------
		public function edit($id_hist, $imp_obra, $mes, $ano, $meta2, $corrente, $a_previsto, $b_realizado, $c_previsto, 
		$c_realizado, $c_final, $analise, $data_lancamento, $resp, $reordem) {
		$sql = $this->db->prepare("UPDATE historico SET imp_obra = :imp_obra, mes = :mes, ano = :ano, meta2 = :meta2, corrente = :corrente, a_previsto = :a_previsto, b_realizado = :b_realizado, c_previsto = :c_previsto, c_realizado = :c_realizado, c_final = :c_final, analise = :analise, data_lancamento = :data_lancamento, resp = :resp, reordem = :reordem WHERE id_hist = :id_hist");
		
		$sql->bindValue(":id_hist", $id_hist);
		$sql->bindValue(":imp_obra", $imp_obra);
		$sql->bindValue(":mes", $mes);
		$sql->bindValue(":ano", $ano);
		$sql->bindValue(":meta2", $meta2);
		$sql->bindValue(":corrente", $corrente);
		$sql->bindValue(":a_previsto", $a_previsto);
		$sql->bindValue(":b_realizado", $b_realizado);
		$sql->bindValue(":c_previsto", $c_previsto);
		$sql->bindValue(":c_realizado", $c_realizado);
		$sql->bindValue(":c_final", $c_final);
		$sql->bindValue(":analise", $analise);
		$sql->bindValue(":data_lancamento", $data_lancamento);
		$sql->bindValue(":resp", $resp);
		$sql->bindValue(":reordem", $reordem);
		$sql->execute();
			}
			
	}
		?>