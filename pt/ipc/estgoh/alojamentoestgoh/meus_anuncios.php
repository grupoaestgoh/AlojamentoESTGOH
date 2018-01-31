<?php
//sessao
session_start();
//carregar controladores
include("./comum/carregacontroladores.php");

//verifica se gestor está autenticado
/*if (isset($_SESSION["AE_id_utilizador"]) && isset($_SESSION["AE_nome_utilizador"]) && isset($_SESSION["AE_email_utilizador"]) && isset($_SESSION["AE_estado_utilizador"])){
  //Se não tiver sessao manda para pagina index.php
  if($_SESSION["AE_estado_utilizador"]!=1 )header("Location: ./index.php");
}else{
  header("Location: ./index.php");
}
*/

//conteudo principal
ob_start();

?>

<!-- Navigation -->


<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navGestor" id="mainNav">
 <div class="container">
   <a class="navbar-brand"  href="meus_anuncios.php" ><font  size="6" color="white"><?php print $logotipo; ?></font></a>
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
           <a href="desativar_proprietario.phpl"><?php print $DesaProprietario; ?></a>
         </li>
         <li>
           <a href="desativar_gestor.php"><?php print $DesaGestor; ?></a>
         </li>
       </ul>
     </li>
     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
       <a class="nav-link "  href="anuncios_denunciados.php" >
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
   <ul class="navbar-nav ml-auto ">

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
         //
         $mybd->ligar_bd();

         $notificacoes_uti=$dao_notificacao->listar_notificacoes(-1);//para anunciantes -$_SESSION["AE_id_utilizador"]
         if (sizeof($notificacoes_uti)>0) {
           for($i=0;$i<sizeof($notificacoes_uti);$i++){
             $notificacao=$notificacoes_uti[$i];
              echo(' <a class="dropdown-item" > <span class="text');
                 if($notificacao->Estado==0) {
                  if($notificacao->Cor==2 || $notificacao->Cor==3) print "-warning";
                  if($notificacao->Cor==1) print "-success";
                  if($notificacao->Cor==4 || $notificacao->Cor==5 || $notificacao->Cor==6) print "-danger";
                 }
                echo('"><!--successwarning/danger --> <strong>
                     <i class="fa"></i>');
                       if($notificacao->Cor==1) print $anu_aprovado;
                        else if($notificacao->Cor==2) print $anu_pendente;
                          else if($notificacao->Cor==3) print $pro_pendente;
                            else if($notificacao->Cor==4) print $den_denuncia;
                              else if($notificacao->Cor==5) print $anu_reprovado;
                                else if($notificacao->Cor==6) print $pro_desativa;

                     echo('</strong>
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
           <a href="meus_anuncios.php?TerminarSessao=TS" class="nav-link navGestorimg formabotao" ><i class="fa fa-fw fa-sign-out"></i><?php print $terminaSessao; ?></a>
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
   <form action="meus_anuncios.php"  Method="POST">
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
       <form action="meus_anuncios.php" method="POST">
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
   <!-- Modal ELiminar anuncio-->
   <div class="modal fade " id="myModalEliminar" role="dialog">
     <div class="modal-dialog">
   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       <h4 class="modal-title"><?php print $eliminarAnu ?></h4>
     </div>
     <div class="modal-body aumenta">
       <p><?php print $confirmaElimina ?></p>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-danger" data-dismiss="modal"><?php print $eliminar ?></button>
       <button type="button" class="btn btn-default" data-dismiss="modal"><?php print $Fechar ?></button>
     </div>
   </div>
   </div>
   </div>
   <!-- fim ELiminar -->
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-2">
        </div>
        <!--Secção da direita -->
        <div class="col-lg-9">
          <div class="container">
            <div class="row">
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
            <div class="linhaflex">
              <div class="row"> <!-- Primeira linha de items -->

			  <?php
              $mybd->ligar_bd();

			  $todos_anuncios=$dao_anuncios->listar_anuncios_anunciante(-2,0);

              $mybd->desligar_bd();

			  if($todos_anuncios == null)
				print $naoanuncios;
			  else{
				$mybd->ligar_bd();

				for ($i=0; $i <sizeof($todos_anuncios); $i++) {
					$anuncios=$todos_anuncios[$i];
					$Proprietario=$dao_utilizadores->obter_utilizador_id($anuncios->Proprietario);
			  ?>

                <!-- Primeiro Flex Item -->
                <div class="col-lg-6">
                  <div class="box">
                      <div class="col-lg-12">

                        <div class="row">

                            <div class="col-lg-12"><br>
                              <div class="imagemFlex">
                                <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                      <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
                                      <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
                                      <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
									  <?php if (file_exists("img/img_aplicacao/anu_".$anuncios->Id_Anuncio."_4.jpg")){ ?>
									  <li data-target="#carouselExampleIndicators1" data-slide-to="3"></li>
									  <?php } if (file_exists("img/img_aplicacao/anu_".$anuncios->Id_Anuncio."_5.jpg")){ ?>
									  <li data-target="#carouselExampleIndicators1" data-slide-to="4"></li>
									  <?php } if (file_exists("img/img_aplicacao/anu_".$anuncios->Id_Anuncio."_6.jpg")){ ?>
									  <li data-target="#carouselExampleIndicators1" data-slide-to="5"></li>
									  <?php } ?>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                      <div class="carousel-item active">
                                        <img class="d-block img-fluid" src="img/img_aplicacao/anu_<?php echo $anuncios->Id_Anuncio;?>_1.jpg">
                                      </div>
                                      <div class="carousel-item">
                                        <img class="d-block img-fluid" src="img/img_aplicacao/anu_<?php echo $anuncios->Id_Anuncio;?>_2.jpg">
                                      </div>
                                      <div class="carousel-item">
                                        <img class="d-block img-fluid" src="img/img_aplicacao/anu_<?php echo $anuncios->Id_Anuncio;?>_3.jpg">
                                      </div>
									  <?php if (file_exists("img/img_aplicacao/anu_".$anuncios->Id_Anuncio."_4.jpg")){ ?>
									    <div class="carousel-item">
                                          <img class="d-block img-fluid" src="img/img_aplicacao/anu_<?php echo $anuncios->Id_Anuncio;?>_4.jpg">
                                        </div>
									  <?php } if (file_exists("img/img_aplicacao/anu_".$anuncios->Id_Anuncio."_5.jpg")){ ?>
									    <div class="carousel-item">
                                          <img class="d-block img-fluid" src="img/img_aplicacao/anu_<?php echo $anuncios->Id_Anuncio;?>_5.jpg">
                                        </div>
									  <?php } if (file_exists("img/img_aplicacao/anu_".$anuncios->Id_Anuncio."_6.jpg")){ ?>
									    <div class="carousel-item">
                                          <img class="d-block img-fluid" src="img/img_aplicacao/anu_<?php echo $anuncios->Id_Anuncio;?>_6.jpg">
                                        </div>
									  <?php
									  }
									  ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only"></span>
                                    </a>
                                  </div>
                              </div>
                            </div>
                        </div>
                      <div class="textodoquarto">
                       <div id="icones<?php echo $anuncios->Id_Anuncio;?>">
                          <div class="row">
                              <div class="col-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="listaimovel">
									  <?php
									  if($anuncios->Internet == 1){
									  ?>
									    <img src="img/img_aplicacao/correct.png" alt="Tem">
									  <?php
									  }else{
									  ?>
									    <img src="img/img_aplicacao/cross.png" alt="Tem">
									  <?php
									  }
									  ?>
                                    </div>
                                    <p class="textoimovel"><?php print $internet ?></p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="listaimovel">
									  <?php
									  if($anuncios->Despesas == 1){
									  ?>
									    <img src="img/img_aplicacao/correct.png" alt="Tem">
									  <?php
									  }else{
									  ?>
									    <img src="img/img_aplicacao/cross.png" alt="Tem">
									  <?php
									  }
									  ?>
                                    </div>
                                    <p class="textoimovel"><?php print $despesas ?></p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="listaimovel">
									  <?php
									  if($anuncios->Wc == 1){
									  ?>
									    <img src="img/img_aplicacao/correct.png" alt="Tem">
									  <?php
									  }else{
									  ?>
									    <img src="img/img_aplicacao/cross.png" alt="Tem">
									  <?php
									  }
									  ?>
                                    </div>
                                    <p class="textoimovel"><?php print $casabanho ?></p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="listaimovel">
									  <?php
									  if($anuncios->Mobilia == 1){
									  ?>
									    <img src="img/img_aplicacao/correct.png" alt="Tem">
									  <?php
									  }else{
									  ?>
									    <img src="img/img_aplicacao/cross.png" alt="Tem">
									  <?php
									  }
									  ?>
                                    </div>
                                    <p class="textoimovel"><?php print $mobilia ?></p>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="listaimovel">
									  <?php
									  if($anuncios->Rapaz == 1){
									  ?>
									    <img src="img/img_aplicacao/correct.png" alt="Tem">
									  <?php
									  }else{
									  ?>
									    <img src="img/img_aplicacao/cross.png" alt="Tem">
									  <?php
									  }
									  ?>
                                    </div>
                                    <p class="textoimovel"><?php print $rapazes ?></p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="listaimovel">
									  <?php
									  if($anuncios->Rapariga == 1){
									  ?>
									    <img src="img/img_aplicacao/correct.png" alt="Tem">
									  <?php
									  }else{
									  ?>
									    <img src="img/img_aplicacao/cross.png" alt="Tem">
									  <?php
									  }
									  ?>
                                    </div>
                                    <p class="textoimovel"><?php print $raparigas ?></p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="listaimovel">
									  <?php
									  if($anuncios->Animais == 1){
									  ?>
									    <img src="img/img_aplicacao/correct.png" alt="Tem">
									  <?php
									  }else{
									  ?>
									    <img src="img/img_aplicacao/cross.png" alt="Tem">
									  <?php
									  }
									  ?>
                                    </div>
                                    <p class="textoimovel"><?php print $Animais ?></p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="listaimovel">
									  <?php
									  if($anuncios->Utensilios == 1){
									  ?>
									    <img src="img/img_aplicacao/correct.png" alt="Tem">
									  <?php
									  }else{
									  ?>
									    <img src="img/img_aplicacao/cross.png" alt="Tem">
									  <?php
									  }
									  ?>
                                    </div>
                                    <p class="textoimovel"><?php print $utensilios ?></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div id="MDetalhe<?php echo $anuncios->Id_Anuncio;?>" style="display:block;">
                          <button type="button" class="btn btn-info" onclick="Mudarestado('icones<?php echo $anuncios->Id_Anuncio;?>'); Mudarestado('EDetalhe<?php echo $anuncios->Id_Anuncio;?>'); Mudarestado('MDetalhe<?php echo $anuncios->Id_Anuncio;?>'); "><?php print $mostraDet ?></button>
                        </div>
                        <div id="EDetalhe<?php echo $anuncios->Id_Anuncio;?>" style="display:none;">
                          <button type="button" class="btn btn-info" onclick="Mudarestado('icones<?php echo $anuncios->Id_Anuncio;?>'); Mudarestado('EDetalhe<?php echo $anuncios->Id_Anuncio;?>'); Mudarestado('MDetalhe<?php echo $anuncios->Id_Anuncio;?>'); "><?php print $escondeDet ?></button>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                              <div class="contato">
                                <div class="row">
                                  <div class="col-md-2">
                                    <img class="imgpequena" src="img/img_aplicacao/user.png" alt="Dono">
                                  </div>
                                  <div class="col-md-4">
                                    <p><?php print $Proprietario->Nome ?></p>
                                  </div>
                                  <div class="col-md-2">
                                    <img class="imgpequena" src="img/img_aplicacao/telefone.png" alt="Telefone">
                                  </div>
                                  <div class="col-md-4">
                                    <p><?php print $anuncios->Telefone ?></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-2">
                                    <img class="imgpequena" src="img/img_aplicacao/location.png" alt="Localização">
                                  </div>
                                  <div class="col-md-10">
                                    <p class="noalign"><?php print $anuncios->Morada ?></p>
                                   </div>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="row">
                              <div class="col-lg-12">
                                <div class="container">
                                  <div class="radiodisponibilidade">
                                    <form action="" method="post">
									  <input type="hidden" name="idAnuA" value=<?php echo $anuncios->Id_Anuncio ?> />
                                      <div class="row">
                                        <div class="col-6">
                                          <input type="radio" onchange="this.form.submit();" name="optradio" value="1" <?php if($anuncios->Disponibilidade == 1) print"checked" ;?>> <?php print $livre;?>
                                        </div>
                                        <div class="col-6">
                                          <input type="radio" onchange="this.form.submit();" name="optradio" value="0" <?php if($anuncios->Disponibilidade == 0) print"checked";?>> <?php print $ocupado;?>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-lg-12">
                                <p class="textoimovel test"><?php print $anuncios->Descricao ?></p>
                              </div>
                        </div>
                      </div>
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="precodiv">
                                <p class="preco"><?php print $anuncios->Preco ?> €</p>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="botoesFlex">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="btneditar">
                                      <form action="registo_anuncio.php" method="post">
										<input type="hidden" name="id_Anu" value=<?php echo $anuncios->Id_Anuncio; ?> />
										<input type="submit" name="btnEditar"  class="btn btn-primary" value="<?php print $editar ?>"/>
									  </form>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="btneliminar">
                                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalEliminar"><?php print $eliminar ?></button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
				<?php
				}
			  }
				?>
                <!-- /.Primeiro Flex Item -->

                <!-- /.Segundo Flex Item-->
              </div> <!-- /.Primeira linha de items -->
              <!-- Adicionar mais linhas -->

              <!-- Fim De Linhas -->
          </div> <!-- /.linhaflex div -->
         </div><!-- /.container -->
         <div class="row">
           <div class="col-lg-12">
             <div class="paginacao">
               <ul class="pagination">
                 <li><a href="#"><</a></li>
                 <li class="active"><a href="#">1</a></li>
                 <li><a href="#">2</a></li>
                 <li><a href="#">3</a></li>
                 <li><a href="#">4</a></li>
                 <li><a href="#">5</a></li>
                 <li><a href="#">></a></li>
               </ul>
             </div>
           </div>
         </div>
        </div>
        <!--Fim Secção da direita -->
      </div>
    </div>
    <!-- /.container -->

  <!-- Scripts -->
  <script>
  function Mudarestado(el) {
    var display = document.getElementById(el).style.display;
    if (display == "none")
      document.getElementById(el).style.display = 'block';
    else
      document.getElementById(el).style.display = 'none';
  }
  </script>
  <!-- Fim Scripts -->
  <?php
  if(isset($_POST["EditarPassword"]) && !empty($_POST["EditarPassword"])){
      if(!strcmp($_POST["password1"],$_POST["password2"])){
        if(verifca_password($_POST["password1"])==true && verifica_tamanho_string($password,15)==true){
        $password=password_hash($_POST["password1"],PASSWORD_DEFAULT);
        $utilizador_edita_pass=new Gestor($_SESSION['AE_id_utilizador'],"","",$password,"","");
        $dao_utilizadores->editar_utilizador($utilizador_edita_pass);
          print('<script>
                  jQuery(document).ready(function( $ ) {
                  jQuery("#aviso_registo_sucesso").show();
                  });
                  $(document).ready(function(){
                  $("#myModal20").modal();
                  });
                  </script>');
          header("refresh: 1;registo_anuncio.php");

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
        $dao_utilizadores->alterar_estado($_SESSION["AE_id_utilizador"],3);
        unset($_SESSION['AE_id_utilizador']);
        unset($_SESSION['AE_nome_utilizador']);
        unset($_SESSION['AE_email_utilizador']);
        unset($_SESSION['AE_estado_utilizador']);
        //adiciona um aviso para os gestores
        $notificacao=new Notificacao(0,null,2,$naoquerusar,date('Y-m-d'),date('H:m:s'),1,6);
        $dao_notificacao->inserir_notificacao($notificacao);
        //mete o estado da sua conta desativacao
        $dao_utilizadores->alterar_estado($_SESSION["AE_id_utilizador"],3);
        header('Location: index.php');
      }
    //termina sessão
    if(isset($_GET["TerminarSessao"]) && !empty($_GET["TerminarSessao"])){
    /*  unset($_SESSION['AE_id_utilizador']);
      unset($_SESSION['AE_nome_utilizador']);
      unset($_SESSION['AE_email_utilizador']);
      unset($_SESSION['AE_estado_utilizador']);*/
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

	//altera a disponibilidade do anuncio
	if(isset($_POST["optradio"])){
	  if ($_POST["optradio"] == "1"){
        $mybd->ligar_bd();
        $anuncioEdita=$dao_anuncios->obter_anuncio($_POST["idAnuA"]);
        $anuncioEdita->Disponibilidade=1;
        $dao_anuncios->editar_anuncio($anuncioEdita);
        $mybd->desligar_bd();
	   	header("Refresh:0");
  	  }
	  else{
		$mybd->ligar_bd();
		$anuncioEdita=$dao_anuncios->obter_anuncio($_POST["idAnuA"]);
		$anuncioEdita->Disponibilidade=0;
		$dao_anuncios->editar_anuncio($anuncioEdita);
		$mybd->desligar_bd();
		header("Refresh:0");
	  }
	}

      $rodape=false;
      $conteudo_principal = ob_get_contents();
      ob_end_clean();
      //master page
      include($layout);
  ?>
