<?php
		//sessao
		session_start();

		//carregar controladores
		include("./comum/carregacontroladores.php");
		$dao_utilizador=new DAOUtilizadores();
		//conteudo principal
		ob_start();
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navGestor" id="mainNav">
 <div class="container">
   <a class="navbar-brand"  href="AnunciosGestor.html" ><font  size="6" color="white">AlojamentoESTGOH</font></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
 </div>
 <div class="collapse navbar-collapse" id="navbarResponsive">
   <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
       <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
         <i class="fa fa-fw fa-wrench"></i>
         <span class="nav-link-text"><?php print $MeusAnu ?></span>
       </a>
       <ul class="sidenav-second-level collapse" id="collapseComponents">
         <li>
           <a href="InserirAnuncios.html"><?php print $InsereAnu ?></a>
         </li>
         <li>
           <a href="AnunciosGestor.html"><?php print $VerMeusAnu ?></a>
         </li>
       </ul>
     </li>
     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
       <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
         <i class="fa fa-fw fa-file"></i>
         <span class="nav-link-text"><?php print $AnuProprietarios ?></span>
       </a>
       <ul class="sidenav-second-level collapse" id="collapseExamplePages">
         <li>
           <a href="AnunciosNovosPendentes.html"><?php print $AnuNovosPend ?></a>
         </li>
         <li>
           <a href="AnunciosEditadosPendentes.html"><?php print $AnuEditPend ?></a>
         </li>
         <li>
           <a href="AnunciosProprietarios.html"><?php print $VerAnuProprietarios ?></a>
         </li>
       </ul>
     </li>
     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
       <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
         <i class="fa fa-fw fa-sitemap"></i>
         <span class="nav-link-text"><?php print $Uti ?></span>
       </a>
       <ul class="sidenav-second-level collapse" id="collapseMulti">
         <li>
           <a href="registoGestor.html"><?php print $RegGestor ?></a>
         </li>
         <li>
           <a href="desativaProprietario.html"><?php print $DesaProprietario ?></a>
         </li>
         <li>
           <a href="desativaGestor.html"><?php print $DesaGestor ?></a>
         </li>
       </ul>
     </li>
     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
       <a class="nav-link "  href="AnunciosDenunciados.html" >
         <i class="fa fa-fw fa-file"></i>
         <span ><?php print $AnunDenunciados ?></span>
       </a>
     </li>
   </ul>
   <ul class="navbar-nav sidenav-toggler">
     <li class="nav-item">
       <a class="nav-link text-center" id="sidenavToggler">
         <i class="fa fa-fw fa-angle-left"></i>
       </a>
     </li>
   </ul>
   <ul class="navbar-nav ml-auto">

     <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle mr-lg-2 corBranca" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-fw fa-bell"></i>
         <span class="d-lg-none"><?php print $Notificacao ?>
           <span class="badge badge-pill badge-warning">6 New</span>
         </span>
         <span class="indicator text-warning d-none d-lg-block">
           <i class="fa fa-fw fa-circle"></i>
         </span>
       </a>
       <div class="dropdown-menu notificacoes" aria-labelledby="alertsDropdown">
				 <!-- Notificações -->
       </div>
     </li>
     <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle mr-lg-2 corBranca" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-user" aria-hidden="true"></i>
         <span class="d-lg-none"><?php print $MeusDados1 ?>
           <span class="badge badge-pill badge-warning">6 New</span>
         </span>
       </a>
       <div class="dropdown-menu " aria-labelledby="alertsDropdown">
				 <!-- Dados -->
       </div>
     </li>
     <li class="nav-item">
       <a class="nav-link corBranca" data-toggle="modal" data-target="#exampleModal">
         <i class="fa fa-fw fa-sign-out"></i><?php print $terminaSessao ?></a>
     </li>
   </ul>
 </div>
</nav>


<!-- Page Content -->
  <div class="row">
    <div id="imgbandeira">
      <div class="col-12">
        <div class="bandeira">
          <a href="?lingua=pt">
              <img  src="img/img_aplicacao/pt.jpg" alt="">
          </a>
          <a href="?lingua=en">
            <img src="img/img_aplicacao/UK.jpg" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
    </div>
    <div class="col-lg-5">
      <div class="container">
        <div class="linhaflex">
           <div class="titulo">
            <?php print $registogestor; ?>
           </div>
           <hr>
           <form class="my-5" action="registo_outros_gestores.php" method="POST">
           	<label class="corPreta">
							<b><?php print $nome; ?></b>
						</label>
						<br>
	           	<input class="form-control" type="text" placeholder="<?php print $nome;?>" name="nomee" required><br>
	           <label class="corPreta" >
							 <b><?php print $emailR; ?>:</b>
						 </label>
						 <br>
	           <div class="form-group input-group">
	             <input type="email" placeholder="E-mail" class="form-control" name="emaill" id="inlineFormInputGroup" required>
	             <div class="input-group-addon" > <img class="certo" src="./img/img_aplicacao/certo.png" alt=""> </div>
	           </div>
           	<label class="corPreta"><b><?php print $password; ?></b></label><br>
           	<input class="form-control" type="password" placeholder="Password" name="passwordd" required><br>
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
             <input name="registar" class="btn btnx navbar-btn"  type="submit" value="<?php print $registar; ?>">
          </form>
   		</div>
    </div>
 	</div>
	<div class="col-3">
	</div>
</div>

<?php

//verifica o registo
if(isset($_POST["registar"]) && !empty($_POST["registar"])){
	$mybd->ligar_bd();
	$flag=0;
	if(isset($_POST["nomee"]) && !empty($_POST["nomee"])){
		if(verifica_nome($_POST["nomee"])==true){
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
	if(isset($_POST["emaill"]) && !empty($_POST["emaill"])){
		if($dao_utilizadores->verificar_email($_POST["emaill"])==false){
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
	if(isset($_POST["passwordd"]) && !empty($_POST["passwordd"])){
		if(verifca_password($_POST["passwordd"])==true){
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
		$password=password_hash($_POST["passwordd"],PASSWORD_DEFAULT);
		$utilizador= new utilizador(0,$_POST["nomee"],$_POST["emaill"],$password,0,date("Y-m-d"));
		//insere o utilizador na bd
		$dao_utilizadores->inserir_utilizador($utilizador);
		print('<script>
						jQuery(document).ready(function( $ ) {
								jQuery("#aviso_registo_sucesso").show();
						});
				</script>');
		//volta a pagina principal
		header("Location: ./registo_outros_gestores.php");
	}
	$mybd->desligar_bd();
}

//funções de php
	function verifica_nome(){
		$valor=$_POST["nomee"];
		//Verifica se tem numeros
		if(preg_match('/[1-9]/',$valor)!=1)
			return true;//nao tem numeros (correto)
		return false;//tem numeros
	}

	function verifca_password(){
		//verifica se tem pelo menos um caracter maiusculo
		if(preg_match('/[A-Z]/', $_POST["passwordd"])!=1)
			return false;// nao tem maisculas
		//verifica se tem pelo menos 9 carcteres
		if(strlen($_POST["passwordd"])<8)
			return false;//tamanho invalido
		//verifica se tem numeros
		if(preg_match('/[1-9]/', $_POST["passwordd"])!=1)
			return false;//nao tem numeros
		return true;// (correto)
	}

  $conteudo_principal = ob_get_contents();
	$rodape=false;
  ob_end_clean();
  //master page
  include($layout);
?>
