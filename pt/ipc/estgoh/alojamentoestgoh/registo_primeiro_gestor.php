
<?php
		//sessao
		session_start();
		//carregar controladores
		include("./comum/carregacontroladores.php");
		$dao_utilizador=new DAOUtilizadores();

		if (isset($_SESSION["AE_tipo_utilizador"])){
				header ( "Location: ./index.php" );
		}elseif($dao_utilizadores->verificar_gestor() == true) {
				header ( "Location: ./index.php" );
		}
		//conteudo principal
		ob_start();


		if(isset($_POST["emailR"]) && !empty($_POST["emailR"])){
			$_POST["emailR"];
		}
		if(isset($_POST["nomeR"]) && !empty($_POST["nomeR"])){
			$_POST["nomeR"];
		}
		if(isset($_POST["passwordR"]) && !empty($_POST["passwordR"]) ){
			$_POST["passwordR"];
		}
?>

    <!-- Header -->
    <header class="intro-header" >
      <div class="container">
        <div class="intro-message posicaoRA">
          <h1><?php print $logotipo?></h1>
          <hr class="intro-divider aumentar">
          <ul class="list-inline intro-social-buttons ">
            <li class="list-inline-item espacosRA" style="background-color: rgba(100,100,100,0.6);">
              <h3><?php print $regPrimeiroges?></h3>
                <hr class="intro-divider aumentar2">
              <form action="registo_primeiro_gestor.php" method="POST">
                <br>
                  <label><b><?php print $email?></b></label><br>
                  <input class="form-control" type="email" placeholder="Email" value="<?php if(isset($_POST["emailR"]) && !empty($_POST["emailR"])){print $_POST["emailR"]; } ?>" name="emailR" required>
                  <br>
                  <label><b><?php print $password?></b></label><br>
                  <input class="form-control" type="password" placeholder="Password" value="<?php if(isset($_POST["passwordR"]) && !empty($_POST["passwordR"])){print $_POST["passwordR"]; } ?>" name="passwordR" required>
                  <br>
                  <label><b><?php print $nome?></b></label><br>
                  <input class="form-control" type="nome" placeholder="Nome" value="<?php if(isset($_POST["nomeR"]) && !empty($_POST["nomeR"])){print $_POST["nomeR"]; } ?>" name="nomeR"  required>
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
                  <input name="registar" class="btn btn-primary navbar-btn"  type="submit" value="<?php print $registar; ?>">
              </form>
            </li>
          </ul>
        </div>
      </div>
    </header>

<?php
		//verifica o registo
		if(isset($_POST["registar"]) && !empty($_POST["registar"])){
			$mybd->ligar_bd();
			$flag=0;
			if(isset($_POST["nomeR"]) && !empty($_POST["nomeR"])){
				if(verifica_nome($_POST["nomeR"])==true && verifica_tamanho_string($_POST["nomeR"],50)!=false){
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
				if( verifica_tamanho_string($_POST["emailR"],25)!=false){
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

			if(isset($_POST["passwordR"]) && !empty($_POST["passwordR"]) ){
				if(verifca_password($_POST["passwordR"])==true && verifica_tamanho_string($_POST["passwordR"],15)!=false){
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
				$utilizador= new utilizador(0,$_POST["nomeR"],$_POST["emailR"],$password,0,date("Y-m-d"));
				//insere o utilizador na bd
				if($dao_utilizadores->inserir_utilizador($utilizador)==true)	        header("refresh: 1;./index.php");
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
			function verifica_tamanho_string($string,$maximoCaracteres){
			  if(strlen($string)>$maximoCaracteres)return false;
			  else return true;
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

			print('<script>
							jQuery(document).ready(function( $ ) {
									jQuery("body").css("background-color","#0775b8");
							});
					</script>');


			$conteudo_principal = ob_get_contents();
			ob_end_clean();
			//master page
			include($layout);
?>
