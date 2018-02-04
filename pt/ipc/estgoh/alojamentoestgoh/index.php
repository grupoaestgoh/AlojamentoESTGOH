<?php
	//sessao
	session_start();
	//carregar controladores
	include("./comum/carregacontroladores.php");

	//verifica se existe admin
	if ($dao_utilizadores->verificar_gestor() == false) {
		header ( "Location: ./registo_primeiro_gestor.php" );
	}else{
		//verificar autenticação
		if (isset($_SESSION["AE_tipo_utilizador"])){
			//se tiver sessãon vai buscar utilizador e ve o tipo para poder redirecionar para a pagina correta//Falta isso !!
			header("Location: ./home_page.php");
		}
	}


	//conteudo principal
	ob_start();
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top"  >
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
       <a href="?lingua=pt"> <img src="./img/img_aplicacao/pt.jpg" alt=""> </a>
    </li>
    <li class="nav-item hidden"> </li>
    <li class="nav-item">
       <a href="?lingua=en"> <img src="./img/img_aplicacao/UK.jpg" alt=""> </a>
    </li>
  </ul>
  <div class="container">
    <a class="navbar-brand"  href="#" ><p class="navtitle"><?php print $logotipo; ?></p></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item" id="muda">
          <a class="nav-link" href="#Log" ><font  size="4" ><?php print $login; ?></font></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Reg"><font  size="4" ><?php print $registo; ?></font></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Header -->
<section class="content-section-c" >
	<header class="intro-header" >
		<div class="container">
			<div class="intro-message posicaoPI">
			<h1><?php print $logotipo; ?></h1>
			<h3><?php print $nomeEscola; ?></h3>
			<hr class="intro-divider aumentar">
			<ul class="list-inline intro-social-buttons">
			  <li class="list-inline-item" style="background-color: rgba(100,100,100,0.6);">
			      <span class="network-name">
							<?php print $frase1; ?>
			      </span>
			      <br>
			      <span class="network-name">
							<?php print $frase2; ?>
			      </span>
			  </li>
			</ul>
			</div>
		</div>
	</header>
</section>
<!-- Page Content -->
<section class="content-section-a"  id="Log">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 ml-auto">
			  <div class="clearfix">
				</div>
			  <h2 class="section-heading corAzul"><?php print $login; ?></h2>
			  <hr class="section-heading-spacer" >
			  <br>
			  <br>
			  <form action="index.php" method="POST">
			      <label class="corPreta"><b><?php print $email; ?>:</b></label>
						<br>
			      <input class="form-control" type="email" placeholder="Email" name="emailL" required>
			      <br>
			      <label class="corPreta"><b><?php print $password; ?>:</b></label>
						<br>
			      <input class="form-control"  type="password" placeholder="Password" name="passwordL" required>
			      <br>
						<div>
				      <div id="aviso_login_insucesso" class="alert alert-danger aviso_login_insucesso" role="alert">
				          <div class="row leftCaracteris">
					          <div class="col-lg-2 ">
					          	<img class="alertaImg" src="./img/img_aplicacao/alerta.png" alt="">
					          </div>
					          <div class="col-lg-6">
					            <span class="glyphicon glyphicon-alert"><?php print $credenciaisErradas; ?><br><?php print $tenteNovamente; ?></span>
					          </div>
				        </div>
				      </div>
						</div>
						<input name="entrar" class="btn btn-secondary navbar-btn"  type="submit" value="<?php print $entrar; ?>">
			  </form>
			</div>
			<div class="col-lg-5 mr-auto">
			  <img class="img-fluid" src="./img/img_aplicacao/ipad.png" alt="">
			</div>
		</div>
	</div>
</section >

<section class="content-section-b"  id="Reg">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 mr-auto order-lg-2">
			  <div class="clearfix"></div>
			  <h2 class="section-heading corBranca"><?php print $registo; ?></h2>
			  <hr class="section-heading-spacer">
			  <br>
				<br>
			  <form action="index.php" method="POST">
			      <label class="corPreta" ><b><?php print $email; ?>:</b></label>
			      <br>
			      <div class="form-group input-group">
							<input type="email" placeholder="E-mail" class="form-control" name="emailR" id="inlineFormInputGroup" required>
							<script src="./javascript/ajax.js"> </script>
							<div class="input-group-addon" id="ajaximg" >
								<img class="certo" src="./img/img_aplicacao/certo.png" alt="">
							</div>
			      </div>
			      <label class="corPreta"><b><?php print $password; ?>:</b></label>
						<br>
			      <input class="form-control" type="password" placeholder="Password" name="passwordR" required>
			      <br>
			      <label class="corPreta"><b><?php print $nome; ?>:</b></label>
						<br>
			      <input class="form-control" type="text" placeholder="Nome" name="nomeR" required>
			      <br>
			      <div>
							<div id="aviso_registo_sucesso" class="alert alert-success aviso_registo_sucesso" role="alert">
								<div class="row leftCaracteris">
				         	<div class="col-lg-2 ">
				         		<img class="alertaImg" src="./img/img_aplicacao/certo.png" alt="">
				         	</div>
				         	<div class="col-lg-8">
				           	<span class="glyphicon glyphicon-alert"><?php print $sucesso; ?></span>
				         	</div>
				       	</div>
				      </div>
							<div id="aviso_registo_insucesso_email" class="alert alert-danger aviso_registo_insucesso_email" role="alert">
								<div class="row leftCaracteris">
				         	<div class="col-lg-2 ">
				         		<img class="alertaImg" src="./img/img_aplicacao/alerta.png" alt="">
				         	</div>
				         	<div class="col-lg-8">
				           	<span class="glyphicon glyphicon-alert"><?php print $insucesso_email; ?></span>
				         	</div>
				       	</div>
				      </div>
							<div id="aviso_registo_insucesso_password" class="alert alert-danger aviso_registo_insucesso_password" role="alert">
								<div class="row leftCaracteris">
				         	<div class="col-lg-2 ">
				         		<img class="alertaImg" src="./img/img_aplicacao/alerta.png" alt="">
				         	</div>
				         	<div class="col-lg-8">
				           	<span class="glyphicon glyphicon-alert"><?php print $insucesso_password; ?></span>
				         	</div>
				       	</div>
				      </div>
							<div id="aviso_registo_insucesso_nome" class="alert alert-danger aviso_registo_insucesso_nome" role="alert">
								<div class="row leftCaracteris">
				         	<div class="col-lg-2 ">
				         		<img class="alertaImg" src="./img/img_aplicacao/alerta.png" alt="">
				         	</div>
				         	<div class="col-lg-8">
				           	<span class="glyphicon glyphicon-alert"><?php print $insucesso_nome; ?></span>
				         	</div>
				       	</div>
				      </div>
						</div>
			      <input name="registar" class="btn btn-secondary"  type="submit" value="<?php print $registar; ?>">
			  </form>
			</div>
			<div class="col-lg-5 ml-auto order-lg-1">
			  <img class="img-fluid" src="./img/img_aplicacao/dog.png" alt="">
			</div>
		</div>
	</div>
</section>

<?php
//verifica o login
if(isset($_POST["entrar"]) && !empty($_POST["entrar"])){
	$mybd->ligar_bd();
	$flag=0;
	if(isset($_POST["emailL"]) && !empty($_POST["emailL"])){
		$flag++;
	}
	if(isset($_POST["passwordL"]) && !empty($_POST["passwordL"])){
		$flag++;
	}
	if($flag==2){//se estiverem os dados todos inseridos e corretos regista o utilizador
		//criar o utilizador
		$utilizador=$dao_utilizadores->obter_utilizador($_POST["emailL"],"");
		if($utilizador!=null){
			if(password_verify($_POST["passwordL"], $utilizador->Password)==true){
				print('<script>
						jQuery(document).ready(function( $ ) {
								jQuery("#aviso_login_insucesso").hide();
						});
				</script>');
				//iniciar sessão
				$log=new log(-1,$utilizador->Id_Utilizador,"Iniciou sessão",date('Y-m-d'),date('H:m:s'));
				$dao_logs->inserir_log($log);
				$_SESSION["AE_id_utilizador"] = $utilizador->Id_Utilizador;
				$_SESSION["AE_nome_utilizador"] = $utilizador->Nome;
				$_SESSION["AE_email_utilizador"] = $utilizador->Email;
				$_SESSION["AE_estado_utilizador"] = $utilizador->Estado;
				$_SESSION["AE_tipo_utilizador"] = $utilizador->Tipo;
				$_SESSION["AE_data_incricao_utilizador"] = $utilizador->Data_Inscricao;
				if ($utilizador instanceof Anunciante) {
					 header("Location: ./anuncios.php");
				}
				if ($utilizador instanceof Gestor) {
					 header("Location: ./meus_anuncios.php");
				}
			}else{
				print('<script>
								jQuery(document).ready(function( $ ) {
										jQuery("#aviso_login_insucesso").show();
								});
						</script>');
			}
		}else{
			$array_email=explode("@",$_POST['emailL']);
			$user=$array_email[0];
			$password=$_POST['passwordL'];
			$ldap_host = "192.168.135.1";
			$ldap_utilizador  = 'uid='.$user.',ou=Users,dc=estgoh,dc=ipc.pt';
			$ldap_pass = $password;
			// efetuar a conexao ao ldap
			$ldap_conexao = ldap_connect($ldap_host) or die("Could not connect to LDAP server.");
			// opcoes do ldap
			ldap_set_option($ldap_conexao, LDAP_OPT_NETWORK_TIMEOUT, 2); /* 2 segundos timeout */
			ldap_set_option($ldap_conexao, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($ldap_conexao, LDAP_OPT_REFERRALS, 0);
			if ($ldap_conexao) {
							//fazer um bind ao ldap
							$ldap_bind = @ldap_bind($ldap_conexao,$ldap_utilizador,$ldap_pass);
							// testar o bind
							if ($ldap_bind) {
									$_SESSION["AE_email_utilizador"] = $user."@alunos.estgoh.ipc.pt";
									$_SESSION["AE_tipo_utilizador"] = 3;
									header("Location: ./ver_todos_anuncios.php");
							} else {
								print('<script>
												jQuery(document).ready(function( $ ) {
														jQuery("#aviso_login_insucesso").show();
												});
										</script>');
							}
			}

			print('<script>
							jQuery(document).ready(function( $ ) {
									jQuery("#aviso_login_insucesso").show();
							});
					</script>');
		}

	}else{
		print('<script>
						jQuery(document).ready(function( $ ) {
								jQuery("#aviso_login_insucesso").show();
						});
				</script>');
	}
	$mybd->desligar_bd();
}
//verifica o registo
if(isset($_POST["registar"]) && !empty($_POST["registar"])){
	$mybd->ligar_bd();
	$flag=0;
	if(isset($_POST["nomeR"]) && !empty($_POST["nomeR"])){
		if(verifica_nome($_POST["nomeR"])==true && strlen($_POST["nomeR"])<51){
			$flag++;
			print('<script>
							jQuery(document).ready(function( $ ) {
									jQuery("#aviso_registo_insucesso_nome").hide();
							});
					</script>');
		}else{
			print('<script>
							jQuery(document).ready(function( $ ) {
									jQuery("#aviso_registo_insucesso_nome").show();
							});
					</script>');
		}
	}else{
		print('<script>
						jQuery(document).ready(function( $ ) {
								jQuery("#aviso_registo_insucesso_nome").show();
						});
				</script>');
	}
	if(isset($_POST["emailR"]) && !empty($_POST["emailR"])){
		if($dao_utilizadores->verificar_email($_POST["emailR"])==false && strlen($_POST["emailR"])<26){
			$flag++;
			print('<script>
							jQuery(document).ready(function( $ ) {
									jQuery("#aviso_registo_insucesso_email").hide();
							});
					</script>');
		}else{
			print('<script>
							jQuery(document).ready(function( $ ) {
									jQuery("#aviso_registo_insucesso_email").show();
							});
					</script>');
		}
	}else{
		print('<script>
						jQuery(document).ready(function( $ ) {
								jQuery("#aviso_registo_insucesso_email").show();
						});
				</script>');
	}
	if(isset($_POST["passwordR"]) && !empty($_POST["passwordR"])){
		if(verifca_password($_POST["passwordR"])==true  && strlen($_POST["passwordR"])<16){
			$flag++;
			print('<script>
							jQuery(document).ready(function( $ ) {
									jQuery("#aviso_registo_insucesso_password").hide();
							});
					</script>');
		}else{
			print('<script>
							jQuery(document).ready(function( $ ) {
									jQuery("#aviso_registo_insucesso_password").show();
							});
					</script>');
		}
	}else{
		print('<script>
						jQuery(document).ready(function( $ ) {
								jQuery("#aviso_registo_insucesso_password").show();
						});
				</script>');
	}
	if($flag==3){//se estiverem os dados todos inseridos e corretos regista o utilizador
		//criar o utilizador
		$password=password_hash($_POST["passwordR"],PASSWORD_DEFAULT);
		$utilizador= new utilizador(1,$_POST["nomeR"],$_POST["emailR"],$password,2,date("Y-m-d"));
		//insere o utilizador na bd
		$dao_utilizadores->inserir_utilizador($utilizador);
		print('<script>
						jQuery(document).ready(function( $ ) {
								jQuery("#aviso_registo_sucesso").show();
						});
				</script>');
		//volta a pagina principal
		header("Location: ./index.php");
	}
	$mybd->desligar_bd();
}


//funções de php
	function verifica_nome(){
		$valor=$_POST["nomeR"];
		//Verifica se tem numeros
		if(preg_match('/[1-9]/',$valor)!=1)
			return true;//nao tem numeros (correto)
		return false;//tem numeros
	}
	function verifca_password(){
		//verifica se tem pelo menos um caracter maiusculo
		if(preg_match('/[A-Z]/', $_POST["passwordR"])!=1)
			return false;// nao tem maisculas
		//verifica se tem pelo menos 9 carcteres
		if(strlen($_POST["passwordR"])<8)
			return false;//tamanho invalido
		//verifica se tem numeros
		if(preg_match('/[1-9]/', $_POST["passwordR"])!=1)
			return false;//nao tem numeros
		return true;// (correto)
	}

	$rodape=true;
	$conteudo_principal = ob_get_contents();
	ob_end_clean();
	//master page
	include($layout);
?>
