
<?php echo "<link href='".BASE_URL."/assets/css/menu2.css' rel='stylesheet' />"; ?>

<nav id='cssmenu'>
  <ul><!-- ABRE UL --------------- -->
	<!-- Home ----------------------------------------- -->
    <li><?php if($_SESSION['ccNivel'] < 4){
      echo" <a href='" . BASE_URL . "/relatorio/obra_rel'><span>Home<span></a>";
      }else{echo" <a href='". BASE_URL."'><span>Home</span></a>"; }?>
    </li>
    <!-- Home ----------------------------------------- -->
    
	<!-- USUARIOS e CLIENTES --------------- -->
    <?php
	if($_SESSION['ccNivel'] > 4){
    // <!-- Usuários e Clientes--------------- -->
	echo "<li class='has-sub'><a href='#'><span>Usuários</span></a>
		<ul>"; ?>
        <!-- Restringe o acesso ao nivel 7  -->
        <?php if($_SESSION['ccNivel'] > 4){
		echo "<li class='has-sub'><a href='". BASE_URL . "/users/paginado'><span>Usuários</span></a>
			<ul>
			<li><a href='" . BASE_URL . "/users/paginado'><span>Lista<span></a>
			<li><a href='" . BASE_URL . "/users/fscon'><span>FS Consultores<span></a>";
			if($_SESSION['ccNivel'] > 6){
			echo "<li><a href='" . BASE_URL . "/users/lista'><span>Listagem<span></a>";
			}
			echo "<li><a href='" . BASE_URL . "/users/add'><span>Novo usuário<span></a>
			</ul></li>"; } ?>
        <!-- Libera o acesso ao nivel 5  -->
		<?php if($_SESSION['ccNivel'] > 4){
		echo "<li class='has-sub'><a href='" . BASE_URL . "/clientes/paginado'><span>Clientes</span></a>
			<ul>
			<li><a href='" . BASE_URL . "/clientes/paginado'><span>Lista<span></a>
			<li><a href='" . BASE_URL . "/clientes/add'><span>Novo cliente<span></a>
			</ul></li>
		</ul>
		</li>"; }
		} ?>
	<!-- PATRIMONIO --------------- -->
    <!-- Restringe o acesso ao nivel 7  -->
		<?php
		if($_SESSION['ccNivel'] > 6){
		echo "<li class='has-sub'><a href='" . BASE_URL . "/equipa/eqp_pag'><span>Patrimônio</span></a>
		<ul>
			<li class='has-sub'><a href='" . BASE_URL . "/equipa/eqp_pag'><span>Listar</span></a>
			<li class='has-sub'><a href='" . BASE_URL . "/equipa/lista_eqp'><span>Listagem<span></a>
			<li class='has-sub'><a href='" . BASE_URL . "/equipa/lista_smb'><span>Lista SMB<span></a>
            <li class='has-sub'><a href='" . BASE_URL . "/equipa/add'><span>Adicionar Patrimônio</span></a>
			</li>
		</ul>";
		} ?>
        
 	<!-- OBRAS --------------- -->
    <!-- Restringe o acesso ao nivel 7  -->
    <?php
			if($_SESSION['ccNivel'] > 6){
	echo "<li class='has-sub'><a href='".BASE_URL."/obras/obras'><span>Obras</span></a>
		<ul>
			<li class='has-sub'><a href='".BASE_URL."/obras/paginado?it=la'><span>Obras Ativas</span></a> 
			<li class='has-sub'><a href='" . BASE_URL . "/obras/paginado?it=lt'><span>Lista Todas<span></a>
            <li class='has-sub'><a href='" . BASE_URL . "/relatorio/lista'><span>Lançamentos<span></a>
			<li class='has-sub'><a href='" . BASE_URL . "/relatorio/add'><span>Novo Lançamento<span></a>
            <li class='has-sub'><a href='".BASE_URL."/obras/add'><span>Adicionar Obra</span></a></li>
		</ul>
	</li>"; }
	// Libera o acesso ao nivel 4  -->
	if(($_SESSION['ccNivel'] > 4) && ($_SESSION['ccNivel'] < 6) ){
	echo "<li class='has-sub'><a href='#'><span>Obras</span></a>
		<ul>
			<li class='has-sub'><a href='".BASE_URL."/obras/paginado?it=la'><span>Obras Ativas</span></a> 
			<li class='has-sub'><a href='" . BASE_URL . "/relatorio/add'><span>Novo Lançamento<span></a>
            <li class='has-sub'><a href='".BASE_URL."/obras/add'><span>Adicionar Obra</span></a></li>
		</ul>
	</li>"; } ?>
	<!-- RAMAIS --------------- --> 
	<li><?php echo" <a href='" . BASE_URL."/users/ramais'><span>Ramais</span></a>"; ?></li>
	<!-- EVENTOS --------------- --> 
   <?php  if($_SESSION['ccNivel'] > 3){
   echo "<li class='has-sub'><a href='".BASE_URL."/eventos/lista'><span>Eventos</span></a></li>";
   } ?>
	<!-- AGENDA DE TELEFONES --------------- --> 
	<li class='has-sub'><a href="<?php echo BASE_URL; ?>/agenda/ag_pag"><span>Telefones</span></a>
    <ul> 
		<li><a href="<?php echo BASE_URL; ?>/agenda/ag_pag"><span>Lista<span></a>
        <?php if(($_SESSION['ccNivel'] == 4) OR ($_SESSION['ccNivel'] > 6)){
		echo "<li><a href='".BASE_URL."/agenda/lista'><span>Listagem<span></a>"; } ?>
		<li class='has-sub'><a href="<?php echo BASE_URL; ?>/agenda/add"><span>Adicionar novo item</span></a>
        </li>
	</ul></li>
	<!-- CONTROLES ADMIN --------------- --> 
	<?php if($_SESSION['ccNivel'] > 6){
	echo "<li class='has-sub'><a href='#'><span>Controles</span></a>
		<ul>
			<li class='has-sub'><a href='" . BASE_URL . "/backup/lista'><span>Backup</span></a>
            <li class='has-sub'><a href='http://www.fsconsultores.com.br/z_gerente.php'><span>
			Editar WEB</span></a></li>
			<li class='has-sub'><a href='" . BASE_URL . "/notifica/notificacoes'><span>Lista Notificações</span></a>
			<li class='has-sub'><a href='" . BASE_URL . "/notifica/add'><span>Notificação ao usuário</span></a>
		</ul>";
	} ?>

	<!-- LOGOUT --------------- --> 
	<li><a href="<?php echo BASE_URL; ?>/login/logout">Encerrar</a></li>
    
</ul><!-- FECHA UL --------------- -->
</nav>
