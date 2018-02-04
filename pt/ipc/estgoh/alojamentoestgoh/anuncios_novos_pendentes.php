<?php
//sessao
session_start();
//carregar controladores
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
       <form action="anuncios_novos_pendentes.php"  Method="POST">
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
           <form action="anuncios_novos_pendentes.php" method="POST">
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
      <div class="row">

        <div class="col-lg-3"></div>

        <div class="col-lg-9">

          <div class="container">



            <div class="linhaflex">
              <div class="titulo">
              <?php print $AnuNovosPend;?>
            </div>
              <div class="card mb-3">

                <!-- Modal ELiminar -->
                <div class="modal fade" id="myModalEliminar" role="dialog">
                  <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <form action="#">
                  <div class="modal-header divAzul">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title corBranca"><?php print $rejeitarAnu;?></h4>
                  </div>
                  <div class="modal-body">
                    <p><?php print $motivoRej;?></p>
                    <textarea class="form-control" rows="3" required></textarea>
                  </div>
                  <div id="aviso_registo_insucesso_nome" class="alert alert-success" role="alert" style="display:none;" >
                      <div class="row leftCaracteris">
                      <div class="col-lg-2 ">
                      <img class="alertaImg" src="img/img_aplicacao/certo.png" alt="">
                      </div>
                      <div class="col-lg-8">
                        <span class="glyphicon glyphicon-alert"><?php print $rejetadoSuce;?></span>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" onclick="Mudarestado('Aviso3')"><?php print $rejeitar;?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php print $Fechar;?></button>
                  </div>
                </form>
                </div>
              </div>
            </div>


                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th><?php print $titulo;?></th>
                          <th><?php print $Preco;?></th>
                          <th><?php print $local;?></th>
                          <th><?php print $Anunciante;?></th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th><?php print $titulo;?></th>
                          <th><?php print $Preco;?></th>
                          <th><?php print $local;?></th>
                          <th><?php print $Anunciante;?></th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                      </tfoot>
                    <tbody>
                      <?php
                      $mybd->ligar_bd();
                      $anuncios_novos_pendentes=$dao_anuncios->listar_anuncios_anunciante(-1,2);

                        if(sizeof($anuncios_novos_pendentes)==0){
                          echo('<tr>');
                          echo('<td>Não tem anuncios novos pendentes!</td>');
                          echo('</tr>');
                        }else{
                          for ($i=0; $i <sizeof($anuncios_novos_pendentes); $i++) {
                            $anuncios=$anuncios_novos_pendentes[$i];
                            $fotosAnuncio=$dao_fotos->listar_fotos_anuncio($anuncios->Id_Anuncio);
                            $Proprietario=$dao_utilizadores->obter_utilizador_id($anuncios->Proprietario);
                            echo('<tr>');
                            echo('<td>'.$anuncios->Titulo.'</td>');
                            echo('<td>'.$anuncios->Preco.'</td>');
                            echo('<td>'.$anuncios->Morada.'</td>');
                            echo('<td>'.$Proprietario->Nome.'</td>');
                            echo('<td><a data-toggle="modal" href="#a'.$anuncios->Id_Anuncio.'"><i class="fa fa-eye" style="font-size:24px"></i></a></td>');
                            echo('<td><form action="anuncios_novos_pendentes.php" Method="POST"><input type="hidden" name="idAnuA" value='.$anuncios->Id_Anuncio.'>  <input name="aceitar" class="btn btn-success"  type="submit" value='.$aceitar.'></form></td>');
                            echo('<td><a data-toggle="modal" class="btn btn-danger" href="#b'.$anuncios->Id_Anuncio.'">'.$rejeitar.'</a></td>');
                            echo('</tr>');
                            //modal para eliminar anuncios
                            echo('<div class="modal fade" id="b'.$anuncios->Id_Anuncio.'">
                              <div class="modal-dialog">
                            <div class="modal-content">
                              <form action="anuncios_novos_pendentes.php" Method="POST">

                              <div class="modal-header divAzul">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title corBranca">'.$rejeitarAnu.'</h4>
                              </div>
                              <div class="modal-body">
                                <p>'.$motivoRej.'</p>
                                <textarea class="form-control" rows="3" id="malmotivo'.$anuncios->Id_Anuncio.'" name="motivo'.$anuncios->Id_Anuncio.'" required></textarea>
                                <span id="falhamotivo'.$anuncios->Id_Anuncio.'" class="falhas" /><span>

                              </div>
                              <input type="hidden" name="idAnuR" value='.$anuncios->Id_Anuncio.'>


                             <div class="modal-footer">
                             <input name="elimina" class="btn btn-danger"  type="submit" value='.$rejeitar.'>
                                <button type="button" class="btn btn-default" data-dismiss="modal">'.$Fechar.'</button>

                              </div>
                            </form>
                            </div>
                            </div>
                            </div>');
                            //modal para ver anuncios
                            echo('<div class="modal fade" id="a'.$anuncios->Id_Anuncio.'">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header divAzul">
                                <button type="button" class="close " data-dismiss="modal">&times;</button>
                                <h4 class="modal-title corBranca">'.$anuncio.'</h4>
                              </div>
                              <div class="modal-body">
                                <!-- Page Content -->
                                <div class="container espaco">
                                  <div class="row">
                                    <!-- Blog Entries Column -->
                                    <div class="col-md-8">
                                      <h1 class="my-4">'.$anuncios->Titulo.'
                                      </h1>
                                      <!-- Blog Post -->
                                      <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="imagemFlex">

                                                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                        <ol class="carousel-indicators" >');
                                                        for($l=0;$l<sizeof($fotosAnuncio);$l++){
                                                          echo('<li data-target="#carouselExampleIndicators" data-slide-to="'.$l.'"');
                                                          if($l==0)print "class='active'";
                                                          echo('></li>');
                                                        }
                                                        echo('</ol>
                                                                <div class="carousel-inner" role="listbox">
                                                                      ');
                                                                      for($l=0;$l<sizeof($fotosAnuncio);$l++){
                                                                        $foto=$fotosAnuncio[$l];
                                                                        echo('<div class="carousel-item');
                                                                        if($l==0)print " active";
                                                                        echo(' " >
                                                                          <img src="'.$foto->Caminho.$foto->Nome.'" alt="" width="100%">
                                                                        </div>');
                                                                      }
                                                              echo('</div>
                                                    </div>
                                              </div>
                                            </div>

                                            <div class="card-body ">
                                              <p class="card-text">
                                                '.$anuncios->Descricao.'
                                            </div>
                                            <div class="card-footer text-muted ">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Sidebar Widgets Column -->
                                    <div class="col-md-4 ">
                                      <!-- Search Widget -->
                                      <div class="card my-4 ">
                                        <h5 class="card-header corPreta divAzul">'.$Preco.'</h5>
                                        <div class="card-body">
                                            '.$anuncios->Preco.''.$eurosmes.'
                                        </div>
                                      </div>
                                      <!-- Categories Widget -->
                                      <div class="card my-4 ">
                                        <h5 class="card-header corPreta divAzul">'.$contacto.'</h5>
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-lg-12">
                                              <ul class="list-unstyled mb-0">
                                                <li>
                                                  '.$Proprietario->Nome.'
                                                </li>
                                                <li>
                                                  '.$anuncios->Telefone.'
                                                </li>
                                              </ul>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Side Widget -->
                                      <div class="card my-4 ">
                                        <h5 class="card-header corPreta divAzul">'.$caracteristicas.'</h5>
                                        <div class="card-body">
                                          <div class="row leftCaracteris">
                                            <div class="col-lg-6 ">
                                                  <ul class="list-unstyled mb-0 comPontos">

                                                    <li ');
                                                    if($anuncios->Wc==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                                                    echo('>'.$wc.' </li>  <li ');
                                                    if($anuncios->Mobilia==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                                                    echo('>'. $mobilada.'  </li><li ');
                                                    if($anuncios->Utensilios==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                                                    echo('>'.$utensilios.'  </li><li ');
                                                    if($anuncios->Internet==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                                                    echo('>'.$internet.'</li>
                                                  </ul>
                                              </div>
                                              <div class="col-lg-6 ">
                                                    <ul class="list-unstyled mb-0 comPontos">

                                                      <li ');
                                                      if($anuncios->Rapariga==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                                                      echo('>'.$raparigas.' </li>  <li ');
                                                      if($anuncios->Rapaz==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                                                      echo('>'. $rapazes.'  </li><li ');
                                                      if($anuncios->Despesas==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                                                      echo('>'.$despesas.'  </li><li ');
                                                      if($anuncios->Animais==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                                                      echo('>'.$Animais.'</li>
                                                    </ul>
                                                </div>

                                        </div>
                                        </div>
                                      </div>
                                      <div class="card my-4">
                                        <h5 class="card-header corPreta divAzul">'.$Localizacao.'</h5>
                                          <div id="map" class="card-header mapa"></div>
                                         <script>
                                           function myMap() {
                                         var mapCanvas = document.getElementById("map");
                                         var mapOptions = {
                                           center: new google.maps.LatLng('.$anuncios->Latitude.','.$anuncios->Longitude.'), zoom: 18, mapTypeId: google.maps.MapTypeId.HYBRID
                                         };
                                         var map = new google.maps.Map(mapCanvas, mapOptions);
                                         if (previousMarker != null)
                                           previousMarker.setMap(null);
                                         previousMarker = new google.maps.Marker({
                                               position: new google.maps.LatLng('.$anuncios->Latitude.','.$anuncios->Longitude.'),
                                               map: map
                                         });
                                         }
                                         </script>
                                         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7jRD8m5aG-UagIgKot__F7MkwVxS6nls&callback=myMap"></script>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.row -->
                                </div>
                                <!-- /.container -->
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">'.$Fechar.'</button>
                              </div>
                            </div>
                            </div>
                            </div>');
                          }
                        }
                        $mybd->desligar_bd();
                        ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

          </div> <!-- /.linhaflex -->
        </div><!-- /.container -->
       </div> <!-- /.col-lg-9 -->
      </div>
    </div>
    <!-- /.container -->


    <?php
    if(isset($_POST["EditarPassword"]) && !empty($_POST["EditarPassword"])){
        if(!strcmp($_POST["password1"],$_POST["password2"])){
          if(verifca_password($_POST["password1"])==true && verifica_tamanho_string($_POST["password1"],15)==true){
          $password=password_hash($_POST["password1"],PASSWORD_DEFAULT);
          $utilizador_edita_pass=new Utilizador($_SESSION['AE_id_utilizador'],"","",$password,"","");
          $mybd->ligar_bd();
          $dao_utilizadores->editar_utilizador($utilizador_edita_pass);
          $mybd->desligar_bd();
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
        		if(preg_match('/[A-Z]/',$_POST["password1"])!=1)
        			return false;// nao tem maisculas
        		//verifica se tem pelo menos 9 carcteres
        		if(strlen($_POST["password1"])<8)
        			return false;//tamanho invalido
        		//verifica se tem numeros
        		if(preg_match('/[1-9]/',$_POST["password1"])!=1)
        			return false;//nao tem numeros
        		return true;// (correto)
        	}

    //altera estado de anuncio novo pendente para ativo
    if(isset($_POST["aceitar"]) && !empty($_POST["aceitar"])){
      $mybd->ligar_bd();
      $anuncioEdita=$dao_anuncios->obter_anuncio($_POST["idAnuA"]);
      $anuncioEdita->Estado=1;
      $dao_anuncios->editar_anuncio($anuncioEdita);
      $dao_notificacao->inserir_notificacao(new Notificacao(0,$anuncioEdita->Proprietario,0,"Agora todos os alunos poderao ver o seu anuncio!",date("Y-m-d"),date('H:i:s'),0,1));
      $mybd->desligar_bd();
      header("Refresh:0; url=anuncios_novos_pendentes.php");
    }
//altera estado de anuncio novo pendente para inativo
    if(isset($_POST["elimina"]) && !empty($_POST["elimina"])){
      $motivo=$_POST["motivo".$_POST["idAnuR"]];
      if(verifica_tamanho_string($motivo,50)==true){
          $mybd->ligar_bd();
          $anuncioEdita=$dao_anuncios->obter_anuncio($_POST["idAnuR"]);
          if($anuncioEdita->Estado!=4){
                $anuncioEdita->Estado=5;
                $dao_anuncios->editar_anuncio($anuncioEdita);
                //adiciona notificação para proprietario do anuncio
                $dao_notificacao->inserir_notificacao(new Notificacao(0,$anuncioEdita->Proprietario,0,$motivo,date("Y-m-d"),date('H:i:s'),0,5));
                print('<script>  $(document).ready(function(){$("#myModalEliminar").modal();  });jQuery(document).ready(function( $ ) {jQuery("#aviso_registo_insucesso_nome").show();  });  </script>');
                $mybd->desligar_bd();
                header("refresh: 1;anuncios_novos_pendentes.php");
          }
  }else{
    echo'<script>malmotivo'.$_POST["idAnuR"].'.style.border="2px solid red";</script>';
    echo'<script>$("#falhamotivo'.$_POST["idAnuR"].'").text("O motivo tem maximo de 50 caracteres!");</script>';
    echo'<script>$(document).ready(function(){  $("#b'.$_POST["idAnuR"].'").modal();});</script>';

  }
}


    ?>




<?php

    $rodape=false;
    $conteudo_principal = ob_get_contents();
    ob_end_clean();
    //master page
    include($layout);
?>
