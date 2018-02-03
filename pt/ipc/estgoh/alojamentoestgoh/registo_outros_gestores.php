<?php
		//sessao
		session_start();
		include("./comum/carregacontroladores.php");

		//verifica se o utilizador está autenticado
		if (isset($_SESSION["AE_tipo_utilizador"]) ){
		    //Verifica se é gestor
		    if($_SESSION["AE_tipo_utilizador"]!=0 && $_SESSION["AE_tipo_utilizador"]!=1){
						header("Location: ./index.php");
		    }
		}else{
		    header("Location: ./index.php");
		}

		//conteudo principal
		ob_start();
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navGestor" id="mainNav">
 <div class="container">
   <a class="navbar-brand"  href="registo_outros_gestores.php" ><font  size="6" color="white"><?php print $logotipo?></font></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
 </div>
 <div class="collapse navbar-collapse" id="navbarResponsive">
	 <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
		 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
			 <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
				 <i class="fa fa-fw fa-wrench"></i>
				 <span class="nav-link-text"><?php print $MeusAnu; ?></span>
			 </a>
			 <ul class="sidenav-second-level collapse" id="collapseComponents">
				 <li>
					 <a href="registo_anuncio.php"><?php print $InsereAnu; ?></a>
				 </li>
				 <li>
					 <a href="meus_anuncios.php"><?php print $VerMeusAnu; ?></a>
				 </li>
			 </ul>
		 </li>
		 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
			 <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
				 <i class="fa fa-fw fa-file"></i>
				 <span class="nav-link-text"><?php print $AnuProprietarios; ?></span>
			 </a>
			 <ul class="sidenav-second-level collapse" id="collapseExamplePages">
				 <li>
					 <a href="anuncios_novos_pendentes.php"><?php print $AnuNovosPend; ?></a>
				 </li>
				 <li>
					 <a href="anuncios_editados_pendentes.php"><?php print $AnuEditPend; ?></a>
				 </li>
				 <li>
					 <a href="ver_anuncios_proprietarios.php"><?php print $VerAnuProprietarios; ?></a>
				 </li>
			 </ul>
		 </li>
		 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
			 <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
				 <i class="fa fa-fw fa-sitemap"></i>
				 <span class="nav-link-text"><?php print $Uti; ?></span>
			 </a>
			 <ul class="sidenav-second-level collapse" id="collapseMulti">
				 <li>
					 <a href="registo_outros_gestores.php"><?php print $RegGestor; ?></a>
				 </li>
				 <li>
					 <a href="desativar_proprietario.php"><?php print $DesaProprietario; ?></a>
				 </li>
				 <li>
					 <a href="desativar_gestor.php"><?php print $DesaGestor; ?></a>
				 </li>
			 </ul>
		 </li>
		 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
			 <a class="nav-link "  href="desativar_proprietario.php" >
				 <i class="fa fa-fw fa-file"></i>
				 <span ><?php print $AnunDenunciados; ?></span>
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
	 	 	 <a class="nav-link dropdown-toggle mr-lg-2 navGestorimg" id="alertsDropdown"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	 	     <i class="fa fa-fw fa-bell"></i>
	 	       <span class="d-lg-none"><?php print $Notificacao; ?>
	 	         <span class="badge badge-pill badge-warning">6 <?php print $novas; ?></span>
	 	       </span>
	 	       <span class="indicator text-warning d-none d-lg-block">
	 	         <i class="fa fa-fw fa-circle"></i>
	 	       </span>
	 	    </a>
	 	    <div class="dropdown-menu notificacoes" aria-labelledby="alertsDropdown">
	 	      <h6 class="dropdown-header"><?php print $NovasNotifica; ?></h6>
	 	      <div class="dropdown-divider"></div>
	 	      <?php
	 	        $mybd->ligar_bd();
	 	        $notificacoes_uti=$dao_notificacao->listar_notificacoes(-1);//para anunciantes -$_SESSION["AE_id_utilizador"]
	 	        if (sizeof($notificacoes_uti)>0) {
	 	          for($i=0;$i<sizeof($notificacoes_uti);$i++){
	 	             $notificacao=$notificacoes_uti[$i];
	 	             echo('<a class="dropdown-item" >
								         <span class="text');
	 	             if($notificacao->Estado==0) {
	 	               if($notificacao->Cor==2 || $notificacao->Cor==3) print "-warning";
	 	               if($notificacao->Cor==1) print "-success";
	 	               if($notificacao->Cor==4 || $notificacao->Cor==5 || $notificacao->Cor==6) print "-danger";
	 	             }
	 	             echo('"><!--successwarning/danger -->
								        <strong>
	 	                    <i class="fa"></i>');
	 	             if($notificacao->Cor==1) print $anu_aprovado;
	 	             else if($notificacao->Cor==2) print $anu_pendente;
	 	             else if($notificacao->Cor==3) print $pro_pendente;
	 	             else if($notificacao->Cor==4) print $den_denuncia;
	 	             else if($notificacao->Cor==5) print $anu_reprovado;
	 	             else if($notificacao->Cor==6) print $pro_desativa;
	 	             echo('  </strong>
	 	                     </span>
	 	                     <span class="small float-right text-muted">'.$notificacao->Hora.' horas</span>
	 	                     <div class="dropdown-message small">'.$notificacao->Descricao.'</div>
	 	                   </a>');
	 	             if($i<sizeof($notificacoes_uti))echo('<div class="dropdown-divider"></div>');
	 	          }
	 	       }else{
	 	          print"Não tem notificações!";
	 	       }
	 	       $mybd->desligar_bd();
	 	     ?>
	 	    </div>
	 	  </li>
		  <li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle mr-lg-2 navGestorimg" id="alertsDropdown"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-user" aria-hidden="true"></i>
					<span class="d-lg-none"><?php print $MeusDados; ?>
						<span class="badge badge-pill badge-warning">6 <?php print $novas; ?></span>
					</span>
				</a>
			  <div class="dropdown-menu dados" aria-labelledby="alertsDropdown">
					<div class="row">
						<div class="col-12">
							<h6 class="dropdown-header"><?php print $MeusDados1; ?></h6>
						</div>
					</div>
					<div class="row">
							<div class="col-12">
								 <div class="dropdown-divider"></div>
							</div>
					</div>
					<a class="dropdown-item">
						<div class="row">
							<div class="col-12 textodoquarto">
								<strong> <?php print $nome; ?> </strong>
							</div>
						</div>
						<div class="row">
							 <div class="col-12">
								 <div class="dropdown-message smallx textodoquarto"><?php echo $_SESSION["AE_nome_utilizador"]; ?></div><!--Tens de fazer o login no index para a session ter valor -->
							 </div>
						</div>
					</a>
					<div class="row">
					  <div class="col-12">
						  <div class="dropdown-divider"></div>
						</div>
					</div>
					<a class="dropdown-item">
					  <div class="row">
						  <div class="col-12 textodoquarto">
							  <strong><?php print $email; ?> </strong>
							</div>
						</div>
						<div class="row">
						  <div class="col-12">
							  <div class="dropdown-message textodoquarto smallx"><?php print $_SESSION["AE_email_utilizador"]; ?></div><!--Tens de fazer o login no index para a session ter valor -->
							</div>
						</div>
					</a>
					<div class="row">
					  <div class="col-12">
						  <div class="dropdown-divider"></div>
						</div>
					</div>
				  <a class="dropdown-item">
					  <div class="row">
						  <div class="col-12 textodoquarto padleft">
							  <button type="button" class="nav-link especialBotao"  data-toggle="modal" data-target="#myModal20"><font  size="4" color="black"><?php print $alteraDados; ?></font></button>
							</div>
						</div>
					</a>
				</div>
			</li>
			<li class="nav-item">
			  <a href="./comum/logout.php" class="nav-link navGestorimg formabotao" ><i class="fa fa-fw fa-sign-out"></i><?php print $terminaSessao; ?></a>
			</li>
   </ul>
 </div>
</nav>

<div id="myModal20" class="modal fade" role="dialog">
	<!-- Modal ELiminar -->
	<div class="modal fade" id="myModalDesativar" role="dialog">
		<div class="modal-dialog">
	<!-- Modal content-->
			<div class="modal-content">
				<form action="registo_outros_gestores.php"  Method="POST">
				  <div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title"><?php print $desativaConta; ?></h4>
				  </div>
				  <div class="modal-body aumenta ">
					  <p><?php print $certeza; ?></p>
				  </div>
				  <div class="modal-footer">
					  <input type="submit" name="DesativaConta" class="btn btn-danger"   value=<?php print $desativar; ?>>
					  <button type="button" class="btn btn-default" data-dismiss="modal"><?php print $Fechar; ?></button>
				  </div>
			 </form>
			</div>
 		</div>
	</div>
<!-- Fim ELiminar -->
	<div class="modal-dialog divBranca">
		<div class="modal-content" >
			<div class="modal-header divAzul">
				<h4 class="modal-title corBranca"><?php print $alteraPass;?></h4>
			</div>
			<div class="modal-body">
				<form action="registo_outros_gestores.php" method="POST">
					<br>
					<label class="corPreta" ><b><?php print $PassNova;?></b></label>
					<br>
					<input class="form-control" type="password" placeholder="Password" name="password1" data-toggle="tooltip" title="Se quer alterar o email insira um novo e edite!Caso contrario deixe o inicial!">
					<br>
					<label class="corPreta"><b><?php print $PassNovaRepete;?></b></label>
					<br>
					<input class="form-control" type="password" placeholder="Repetir password" name="password2" data-toggle="tooltip" title="Se quer alterar a password insira uma nova e edite!">
					<br>
					<div id="aviso_editar_certo" class="alert alert-success aviso_editar_certo" role="alert">
					  <div class="row leftCaracteris">
						  <div class="col-lg-2 ">
							  <img class="alertaImg" src="img/img_aplicacao/certo.png" alt="">
							</div>
						  <div class="col-lg-8">
							  <span class="glyphicon glyphicon-alert"><?php print $alteradaSucessoPass;?></span>
							</div>
						</div>
					</div>
					<div id="aviso_carac_pass_nova" class="alert alert-danger aviso_carac_pass_nova" role="alert">
					  <div class="row leftCaracteris">
						  <div class="col-lg-2 ">
							  <img class="alertaImg" src="img/img_aplicacao/alerta.png" alt="">
							</div>
							<div class="col-lg-8">
							  <span class="glyphicon glyphicon-alert"><?php print $caracPassword;?></span>
							</div>
						</div>
					</div>
					<div id="aviso_password_diferente" class="alert alert-danger aviso_password_diferente" role="alert">
					  <div class="row leftCaracteris">
						  <div class="col-lg-2 ">
							  <img class="alertaImg" src="img/img_aplicacao/alerta.png" alt="">
							</div>
							<div class="col-lg-8">
							  <span class="glyphicon glyphicon-alert"><?php print $PasswordIguais;?></span>
						  </div>
						</div>
				  </div>
					<div class="row" style="text-align:center;">
						<div class="col-12">
							<input type="submit" name="EditarPassword" class="btn btn-primary navbar-btn"  value=<?php print $editar;?>>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="row">
					<div class="col-6">
							<button type="button" class=" btn btn-danger"  data-toggle="modal" data-target="#myModalDesativar"><font  size="3" color="white"><?php print $desativaConta;?></font></button>
					</div>
					<div class="col-6">
						<button type="button" class="btn btn-default corPreta" data-dismiss="modal"><?php print $Fechar;?></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End modal -->

<!-- Page Content -->
<div class="container">
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
						 <input class="form-control"  type="text" placeholder="<?php print $nome;?>" name="nomee" required>
						 <br>
	           <label class="corPreta" >
							 <b><?php print $emailR; ?>:</b>
						 </label>
						 <br>
	           <div class="form-group input-group">
	             <input type="email" placeholder="E-mail" class="form-control" name="emaill" id="inlineFormInputGroup" required>
							 <script src="./javascript/ajax.js"> </script>
	             <div class="input-group-addon" id="ajaximg" >
								 <img class="certo" src="./img/img_aplicacao/certo.png" alt="">
							 </div>
	           </div>
           	<label class="corPreta"><b><?php print $password; ?></b></label>
						<br>
           	<input class="form-control" type="password" placeholder="Password" name="passwordd" required>
						<br>
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
             <input name="registar" class="btn btn-primary navbar-btn"  type="submit" value="<?php print $registar; ?>">
           </form>
   		  </div>
      </div>
 	  </div>
	  <div class="col-3">
	  </div>
  </div>
</div>

<?php
//verifica o registo
	if(isset($_POST["registar"]) && !empty($_POST["registar"])){
		$mybd->ligar_bd();
		$flag=0;
		if(isset($_POST["nomee"]) && !empty($_POST["nomee"])){
			if(verifica_nome($_POST["nomee"])==true && verifica_tamanho_string($_POST["nomee"],50)==true){
					$flag++;

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
			if($dao_utilizadores->verificar_email($_POST["emaill"])==false  && verifica_tamanho_string($_POST["emaill"],25)==true){
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
			$password=password_hash($_POST["passwordd"],PASSWORD_DEFAULT);
			if(verifca_password($_POST["passwordd"])==true){
			  $flag++;
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
			$utilizador= new utilizador(0,$_POST["nomee"],$_POST["emaill"],$password,1,date("Y-m-d"));
			//insere o utilizador na bd
			$dao_utilizadores->inserir_utilizador($utilizador);
			echo("<script>console.log('PHP: ".$utilizador->Tipo."');</script>");
			print('<script>
							jQuery(document).ready(function( $ ) {
							jQuery("#aviso_registo_sucesso").show();
							});
					  </script>');
			//volta a pagina principal
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

	if(isset($_POST["EditarPassword"]) && !empty($_POST["EditarPassword"])){
	    if(!strcmp($_POST["password1"],$_POST["password2"])){
	      if(verifca_password($_POST["password1"])==true && verifica_tamanho_string($_POST["password1"],16)==true){
		      $password=password_hash($_POST["password1"],PASSWORD_DEFAULT);
		      $utilizador_edita_pass=new Utilizador($_SESSION['AE_id_utilizador'],"","",$password,"","");
		      $dao_utilizadores->editar_utilizador($utilizador_edita_pass);
		      print('<script>
		                jQuery(document).ready(function( $ ) {
		                jQuery("#aviso_editar_certo").show();
		                });
		                $(document).ready(function(){
		                $("#myModal20").modal();
		                });
		                </script>');
header("refresh: 1;");
	      }else{//caracteristicas mal
	        print('<script>
	                jQuery(document).ready(function( $ ) {
	                jQuery("#aviso_carac_pass_nova").show();
	                });
	                $(document).ready(function(){
	                $("#myModal20").modal();
	                });
	                </script>');
	      }
	      }else{//password diferentes
	        print('<script>
	                jQuery(document).ready(function( $ ) {
	                jQuery("#aviso_password_diferente").show();
	                });
	                $(document).ready(function(){
	                $("#myModal20").modal();
	                });
	              </script>');
	      }
	}

	function verifica_tamanho_string($string,$maximoCaracteres){
	  if(strlen($string)>$maximoCaracteres)return false;
	  else return true;
	}

//desativa a conta e vai para a pagina index e elimina session
if(isset($_POST["DesativaConta"]) && !empty($_POST["DesativaConta"])){
	//adiciona um aviso para os gestores
	$notificacao=new Notificacao(0,null,2,$naoquerusar,date('Y-m-d'),date('H:m:s'),1,6);
	$dao_notificacao->inserir_notificacao($notificacao);
	//mete o estado da sua conta desativacao
	$dao_utilizadores->alterar_estado($_SESSION["AE_id_utilizador"],3);
	session_destroy();
	header('Location: index.php');
}



	function verifca_password($pass){
		//verifica se tem pelo menos um caracter maiusculo
		if(preg_match('/[A-Z]/',$pass)!=1)
			return false;// nao tem maisculas
		//verifica se tem pelo menos 9 carcteres
		if(strlen($pass)<8)
			return false;//tamanho invalido
		if(strlen($pass)>15)
			return false;//tamanho invalido
		//verifica se tem numeros
		if(preg_match('/[1-9]/', $pass)!=1)
			return false;//nao tem numeros
		return true;// (correto)
	}

  $conteudo_principal = ob_get_contents();
	$rodape=false;
  ob_end_clean();
  //master page
  include($layout);
?>
