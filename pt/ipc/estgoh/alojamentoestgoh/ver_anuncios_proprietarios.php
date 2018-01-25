<?php
//sessao
session_start();
//carregar controladores
include("./comum/carregacontroladores.php");

//verifica se gestor está autenticado
/*if (!isset($_SESSION["AE_id_utilizador"]) && !isset($_SESSION["AE_nome_utilizador"]) && !isset($_SESSION["AE_email_utilizador"]) && !isset($_SESSION["AE_estado_utilizador"]) ){
  //Se não tiver sessao manda para pagina index.php
  header("Location: ./index.php");
}*/



//conteudo principal
ob_start();

?>

    <!-- Navigation -->


   <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navGestor" id="mainNav">
     <div class="container">
       <a class="navbar-brand"  href="index.php" ><font  size="6" color="white"><?php print $logotipo; ?></font></a>
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
               <a href="desativa_proprietario.php"><?php print $DesaProprietario; ?></a>
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
        <div class="col-lg-3"></div>
        <div class="col-lg-9">
          <div class="container">
            <div class="linhaflex">
              <div class="titulo">
              <?php print $AnuProprietarios;

			  if(isset($_POST["btnPesquisar"])){
          if(!empty($_POST["nome_pesquisa"]))
					     $todos_anuncios=$dao_anuncios->pesquisar_anuncios(0, $_POST["nome_pesquisa"]); //pesquisar_anuncios() ainda não existe
          else
					     $todos_anuncios=$dao_anuncios->listar_anuncios(0);
        }else
				    $todos_anuncios=$dao_anuncios->listar_anuncios(0);
			  ?>
            </div>
			<?php
			if($todos_anuncios == null)
        print $naoanuncios;
            else{
			?>
			<form class="navbar-form" action="" method="post">
				<input type="text" name="nome_pesquisa" placeholder="<?php print $placeholder_pesquisa;?>" class="form-control" id="nome_pesquisa"><br>
				<button type="submit" name="btnPesquisar" class="btn btn-default"><?php print $pesquisar;?></button>
			</form>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th><?php print $titulo;?></th>
                          <th><?php print $Preco;?></th>
                          <th><?php print $local;?></th>
                          <th><?php print $disponibilidade;?></th>
                          <th><?php print $Anunciante;?></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th><?php print $titulo;?></th>
                          <th><?php print $Preco;?></th>
                          <th><?php print $local;?></th>
						              <th><?php print $disponibilidade;?></th>
                          <th><?php print $Anunciante;?></th>
                          <th></th>
                        </tr>
                      </tfoot>
                      <tbody>
						          <?php
						  $mybd->ligar_bd();

              for ($i=0; $i <sizeof($todos_anuncios); $i++) {
                            $anuncios=$todos_anuncios[$i];
							              $Proprietario=$dao_utilizadores->obter_utilizador_id($anuncios->Proprietario);
                            echo('<tr>');
                            echo('<td>'.$anuncios->Titulo.'</td>');
                            echo('<td>'.$anuncios->Preco.'</td>');
                            echo('<td>'.$anuncios->Morada.'</td>');
							?>
							<td>
							<?php
							if($anuncios->Disponibilidade == 1){?>
								<div class="radiodisponibilidadeTabela" id="disponibilidade">
									<form>
										<div class="row">
											<div class="col-lg-12">
												<label class="radio-inline">
													<input type="radio" name="optradio" value="livre" checked> <?php print $livre;?><br>
												</label>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<label class="radio-inline">
													<input type="radio" name="optradio" value="ocupado"> <?php print $ocupado;?><br>
												</label>
											</div>
										</div>
									</form>
								</div>
							<?php
							}else{?>
								<div class="radiodisponibilidadeTabela">
									<form>
										<div class="row">
											<div class="col-lg-12">
												<label class="radio-inline">
													<input type="radio" name="optradio" value="livre"><?php print $livre;?><br>
												</label>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<label class="radio-inline">
													<input type="radio" name="optradio" value="ocupado" checked><?php print $ocupado;?><br>
												</label>
											</div>
										</div>
									</form>
								</div>
							<?php
							}?>
							</td>
							<?php
                            echo('<td>'.$Proprietario->Nome.'</td>');
                            echo('<td><button type="button" class="btn btn-default"  data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-eye" style="font-size:24px"></i></button></td>');
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
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                          <ol class="carousel-indicators" >
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                          </ol>
                                          <div class="carousel-inner" role="listbox">
                                            <!-- Slide One - Set the background image for this slide in the line below -->
                                            <div class="carousel-item active" >
                                              <img src="img/1.jpg" alt="" width="100%">
                                            </div>
                                            <!-- Slide Two - Set the background image for this slide in the line below -->
                                            <div class="carousel-item" >
                                              <img src="img/2.jpg" alt="" width="100%">
                                            </div>
                                            <!-- Slide Three - Set the background image for this slide in the line below -->
                                            <div class="carousel-item" >
                                              <img src="img/3.jpg" alt="" width="100%">
                                            </div>
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
                                           center: new google.maps.LatLng(40.360336, -7.855718), zoom: 18, mapTypeId: google.maps.MapTypeId.HYBRID
                                         };
                                         var map = new google.maps.Map(mapCanvas, mapOptions);
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
              <!-- Modal ELiminar -->
          </div> <!-- /.linhaflex -->
        </div><!-- /.container -->
       </div> <!-- /.col-lg-9 -->
      </div>
    </div>
    <!-- /.container -->

    <?php
    $rodape=false;
    $conteudo_principal = ob_get_contents();
    ob_end_clean();
    //master page
    include($layout);
    ?>

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
