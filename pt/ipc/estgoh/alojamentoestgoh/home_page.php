<?php
//sessao
session_start();
//carregar controladores
include("./comum/carregacontroladores.php");

//verificar autenticação
if (!isset($_SESSION["AE_tipo_utilizador"])){
  //se tiver sessãon vai buscar utilizador e ve o tipo para poder redirecionar para a pagina correta//Falta isso !!
  header("Location: ./index.php");
}


//conteudo principal
ob_start();

?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top nav_home"  >
      <ul class="navbar-nav ml-auto nav_home-nav">
        <li class="nav-item">
           <a href="?lingua=pt"> <img src="./img/img_aplicacao/pt.jpg" alt=""> </a>
        </li>
        <li class="nav-item hidden"> </li>
        <li class="nav-item">
           <a href="?lingua=en"> <img src="./img/img_aplicacao/UK.jpg" alt=""> </a>
        </li>
      </ul>
      <div class="container">
        <a class="navbar-brand"  href="./home_page.php" ><p class="navtitle"><?php print $logotipo; ?></p></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto nav_home-nav">
            <li class="nav-item dropdown">
              <a class="nav_home-link nav-link dropdown-toggle mr-lg-2 navGestorimg" id="alertsDropdown"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user " aria-hidden="true"></i>
                <span class="d-lg-none"><?php print $MeusDados; ?>
                  <span class="badge badge-pill badge-warning">6 <?php print $novas; ?></span>
                </span>

              </a>
              <div class="dropdown-menu dados" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header"><?php print $MeusDados1; ?></h6>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item"  >
                 <strong> <?php print $nome; ?></strong>
                  <div class="dropdown-message small"><?php print $_SESSION["AE_nome_utilizador"]; ?></div>
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item"  >
                 <strong><?php print $email; ?> </strong>
                  <div class="dropdown-message small"><?php print $_SESSION["AE_email_utilizador"]; ?></div>
                </a>


                <a class="dropdown-item"  >
                  <strong>
                    <i class="fa"></i>
                    <button type="button" class="nav-link especialBotao"  data-toggle="modal" data-target="#myModal20"><font  size="4" color="black"><?php print $alteraDados; ?></font></button>
                  </strong>


                </a>
              </div>
            </li>
            <li class="nav-item">
                  <a href="./comum/logout.php" class="nav_home-link nav-link navGestorimg " ><i class="fa fa-fw fa-sign-out"></i><?php print $terminaSessao; ?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


   <div id="myModal20" class="modal fade" role="dialog">
     <!-- Modal ELiminar -->
     <div class="modal fade" id="myModalDesativar" role="dialog">
       <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content">
       <form action="home_page.php"  Method="POST">
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
           <form action="home_page.php" method="POST">
             <br>
               <label class="corPreta" ><b><?php print $PassNova;?></b></label><br>
               <input class="form-control" type="password" placeholder="Password" name="password1" data-toggle="tooltip" title="Se quer alterar o email insira um novo e edite!Caso contrario deixe o inicial!">
               <br>
               <label class="corPreta"><b><?php print $PassNovaRepete;?></b></label><br>
               <input class="form-control" type="password" placeholder="Repetir password" name="password2" data-toggle="tooltip" title="Se quer alterar a password insira uma nova e edite!">
               <br>

               <div id="aviso_registo_sucesso" class="alert alert-success aviso_registo_sucesso" role="alert">
                     <div class="row leftCaracteris">
                     <div class="col-lg-2 ">
                     <img class="alertaImg" src="img/img_aplicacao/certo.png" alt="">
                     </div>
                     <div class="col-lg-8">
                       <span class="glyphicon glyphicon-alert"><?php print $alteradaSucessoPass;?></span>
                     </div>
                   </div>
                 </div>
                 <div id="aviso_registo_insucesso_password" class="alert alert-danger aviso_registo_insucesso_password" role="alert">
                       <div class="row leftCaracteris">
                       <div class="col-lg-2 ">
                       <img class="alertaImg" src="img/img_aplicacao/alerta.png" alt="">
                       </div>
                       <div class="col-lg-8">
                         <span class="glyphicon glyphicon-alert"><?php print $caracPassword;?></span>
                       </div>
                     </div>
                   </div>
                   <div id="aviso_login_insucesso" class="alert alert-danger aviso_login_insucesso" role="alert">
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
            <div  id="spn">
              <?php
                if($_SESSION["AE_tipo_utilizador"]==3){
                    print "<a id=\"btn\" href=\"./ver_todos_anuncios.php\">$Ver_Anuncios</a>";
                }elseif($_SESSION["AE_tipo_utilizador"]==2){
                    print "<a id=\"btn\" href=\"./anuncios.php\">$Ver_Anuncios</a>";
                }else{
                    print "<a id=\"btn\" href=\"./meus_anuncios.php\">$Ver_Anuncios</a>";
                }
              ?>
            </div>
    			</ul>
    			</div>
    		</div>
    	</header>
    </section>


    <?php
    if(isset($_POST["EditarPassword"]) && !empty($_POST["EditarPassword"])){
        if(!strcmp($_POST["password1"],$_POST["password2"])){
          if(verifca_password($_POST["password1"])==true && verifica_tamanho_string($_POST["password1"],15)==true){
          $password=password_hash($_POST["password1"],PASSWORD_DEFAULT);
          $utilizador_edita_pass=new Utilizador($_SESSION['AE_id_utilizador'],"","",$password,"","");
          $dao_utilizadores->editar_utilizador($utilizador_edita_pass);
            print('<script>
                    jQuery(document).ready(function( $ ) {
                    jQuery("#aviso_registo_sucesso").show();
                    });
                    $(document).ready(function(){
                    $("#myModal20").modal();
                    });
                    </script>');
            header("refresh: 1;");

          }else{//caracteristicas mal
            print('<script>
                    jQuery(document).ready(function( $ ) {
                    jQuery("#aviso_registo_insucesso_password").show();
                    });
                    $(document).ready(function(){
                    $("#myModal20").modal();
                    });
                    </script>');
            }
          }else{//password diferentes
              print('<script>
                    jQuery(document).ready(function( $ ) {
                    jQuery("#aviso_login_insucesso").show();
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
        		//verifica se tem numeros
        		if(preg_match('/[1-9]/',$pass)!=1)
        			return false;//nao tem numeros
        		return true;// (correto)
        	}


    print('<script>
            jQuery(document).ready(function( $ ) {
                jQuery("body").css("background-color","#f8f8f8");
            });
        </script>');
    $rodape=true;
    $conteudo_principal = ob_get_contents();
    ob_end_clean();
    //master page
    include($layout);
?>
