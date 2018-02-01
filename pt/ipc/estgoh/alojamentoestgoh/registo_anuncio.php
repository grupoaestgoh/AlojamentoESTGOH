
<?php
//sessao
session_start();
//carregar controladores
include("./comum/carregacontroladores.php");

///verifica se gestor está autenticado
/*if (isset($_SESSION["AE_id_utilizador"]) && isset($_SESSION["AE_nome_utilizador"]) && isset($_SESSION["AE_email_utilizador"]) && isset($_SESSION["AE_estado_utilizador"]) && isset($_SESSION["AE_tipo_utilizador"] ) && isset($_SESSION["AE_data_incricao_utilizador"]) ){
  //Se tiver estado !=1 e o tipo !=1 vai  para pagina index.php
  if($_SESSION["AE_estado_utilizador"]!=1 || $_SESSION["AE_tipo_utilizador"]!=1 )header("Location: ./index.php");
}else{
  header("Location: ./index.php");
}
*/
$anuncio=new Anuncio(null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,0,0,null,null,null,null);
$Codigo_postal2=null;
$idanuncioEditar=0;

//verifica se é para editar algum anuncio
if(isset($_GET["id_anuncio_editar"]) && !empty($_GET["id_anuncio_editar"])){
  $mybd->ligar_bd();
  $anuncioVerifica=null;
  $anuncioVerifica=$dao_anuncios->listar_anuncios_anunciante($_SESSION["AE_id_utilizador"],-4);
  if($anuncioVerifica!=null){
    for ($i=0; $i <sizeof($anuncioVerifica) ; $i++) {
      $anuncioAA=$anuncioVerifica[$i];
      if($anuncioAA->Id_Anuncio==$_GET["id_anuncio_editar"]){
        $idanuncioEditar=$_GET["id_anuncio_editar"];
        $anuncio=$anuncioAA;
      }
    }
  }else{
  header('Location: meus_anuncios.php');
}
$mybd->desligar_bd();
}
//////


if(isset($_POST["idAnu"]) && !empty($_POST["idAnu"])){
  $anuncio->Email=$_POST["idAnu"];
}
if(isset($_POST["mail"]) && !empty($_POST["mail"])){
  $anuncio->Email=$_POST["mail"];
}
if(isset($_POST["tele"]) && !empty($_POST["tele"])){
  $anuncio->Telefone=$_POST["tele"];
}
if(isset($_POST["morada"]) && !empty($_POST["morada"])){
  $anuncio->Morada=$_POST["morada"];
}
if(isset($_POST["codigo"]) && !empty($_POST["codigo"])){
  $anuncio->Codigo_postal=$_POST["codigo"];
}
if(isset($_POST["codigo2"]) && !empty($_POST["codigo2"])){
  $Codigo_postal2=$_POST["codigo2"];
}
if(isset($_POST["titulo"]) && !empty($_POST["titulo"])){
  $anuncio->Titulo=$_POST["titulo"];
}
if(isset($_POST["preco"]) && !empty($_POST["preco"])){
  $anuncio->Preco=$_POST["preco"];
}
if(isset($_POST["informacao"]) && !empty($_POST["informacao"])){
  $anuncio->Descricao=$_POST["informacao"];
}
if(isset($_POST["casasim"]) ){
  if(!strcmp("sim",$_POST["casasim"]))$anuncio->Wc=1;
  else $anuncio->Wc=2;
}
if(isset($_POST["internetsim"])){
  if(!strcmp("sim",$_POST["internetsim"]))$anuncio->Internet=1;
  else $anuncio->Internet=2;
}
if(isset($_POST["despesasim"])){
  if(!strcmp("sim",$_POST["despesasim"]))$anuncio->Despesas=1;
  else $anuncio->Despesas=2;
}
if(isset($_POST["mobiliasim"])){
  if(!strcmp("sim",$_POST["mobiliasim"]))$anuncio->Mobilia=1;
  else $anuncio->Mobilia=2;
}
if(isset($_POST["utensiliosim"])){
  if(!strcmp("sim",$_POST["utensiliosim"]))$anuncio->Utensilios=1;
  else $anuncio->Utensilios=2;
}
if(isset($_POST["animalsim"])){
  if(!strcmp("sim",$_POST["animalsim"]))$anuncio->Animais=1;
  else $anuncio->Animais=2;
}
if(isset($_POST["raparigasim"])){
    if($anuncio->Rapariga==1)   $anuncio->Rapariga=0;
    if($anuncio->Rapariga==0)   $anuncio->Rapariga=1;
}
if(isset($_POST["rapazsim"])){
    if($anuncio->Rapaz==1)   $anuncio->Rapaz=0;
    if($anuncio->Rapaz==0)   $anuncio->Rapaz=1;
}
if(isset($_POST["longi"])){
    if(strcmp($_POST["longi"],"-7.861200571060181"))$anuncio->Longitude=$_POST["longi"];
}
if(isset($_POST["lati"])){
    if(strcmp($_POST["lati"],"40.36095028657701"))$anuncio->Latitude=$_POST["lati"];
}


//conteudo principal
ob_start();

?>
  <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navGestor" id="mainNav">
     <div class="container">
       <a class="navbar-brand"  href="registo_anuncio.php" ><font  size="6" color="white"><?php print $logotipo; ?></font></a>
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
             //busca todas as notificacoes
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
           <a href="registo_anuncio.php?TerminarSessao=TS" class="nav-link navGestorimg formabotao" ><i class="fa fa-fw fa-sign-out"></i><?php print $terminaSessao; ?></a>

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
           <form action="registo_anuncio.php"  Method="POST">
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
               <form action="registo_anuncio.php" method="POST">
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
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
        </div>
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

           <div id="aviso_registo_insucesso_nome" class="alert alert-success aviso_registo_insucesso_nome" role="alert">
                 <div class="row leftCaracteris">
                 <div class="col-lg-2 ">
                 <img class="alertaImg" src="img/img_aplicacao/certo.png" alt="">
                 </div>
                 <div class="col-lg-8">
                   <span class="glyphicon glyphicon-alert"><?php print $anuncioSucesso;?></span>
                 </div>
               </div>
             </div>

          <div class="row">
            <div class="addanuncio col-12">
              <form id="signup" enctype="multipart/form-data" action="registo_anuncio.php" method="post">
                  <div class="header">
                      <h3 class="baixo"><?php if(isset($_GET["id_anuncio_editar"])) print $edita; else print $insere;?></h3>
                      <p><?php if(isset($_SESSION["id_anuncio_editar"])) print $formulario;?></p>
                  </div>
                  <div class="sep"></div>
                  <p class="aviso"><?php print $obrigatorio;?></p>
                  <div class="inputs">
                      <div class="sep"></div>
                      <div class="header">
                          <p class="bold"><?php print $proprietario;?></p>
                      </div>

                      <div class="row">

                        <div class="col-lg-6">
                          <span id="falhaEmail" class="falhas" /><span>
                        </div>
                        <div class="col-lg-6">
                          <span id="falhaTelefone" class="falhas" /><span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <input type="email" id="malEmail" placeholder="<?php print $Remail;?>" name="mail"<?php if($anuncio->Email!=null) print (" value='".$anuncio->Email."' "); ?>  />
                        </div>
                        <div class="col-lg-6">
                         <input type="telefone" id="malTelefone" placeholder="<?php print $RTelefone;?>" name="tele" <?php if($anuncio->Telefone!=null) print (" value='".$anuncio->Telefone."' "); ?>   />
                        </div>
                      </div>
                      <div class="row">

                        <div class="col-lg-6">
                          <span id="falhaMorada" class="falhas" /><span>
                        </div>
                        <div class="col-lg-6">
                          <span id="falhaCodigo" class="falhas" /><span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <input type="morada" id="malMorada" placeholder="<?php print $Rmorada;?>*"  name="morada"<?php if($anuncio->Morada!=null) print (" value='".$anuncio->Morada."' "); ?>  />
                        </div>
                        <div class="col-lg-6">
                          <input type="postal" id="malCodigo" placeholder="<?php print $Rcodigo;?>"   name="codigo"<?php if($anuncio->Codigo_postal!=null) print (" value='".$anuncio->Codigo_postal."' "); ?>  />
                          <input type="postal2" id="malCodigo2" placeholder="" name="codigo2" <?php if($Codigo_postal2!=null) print (" value='".$Codigo_postal2."' "); ?> />
                        </div>
                      </div>
                      <div class="sep"></div>
                      <div class="header">
                          <p class="bold"><?php print $anuncio1;?></p>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <span id="falhaTitulo" class="falhas" /><span>
                        </div>
                        <div class="col-lg-12">
                          <input type="morada" id="malTitulo" placeholder="<?php print $Rtitulo;?>"  name="titulo"<?php if($anuncio->Titulo!=null) print (" value='".$anuncio->Titulo."' "); ?>  />
                        </div>
                        <div class="col-lg-12">
                          <span id="falhaPreco" class="falhas" /><span>
                        </div>
                        <div class="col-lg-12">
                          <input type="preco" id="malPreco" placeholder="<?php print $Rpreco;?>"  name="preco"<?php if($anuncio->Preco!=null) print (" value='".$anuncio->Preco."' "); ?>  />
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <span id="falhaDescricao" class="falhas" /><span>
                        </div>
                        <div class="col-lg-12">
                          <textarea  form="signup" id="malDescricao" placeholder="<?php print $Rdescricao;?>"  name="informacao" rows="3"   ><?php if($anuncio->Descricao!=null) print ($anuncio->Descricao); ?></textarea>
                        </div>
                      </div>



                      <div class="sep"></div>
                      <div class="header">
                          <p class="bold"><?php print $caracteristicasQ;?></p>
                      </div>
                      <div class="sublinha">
                        <div class="row">
                          <div class="col-4">
                            <p id="malWc" class="especific"><?php print $casabanho;?>
                          </div>

                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="radio"    value="sim" name="casasim" <?php if($anuncio->Wc!=null && $anuncio->Wc==1) print ( 'checked'); ?> ><?php print $sim;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="radio"    value="nao" name="casasim" <?php if($anuncio->Wc!=null && $anuncio->Wc==2) print ( 'checked'); ?> ><?php print $nao;?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="sublinha">
                        <div class="row">
                          <div class="col-4">
                            <p id="malInternet" class="especific"><?php print $internet1;?>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="radio"  value="sim" name="internetsim" <?php if($anuncio->Internet!=null && $anuncio->Internet==1) print ( 'checked'); ?>><?php print $sim;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                                <input type="radio"  value="nao" name="internetsim" <?php if($anuncio->Internet!=null && $anuncio->Internet==2) print ( 'checked'); ?>><?php print $nao;?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="sublinha">
                        <div class="row">
                          <div class="col-4">
                            <p id="malDespesas" class="especific"><?php print $despesas;?>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="radio"  value="sim" name="despesasim" <?php if($anuncio->Despesas!=null && $anuncio->Despesas==1) print ( 'checked'); ?>><?php print $sim;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                                <input type="radio"    value="nao"  name="despesasim" <?php if($anuncio->Despesas!=null && $anuncio->Despesas==2) print ( 'checked'); ?>><?php print $nao;?>
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="sublinha">
                        <div class="row">
                          <div class="col-4">
                            <p  id="malMobilia" class="especific"><?php print $mobilia;?>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="radio"  value="sim" name="mobiliasim" <?php if($anuncio->Mobilia!=null && $anuncio->Mobilia==1) print ( 'checked'); ?>><?php print $sim;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                                <input type="radio"    value="nao" name="mobiliasim" <?php if($anuncio->Mobilia!=null && $anuncio->Mobilia==2) print ( 'checked'); ?>><?php print $nao;?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="sublinha">
                        <div class="row">
                          <div class="col-4">
                            <p id="malUtensilios" class="especific"><?php print $utensilios1;?>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="radio"   value="sim" name="utensiliosim" <?php if($anuncio->Utensilios!=null && $anuncio->Utensilios==1) print ( 'checked'); ?>><?php print $sim;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                                <input type="radio"   value="nao"  name="utensiliosim" <?php if($anuncio->Utensilios!=null && $anuncio->Utensilios==2) print ( 'checked'); ?>><?php print $nao;?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="sublinha">
                        <div class="row">
                          <div class="col-4">
                            <p id="malAnimais" class="especific"><?php print $Animais1;?>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="radio"   value="sim" name="animalsim" <?php if($anuncio->Animais!=null && $anuncio->Animais==1) print ( 'checked'); ?>><?php print $sim;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                                <input type="radio"   value="nao" name="animalsim" <?php if($anuncio->Animais!=null && $anuncio->Animais==2) print ( 'checked'); ?>><?php print $nao;?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="sublinha">
                        <div class="row">
                          <div class="col-4">
                            <p class="especific"><?php print $sexoPermitido;?>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="checkbox"  name="rapazsim" <?php if( $anuncio->Rapaz==1) print ( 'checked'); ?>><?php print $rapaz;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                                <input type="checkbox"   name="raparigasim" <?php if( $anuncio->Rapariga==1) print ( 'checked'); ?>><?php print $rapariga;?>
                            </label>
                          </div>
                        </div>
                      </div>


                      <div class="row abaixu">
                        <div class="row col-12">
                          <div class="col-12">
                            <div class="header">
                                <p class="bold"><?php print $Localizacao1;?></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <span id="falhaLocalizacao" class="falhas" /><span>
                        </div>
                        <div  id="malLocalizacao" class="row col-12">
                          <div class="col-lg-12">
                            <div class="centro">
                              <div id="map">
                              </div>
                            </div>
                          </div>
                        </div>
                        <input type="hidden" id="longi"  name="longi" value="<?php if($anuncio->Longitude!=null)print $anuncio->Longitude;else print("-7.861200571060181");?>" />
                        <input type="hidden" id="lati"  name="lati" value="<?php if($anuncio->Latitude!=null)print $anuncio->Latitude;else print("40.36095028657701")?>" />
                        <input type="hidden" id="idAnu"  name="idAnu" value="<?php print $idanuncioEditar;?>" />

                        <script>
                          var previousMarker=null,latt=null,longi=null;
                          function myMap() {
                            lattt=document.getElementById('lati').value;
                            logii=document.getElementById('longi').value;
                            var mapOptions = {
                                center: new google.maps.LatLng(lattt,logii),
                                zoom: 17,
                                mapTypeId: google.maps.MapTypeId.HYBRID
                            }
                            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                            if (previousMarker != null)
                              previousMarker.setMap(null);
                            previousMarker = new google.maps.Marker({
                                  position: new google.maps.LatLng(lattt,logii),
                                  map: map
                            });




                            map.addListener("click", function(event) {
                              if (previousMarker != null)
                                previousMarker.setMap(null);
                              previousMarker = new google.maps.Marker({
                                    position: new google.maps.LatLng(event.latLng.lat(),event.latLng.lng()),
                                    map: map
                              });
                               document.getElementById('longi').value = event.latLng.lng();
                               document.getElementById('lati').value = event.latLng.lat();
                            });
                          }
                        </script>



                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUym-eQ2fwfbNuGmGYa2HJacaW5zRciLo&callback=myMap"></script>
                      </div>

                      <div class="header">
                          <p class="bold"><?php print $fotos;?></p>
                          <p class="tinyy"><?php if($idanuncioEditar==0)print $minimoimg; else print $naominimo;?></p>
                      </div>


                      <div  class="col-lg-12">
                        <div id="malFotos">
                        <?php
                        for ($i=0; $i <6 ; $i++) {
                            echo('<div class="row abaixu">
                                <div class="col-3">
                                  <input type="file" name="file'.($i).'" class="btn btnx";" >
                                </div>
                            </div>');

                      }


                      ?>
                    </div>

                      </div>
                      <div id="aceite" style="display:none;">
                        <div class="row">
                          <div class="col-12">
                              <p><?php print $anuncioSucesso;?></p>
                          </div>
                        </div>
                      </div>
                      <div class="botaoaddanuncio col-12">
                        <input id="submit" type="submit" name="InserirAnu" value="<?php print $adicionaAnu;?>" ></input>
                      </div>
                  </div>
              </form>
            </div>
          </div>
        </div><!-- /.container -->

       </div> <!-- /.col-lg-9 -->
      </div>
    </div>
    <!-- /.container -->



  <script>
  $(document).ready(function() {
      $('#dataTables-example').DataTable({
          responsive: true
      });
  });

  function Mudarestado(el) {
    var display = document.getElementById(el).style.display;
    if (display == "none")
      document.getElementById(el).style.display = 'block';
    else
      document.getElementById(el).style.display = 'none';
  }
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
  });
  </script>

  <?php


if(isset($_POST["InserirAnu"]) && !empty($_POST["InserirAnu"])){
  $arrayObjetoFotos=[];
  $tudoPreenchido=false;
  if($idanuncioEditar!=0){
    $tudoPreenchido=verifica_campos_prenechidos($anuncio,$Codigo_postal2,$tudoPreenchido);//ve campos preenchidos
    if($tudoPreenchido==true){
      $arrayObjetoFotos=verifica_imagens_tamanho($dao_anuncios,$mybd,$tudoPreenchido);// ve quantas imagens colocou
      if($arrayObjetoFotos==null)echo'<script>malFotos.style.border="2px solid red";</script>';
    }
    if($tudoPreenchido==true){
      if($arrayObjetoFotos!=null){
        //adiciona anuncio
        $anuncio->Proprietario=$_SESSION["AE_id_utilizador"];
        $anuncio->Codigo_postal=$anuncio->Codigo_postal."-".$Codigo_postal2;
        $anuncio->Data_Submetido=date('Y-m-d');
        $anuncio->Disponibilidade=1;
        $anuncio->Estado=1;
        arranjo_caracteristicas($anuncio);
        $mybd->ligar_bd();
        $dao_anuncios->inserir_anuncio($anuncio);
        //adiciona imagens na bd
        for ($i=0; $i <sizeof($arrayObjetoFotos); $i++) {
          $FotoObj=$arrayObjetoFotos[$i];
          $dao_fotos->inserir_foto($FotoObj);
        }
        //faz upload das imagens
        upload_imgens($arrayObjetoFotos,$Caminho);
        $mybd->desligar_bd();
        $anuncio=new Anuncio(null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,0,0,null,null,null,null);
        print('<script>
                jQuery(document).ready(function( $ ) {
                jQuery("#aviso_registo_insucesso_nome").show();
                });
                </script>');
      }
    }
  }else{
    $existemfotos=0;
    //se existir id anuncio a editar é diferente!!
      $tudoPreenchido=verifica_campos_prenechidos($anuncio,$Codigo_postal2,$tudoPreenchido);//ve campos preenchidos
      if($tudoPreenchido==true){
        for ($i=0; $i <6; $i++) {
          if(isset($_FILES["file".$i])){
            if($_FILES["file".$i]["name"] ){
              $existemfotos=1;
            }
          }
        }
        if($existemfotos==1)$arrayObjetoFotos=verifica_imagens_tamanho($dao_anuncios,$mybd,$tudoPreenchido);// ve quantas imagens colocou
        if($arrayObjetoFotos==null)echo'<script>malFotos.style.border="2px solid red";</script>';
      }
      if($tudoPreenchido==true){
        //adiciona anuncio
        $anuncio->Proprietario=$_SESSION["AE_id_utilizador"];
        $anuncio->Codigo_postal=$anuncio->Codigo_postal."-".$Codigo_postal2;
        $anuncio->Data_Submetido=date('Y-m-d');
        $anuncio->Disponibilidade=1;
        $anuncio->Estado=1;
        $dao_anuncios->editar_anuncio($anuncio);//edita o anuncio
        if($arrayObjetoFotos!=null){
          //falta remover todas as outras
          $dao_fotos->remover_foto($idanuncioEditar);
          //adiciona os novos
          for ($i=0; $i <sizeof($arrayObjetoFotos); $i++) {
            $FotoObj=$arrayObjetoFotos[$i];
            $dao_fotos->inserir_foto($FotoObj);
          }
        }
      }
  }
}
function arranjo_caracteristicas($anuncio){
  if($anuncio->Animais==2) $anuncio->Animais=0;
  if($anuncio->Despesas==2) $anuncio->Despesas=0;
  if($anuncio->Utensilios==2) $anuncio->Utensilios=0;
  if($anuncio->Internet==2) $anuncio->Internet=0;
  if($anuncio->Wc==2) $anuncio->Wc=0;
  if($anuncio->Mobilia==2) $anuncio->Mobilia=0;
}
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
        unset($_SESSION['AE_id_utilizador']);
        unset($_SESSION['AE_nome_utilizador']);
        unset($_SESSION['AE_email_utilizador']);
        unset($_SESSION['AE_estado_utilizador']);
        header('Location: index.php');
      }

  function verifica_campos_prenechidos($anuncio,$Codigo_postal2,$tudo){
    //ve se se Email esta  null se sim altera border
    if($anuncio->Email==null ){
      echo'<script>malEmail.style.border="2px solid red";</script>';
      $tudo=false;
    }
    if( verifica_tamanho_string($anuncio->Email,25)==false){
      echo'<script>$("#falhaEmail").text("O email possui demasiados caracteres!");</script>';
      echo'<script>malEmail.style.border="2px solid red";</script>';
    $tudo=false;
  }
    //ve se se Telefone esta  null se sim altera border
    if($anuncio->Telefone==null ){
      echo'<script>malTelefone.style.border="2px solid red";</script>';
      $tudo=false;

    }
    if( verifica_so_numeros($anuncio->Telefone)==false || verifica_tamanho_string($anuncio->Telefone,9)==false){
      echo'<script>malTelefone.style.border="2px solid red";</script>';
      echo'<script>$("#falhaTelefone").text("O telefone só pode ter 9 numeros!");</script>';
      $tudo=false;

    }
    //ve se se Morada esta  null se sim altera border
    if($anuncio->Morada==null ){
      echo'<script>malMorada.style.border="2px solid red";</script>';
      $tudo=false;
    }
    if( verifica_tamanho_string($anuncio->Morada,100)==false){
      echo'<script>malMorada.style.border="2px solid red";</script>';
      echo'<script>$("#falhaMorada").text("A morada tem um maximo de 100 caracteres!");</script>';
      $tudo=false;
    }
    //ve se se codigopostal esta  null se sim altera border
    if($anuncio->Codigo_postal==null){
      echo'<script>malCodigo.style.border="2px solid red";</script>';
      $tudo=false;
    }
    if( verifica_so_numeros($anuncio->Codigo_postal)==false  ||  verifica_so_numeros($Codigo_postal2)==false){
      echo'<script>malCodigo.style.border="2px solid red";</script>';
      echo'<script>malCodigo2.style.border="2px solid red";</script>';
      echo'<script>$("#falhaCodigo").text("O codigo tem de ter apenas numeros!");</script>';
      $tudo=false;
    }
    //ve se se codigopostal esta  null se sim altera border
    if($Codigo_postal2==null ){
      echo'<script>malCodigo2.style.border="2px solid red";</script>';
      $tudo=false;
    }
    if( (strlen($Codigo_postal2)+strlen($anuncio->Codigo_postal))>8 ){
      echo'<script>malCodigo.style.border="2px solid red";</script>';
      echo'<script>malCodigo2.style.border="2px solid red";</script>';
      echo'<script>$("#falhaCodigo").text("O codigo tem de ter tamanho ate 8 digitos!");</script>';
      $tudo=false;
    }
    //ve se se titulo esta  null se sim altera border
    if($anuncio->Titulo==null ){
      echo'<script>malTitulo.style.border="2px solid red";</script>';
      $tudo=false;
    }
    if( verifica_tamanho_string($anuncio->Titulo,40)==false){
      echo'<script>malTitulo.style.border="2px solid red";</script>';
      echo'<script>$("#falhaTitulo").text("O titulo do anuncio tem um maximo de 40 caracteres!");</script>';
      $tudo=false;
    }
    //ve se se titulo esta  null se sim altera border
    if($anuncio->Preco==null ){
      echo'<script>malPreco.style.border="2px solid red";</script>';
      $tudo=false;
    }
    if(verifica_so_numeros($anuncio->Preco)==false){
      echo'<script>malPreco.style.border="2px solid red";</script>';
      echo'<script>$("#falhaPreco").text("O preço é apenas contituido por digitos!");</script>';
      $tudo=false;
    }
    //ve se se Descricao esta  null se sim altera border
    if( verifica_tamanho_string($anuncio->Descricao,200)==false){
      echo'<script>malDescricao.style.border="2px solid red";</script>';
      $tudo=false;
    }
    if($anuncio->Descricao==null){
      echo'<script>malDescricao.style.border="2px solid red";</script>';
      echo'<script>$("#falhaDescricao").text("A descrição tem um maximo de 200 caracteres!");</script>';
      $tudo=false;
    }
    //ve se se Wc esta  null se sim altera border
    if($anuncio->Wc==null){
      echo'<script>malWc.style.border="2px solid red";</script>';
      $tudo=false;
    }
    //ve se se Wc esta  null se sim altera border
    if($anuncio->Internet==null){
      echo'<script>malInternet.style.border="2px solid red";</script>';
      $tudo=false;
    }
    //ve se se Wc esta  null se sim altera border
    if($anuncio->Despesas==null){
      echo'<script>malDespesas.style.border="2px solid red";</script>';
      $tudo=false;
    }
    //ve se se Wc esta  null se sim altera border
    if($anuncio->Mobilia==null){
      echo'<script>malMobilia.style.border="2px solid red";</script>';
      $tudo=false;
    }
    //ve se se Wc esta  null se sim altera border
    if($anuncio->Utensilios==null){
      echo'<script>malUtensilios.style.border="2px solid red";</script>';
      $tudo=false;
    }
    //ve se se Wc esta  null se sim altera border
    if($anuncio->Animais==null){
      echo'<script>malAnimais.style.border="2px solid red";</script>';
      $tudo=false;
    }
    //ve se se Wc esta  null se sim altera border
    if($anuncio->Latitude==null && $anuncio->Longitude==null){
      echo'<script>malLocalizacao.style.border="2px solid red";</script>';
      echo'<script>$("#falhaLocalizacao").text("Clique no mapa a localização da casa a arrendar!");</script>';
      $tudo=false;
    }
  if($tudo==false) echo'<script>malFotos.style.border="2px solid red";</script>';
  return $tudo;
}
function upload_imgens($arrayObjetoFotos,$Caminho){//carrega as imagens para a pasta da estgoh

  for ($i=0; $i <6; $i++) {
    if(isset($_FILES["file".$i])){
      if($_FILES["file".$i]["name"] ){
        $FotoObj=$arrayObjetoFotos[$i];
        $name = $FotoObj->Nome;
        $tmp_name = $_FILES["file".$i]['tmp_name'];
        $error = $_FILES["file".$i]['error'];
             if ($error !== UPLOAD_ERR_OK) {
                 echo 'Erro ao fazer o upload:', $error;
             } elseif (move_uploaded_file($tmp_name, $Caminho . $name)) {
              //print("<script>alert('uploaded!');</script>");
             }
      }
    }
  }
}


function verifica_imagens_tamanho($dao_anuncios,$mybd,$tudo){//ve se propriedades da imagens são aceites
    $arrayFotosCorreto=[];
    $posicao=0;
  //  $mybd=new BaseDados();
    $mybd->ligar_bd();

    //verifica tipo imagens, tamanho
    for ($i=0; $i <6; $i++) {
      if(isset($_FILES["file".$i])){
        if($_FILES["file".$i]["name"] ){
          $arr_info = pathinfo($_FILES["file".$i]['name']);
            //verificacao tamanho
            $tamanhoImg=$_FILES["file".$i]['size'];
            //extensao da imagem
            $extensao = $arr_info["extension"];
            if(($extensao=='jpg' || $extensao=='png' || $extensao=='gif') && ($tamanhoImg>10000 && $tamanhoImg<1000000) ){
                  $idAnuncioNovo=(sizeof($dao_anuncios->listar_anuncios(""))+1);
                  $nomeImg="anu_".$idAnuncioNovo."_".$posicao.".".$extensao;
                  $arrayFotosCorreto[$posicao]=new Foto(0,$idAnuncioNovo,'./img/img_anuncios/',$nomeImg);
                  $posicao++;
            }
        }
      }
    }
    $mybd->desligar_bd();

    if($posicao>=3){
      return $arrayFotosCorreto;
    }else{
      echo'<script>$("#falhaFotos").text("Deve colocar pelo menos tres fotos. Formatos permitidos-JPG/PNG/GIF. Tem de ter tamanho entre 10000 e 1000000!");</script>';
      echo'<script>malFotos.style.border="2px solid red";</script>';
      return null;

    }
}
function verifica_so_numeros($string){
    for ($i=0; $i < strlen($string); $i++) {
      if($string[$i]!="1" && $string[$i]!="2" && $string[$i]!="3" && $string[$i]!="4" && $string[$i]!="5" && $string[$i]!="6" && $string[$i]!="7" && $string[$i]!="8" && $string[$i]!="9" && $string[$i]!="0" )
      return false;
    }
    return true;
}

function verifica_tamanho_string($string,$maximoCaracteres){
  if(strlen($string)>$maximoCaracteres)return false;
  else return true;
}
      function verifca_password(){
    		//verifica se tem pelo menos um caracter maiusculo
    		if(preg_match('/[A-Z]/', $_POST["password1"])!=1)
    			return false;// nao tem maisculas
    		//verifica se tem pelo menos 9 carcteres
    		if(strlen($_POST["password1"])<8)
    			return false;//tamanho invalido
    		//verifica se tem numeros
    		if(preg_match('/[1-9]/', $_POST["password1"])!=1)
    			return false;//nao tem numeros
    		return true;// (correto)
    	}

  $rodape=false;
  $conteudo_principal = ob_get_contents();
  ob_end_clean();
  //master page
  include($layout);
  ?>
