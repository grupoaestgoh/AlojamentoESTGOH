
<?php
//sessao
session_start();
//carregar controladores
include("./comum/carregacontroladores.php");
$dao_utilizador=new DAOUtilizadores();

//verifica se gestor está autenticado
/*if (!isset($_SESSION["AE_id_utilizador"]) && !isset($_SESSION["AE_nome_utilizador"]) && !isset($_SESSION["AE_email_utilizador"]) && !isset($_SESSION["AE_estado_utilizador"]) ){
  //Se não tiver sessao manda para pagina index.php
  header("Location: ./index.php");
}
if(isset($_SESSION["id_anuncio_editar"])){
  //vai buscar o anuncio
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
               <a href="desativa_proprietario.phpl"><?php print $DesaProprietario; ?></a>
             </li>
             <li>
               <a href="desativa_gestor.php"><?php print $DesaGestor; ?></a>
             </li>
           </ul>
         </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
           <a class="nav-link "  href="anuncios_denuncioados.php" >
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
           <a class="nav-link dropdown-toggle mr-lg-2 navGestorimg" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
             <a class="dropdown-item" href="#">
               <span class="text-success">
                 <strong>
                   <i class="fa"></i>Tem anuncio para aprovação</strong>
               </span>
               <span class="small float-right text-muted">11:21 horas</span>
               <div class="dropdown-message small">Tem anuncio editado para aprovar.</div>
             </a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#">
               <span class="text-warning">
                 <strong>
                   <i class="fa"></i>Tem pedido de desativação</strong>
               </span>
               <span class="small float-right text-muted">11:21 horas</span>
               <div class="dropdown-message small">O utilizador Manuel pediu para desativar a conta.</div>
             </a>


           </div>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle mr-lg-2 navGestorimg" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fa fa-user" aria-hidden="true"></i>
             <span class="d-lg-none"><?php print $MeusDados; ?>
               <span class="badge badge-pill badge-warning">6 <?php print $novas; ?></span>
             </span>

           </a>
           <div class="dropdown-menu " aria-labelledby="alertsDropdown">
             <h6 class="dropdown-header"><?php print $MeusDados1; ?></h6>
             <div class="dropdown-divider"></div>

             <a class="dropdown-item" href="#">
              <strong> <?php print $nome; ?></strong>
               <div class="dropdown-message small"><?php print $_SESSION["AE_nome_utilizador"]; ?></div>
             </a>

             <div class="dropdown-divider"></div>

             <a class="dropdown-item" href="#">
              <strong><?php print $email; ?> </strong>
               <div class="dropdown-message small"><?php print $_SESSION["AE_email_utilizador"]; ?></div>
             </a>

             <div class="dropdown-divider"></div>

             <a class="dropdown-item" href="#">
               <strong>
                 <i class="fa"></i>
                 <button type="button" class="nav-link especialBotao"  data-toggle="modal" data-target="#myModal20"><font  size="4" color="black"><?php print $alteraDados; ?></font></button>
               </strong>


             </a>
           </div>
         </li>
         <li class="nav-item">
           <a class="nav-link navGestorimg" data-toggle="modal" data-target="#exampleModal">
             <i class="fa fa-fw fa-sign-out"></i><?php print $terminaSessao; ?></a>
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
           <form action="#">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title"><?php print $desativaConta; ?></h4>
           </div>
           <div class="modal-body aumenta">
             <p><?php print $certeza; ?></p>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal"><?php print $desativar; ?></button>
             <button type="button" class="btn btn-default" data-dismiss="modal"><?php print $Fechar; ?></button>
           </div>
         </form>
         </div>
       </div>
      </div>
      <!-- Fim ELiminar -->

         <div class="modal-dialog">

           <div class="modal-content">
             <div class="modal-header divAzul">
               <h4 class="modal-title corBranca"><?php print $alteraPass;?></h4>
             </div>
             <div class="modal-body">
               <form action="#">
                 <br>
                   <label class="corPreta" ><b><?php print $PassNova;?></b></label><br>
                   <input class="form-control" type="email" placeholder="Password" name="eml" data-toggle="tooltip" title="Se quer alterar o email insira um novo e edite!Caso contrario deixe o inicial!">
                   <br>
                   <label class="corPreta"><b><?php print $PassNovaRepete;?></b></label><br>
                   <input class="form-control" type="password" placeholder="Repetir password" name="psw" data-toggle="tooltip" title="Se quer alterar a password insira uma nova e edite!">
                   <br>

                   <div id="Aviso2" class="alert alert-success" role="alert" style="display:none;" >
                       <div class="row leftCaracteris">
                       <div class="col-lg-2 ">
                       <img class="alertaImg" src="img/certo.png" alt="">
                       </div>
                       <div class="col-lg-8">
                         <span class="glyphicon glyphicon-alert"><?php print $alteradaSucesso;?></span>
                       </div>
                     </div>
                   </div>
                   <div class="row" style="text-align:center;">
                   <div class="col-12">
                   <button class="btn btn-primary navbar-btn" onclick="Mudarestado('Aviso2')" type="submit" ><?php print $editar;?></button>
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
                 <a href="#">
                     <img  src="bandeiras/pt.jpg" alt="">
                 </a>
                 <a href="#">
                   <img src="bandeiras/UK.jpg" alt="">
                 </a>
               </div>
             </div>
           </div>
          <div class="=row">
            <div class="addanuncio col-12">
              <form id="signup" onsubmit="return Mudarestado('aceite')">
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
                          <input type="PrimeiroNome" placeholder="Primeiro Nome*" required autofocus/>
                        </div>
                        <div class="col-lg-6">
                          <input type="UltimoNome" placeholder="Último Nome*" required/>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <input type="email" placeholder="E-mail" required/>
                        </div>
                        <div class="col-lg-6">
                         <input type="telefone" placeholder="Telefone*" required/>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <input type="morada" placeholder="Morada*" required/>
                        </div>
                        <div class="col-lg-6">
                          <input type="postal" placeholder="Código Postal*" required/>
                          <input type="postal2" placeholder="" required/>
                        </div>
                      </div>
                      <div class="sep"></div>
                      <div class="header">
                          <p class="bold"><?php print $anuncio1;?></p>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <input type="morada" placeholder="Título do anúncio*" required/>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <textarea name="comment" form="signup" placeholder="  Descrição*" rows="3" required></textarea>
                        </div>
                      </div>
                      <div class="sep"></div>
                      <div class="header">
                          <p class="bold"><?php print $caracteristicasQ;?></p>
                      </div>
                      <div class="sublinha">
                        <div class="row">
                          <div class="col-4">
                            <p class="especific"><?php print $casabanho;?>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="radio" name="Banho" checked><?php print $sim;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                                <input type="radio" name="Banho"><?php print $nao;?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="sublinha">
                        <div class="row">
                          <div class="col-4">
                            <p class="especific"><?php print $internet1;?>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="radio" name="Internet" checked><?php print $sim;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                                <input type="radio" name="Internet"><?php print $nao;?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="sublinha">
                        <div class="row">
                          <div class="col-4">
                            <p class="especific"><?php print $despesas;?>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="radio" name="Renda" checked><?php print $sim;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                                <input type="radio" name="Renda"><?php print $nao;?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="sublinha">
                        <div class="row">
                          <div class="col-4">
                            <p class="especific"><?php print $mobilia;?>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="radio" name="Mobília" checked><?php print $sim;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                                <input type="radio" name="Mobília"><?php print $nao;?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="sublinha">
                        <div class="row">
                          <div class="col-4">
                            <p class="especific"><?php print $utensilios1;?>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="radio" name="Utensílios" checked><?php print $sim;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                                <input type="radio" name="Utensílios"><?php print $nao;?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="sublinha">
                        <div class="row">
                          <div class="col-4">
                            <p class="especific"><?php print $Animais1;?>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                              <input type="radio" name="Animais" checked><?php print $sim;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                                <input type="radio" name="Animais"><?php print $nao;?>
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
                              <input type="checkbox" name="Animais" checked><?php print $rapaz;?>
                            </label>
                          </div>
                          <div class="col-4">
                            <label class="radio-inline">
                                <input type="checkbox" name="Animais"><?php print $rapariga;?>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="header">
                          <p class="bold"><?php print $fotos;?></p>
                          <p class="tinyy"><?php print $minimoimg;?></p>
                      </div>
                      <div class="col-lg-12">
                        <div class="row abaixu">
                            <div class="col-3">
                              <input type="file" name="arquivo" id="arquivo1" class="arquivo">
                            </div>
                            <div class="col-3">
                              <input type="text" name="file" id="file" class="file" placeholder="Arquivo" readonly="readonly">
                            </div>
                            <div class="col-3">
                              <input type="button" class="btn btnx" value="SELECIONAR">
                            </div>
                        </div>
                        <div class="row abaixu">
                            <div class="col-3">
                              <input type="file" name="arquivo" id="arquivo2" class="arquivo">
                            </div>
                            <div class="col-3">
                              <input type="text" name="file" id="file2" class="file" placeholder="Arquivo" readonly="readonly">
                            </div>
                            <div class="col-3">
                              <input type="button" class="btn btnx" value="SELECIONAR">
                            </div>
                        </div>
                        <div class="row abaixu">
                            <div class="col-3">
                              <input type="file" name="arquivo" id="arquivo3" class="arquivo">
                            </div>
                            <div class="col-3">
                              <input type="text" name="file" id="file3" class="file" placeholder="Arquivo" readonly="readonly">
                            </div>
                            <div class="col-3">
                              <input type="button" class="btn btnx" value="SELECIONAR">
                            </div>
                        </div>
                        <div class="row abaixu">
                            <div class="col-3">
                              <input type="file" name="arquivo" id="arquivo4" class="arquivo">
                            </div>
                            <div class="col-3">
                              <input type="text" name="file" id="file4" class="file" placeholder="Arquivo" readonly="readonly">
                            </div>
                            <div class="col-3">
                              <input type="button" class="btn btnx" value="SELECIONAR">
                            </div>
                        </div>
                        <div class="row abaixu">
                            <div class="col-3">
                              <input type="file" name="arquivo" id="arquivo5" class="arquivo">
                            </div>
                            <div class="col-3">
                              <input type="text" name="file" id="file5" class="file" placeholder="Arquivo" readonly="readonly">
                            </div>
                            <div class="col-3">
                              <input type="button" class="btn btnx" value="SELECIONAR">
                            </div>
                        </div>
                        <div class="row abaixu">
                            <div class="col-3">
                              <input type="file" name="arquivo" id="arquivo6" class="arquivo">
                            </div>
                            <div class="col-3">
                              <input type="text" name="file" id="file6" class="file" placeholder="Arquivo" readonly="readonly">
                            </div>
                            <div class="col-3">
                              <input type="button" class="btn btnx" value="SELECIONAR">
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
                          <div class="row col-12">
                            <div class="col-lg-12">
                              <div class="centro">
                                <div id="map">
                                </div>
                              </div>
                            </div>
                          </div>
                          <script>
                            var previousMarker=null;
                            function myMap() {
                              var mapOptions = {
                                  center: new google.maps.LatLng(40.36021451843771,-7.862434387207031),
                                  zoom: 17,
                                  mapTypeId: google.maps.MapTypeId.HYBRID
                              }
                              var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                              map.addListener("click", function(event) {
                                if (previousMarker != null)
                                  previousMarker.setMap(null);
                                previousMarker = new google.maps.Marker({
                                      position: new google.maps.LatLng(event.latLng.lat(),event.latLng.lng()),
                                      map: map
                                });
                              });
                            }
                          </script>
                          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUym-eQ2fwfbNuGmGYa2HJacaW5zRciLo&callback=myMap"></script>
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
                        <input id="submit" type="submit" value="Adicionar Anúncio"></input>
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
  $rodape=false;
  $conteudo_principal = ob_get_contents();
  ob_end_clean();
  //master page
  include($layout);
  ?>
