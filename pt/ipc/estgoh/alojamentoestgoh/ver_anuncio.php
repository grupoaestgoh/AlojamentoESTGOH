<?php
//sessao
session_start();
//carregar controladores
include("./comum/carregacontroladores.php");

//verifica se gestor está autenticado
/*if (isset($_SESSION["AE_email_utilizador"]) && isset($_SESSION["AE_tipo_utilizador"]) ){
  //Se não tiver sessao manda para pagina index.php
  if(isset($_SESSION["AE_id_utilizador"]) )header("Location: ./index.php");*/
    if(isset($_GET["IdAnuVer"]) ){
      $anuncio=$dao_anuncios->obter_anuncio($_GET["IdAnuVer"]);
      if($anuncio->Estado!=1)  header("Location: ./ver_todos_anuncios.php");

    }else{
    header("Location: ./ver_todos_anuncios.php");
  }
/*}else{
  header("Location: ./index.php");
}*/
?>

    <!-- Navigation -->

    	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navGestor" id="mainNav">
          <div class="container">
            <a class="navbar-brand" href="ver_todos_anuncios.php"><font  size="6" color="white"><?php print $logotipo; ?></font></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
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
                   </div>
                 </li>
                 <li class="nav-item">
                       <a href="./comum/logout.php" class="nav-link navGestorimg formabotao" ><i class="fa fa-fw fa-sign-out"></i><?php print $terminaSessao; ?></a>
                 </li>
              </ul>
            </div>
          </div>
        </nav>


    <!-- Modal ELiminar -->
    <div class="modal fade" id="myModalEliminar" role="dialog">
      <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <form name="form" action="ver_anuncio.php?IdAnuVer=<?php   print $_GET['IdAnuVer'];  ?>" method="post">
      <div class="modal-header">
        <button type="button" class="Fechar" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php   print $den_anu;  ?></h4>
      </div>
      <div class="modal-body">
        <p> <?php   print $motivoDen;  ?></p>
        <textarea class="form-control" name="motivo" rows="3" required></textarea>
        <span id="falhamotivo" class="falhas" /><span>

      </div>
      <div id="aviso_registo_insucesso_email" class="alert alert-success aviso_registo_insucesso_email" role="alert">
            <div class="row leftCaracteris">
            <div class="col-lg-2 ">
            <img class="alertaImg" src="img/img_aplicacao/certo.png" alt="">
            </div>
            <div class="col-lg-8">
              <span class="glyphicon glyphicon-alert"><?php   print $denunciadoSucesso;  ?></span>
            </div>
          </div>
        </div>

      <div class="modal-footer">
        <input type="submit" class="btn btn-danger" name="denunciar" value="<?php   print $denuncia;  ?>">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <?php   print $Fechar;  ?></button>
      </div>
    </form>
    </div>
    </div>
    </div>
    <!-- Page Content -->
    <div class="container espaco">
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

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <?php
          $anuncio=$dao_anuncios->obter_anuncio($_GET["IdAnuVer"]);
          $anunciante=$dao_utilizadores->obter_utilizador_id($anuncio->Proprietario);
          ?>
          <h1 class="my-4"><?php   print $anuncio->Titulo;  ?>
          </h1>

          <!-- Blog Post -->

          <div class="card mb-4">
            <div class="card-body">
              <?php $fotosAnuncio=$dao_fotos->listar_fotos_anuncio($anuncio->Id_Anuncio);?>
              <?php
                  echo('<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
                </div>');
                ?>



            </div>
            <div class="card-body">
              <p class="card-text alinhacentro">
                <?php   print $anuncio->Descricao;  ?>
            </div>
            <div class="card-footer text-muted alinhacentro">
              <button type="submit" data-toggle="modal" data-target="#myModalEliminar" class="btn btn-danger"> <?php   print $denuncia;  ?></button>
            </div>
          </div>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header corBranca fundoAzul"> <?php   print $Preco;  ?></h5>
            <div class="card-body">
              <?php   print $anuncio->Preco;  ?>  <?php   print $eurosmes;  ?>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header corBranca fundoAzul"> <?php   print $contacto;  ?></h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <?php   print $anunciante->Nome;  ?>
                    </li>
                    <li>
                      <?php   print $anuncio->Telefone;  ?>
                    </li>

                  </ul>
                </div>

              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header corBranca fundoAzul">   <?php   print $caracteristicas;  ?>
</h5>
            <div class="card-body">
              <div class="row leftCaracteris">
                <div class="col-lg-6 ">
                  <?php
                    echo('<ul class="list-unstyled mb-0 comPontos">

                    <li ');
                    if($anuncio->Wc==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                    echo('>'.$wc.' </li>  <li ');
                    if($anuncio->Mobilia==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                    echo('>'. $mobilada.'  </li><li ');
                    if($anuncio->Utensilios==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                    echo('>'.$utensilios.'  </li><li ');
                    if($anuncio->Internet==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                    echo('>'.$internet.'</li>
                  </ul>
              </div>
              <div class="col-lg-6 ">
                    <ul class="list-unstyled mb-0 comPontos">

                      <li ');
                      if($anuncio->Rapariga==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                      echo('>'.$raparigas.' </li>  <li ');
                      if($anuncio->Rapaz==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                      echo('>'. $rapazes.'  </li><li ');
                      if($anuncio->Despesas==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                      echo('>'.$despesas.'  </li><li ');
                      if($anuncio->Animais==true) print("class=\"fa fa-check-circle-o\""); else print("class=\"	fa fa-times-circle-o\"");
                      echo('>'.$Animais.'</li>
                    </ul></div>

            </div>
            </div>
          </div>
          <div class="card my-4">
            <h5 class="card-header corBranca fundoAzul">'.$Localizacao.'</h5>
              <div id="map" class="card-header mapa"></div>
             <script>
               function myMap() {
             var mapCanvas = document.getElementById("map");
             var mapOptions = {
               center: new google.maps.LatLng('.$anuncio->Latitude.','.$anuncio->Longitude.'), zoom: 18, mapTypeId: google.maps.MapTypeId.HYBRID
             };
             var map = new google.maps.Map(mapCanvas, mapOptions);
             }
             </script>
             <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7jRD8m5aG-UagIgKot__F7MkwVxS6nls&callback=myMap"></script>
          </div>
        </div>
      </div>');
      ?>
      <!-- /.row -->

    </div>
    <!-- /.container -->





    	<?php
      if(isset($_POST["denunciar"]) && !empty($_POST["denunciar"])){
        if(verifica_tamanho_string($_POST["motivo"],100)==true){
          $mybd->ligar_bd();
          $notificacao=new Notificacao(0,null,2,$_POST["motivo"],date('Y-m-d'),date('H:m:s'),1,4);
          $dao_notificacao->inserir_notificacao($notificacao);
          $mybd->desligar_bd();
         print('<script>
                  $(document).ready(function(){
                  $("#myModalEliminar").modal();
                  });
                  </script>');
          print('<script>
                  jQuery(document).ready(function( $ ) {
                  jQuery("#aviso_registo_insucesso_email").show();
                  });
                  </script>');
                  header('Location: ver_todos_anuncios.php');

          }else{
          echo'<script>$("#falhamotivo").text("O motivo tem maximo de 50 caracteres!");</script>';

          print('<script>
                  $(document).ready(function(){
                  $("#myModalEliminar").modal();
                  });
                </script>');

        }
      }
      function verifica_tamanho_string($string,$maximoCaracteres){
        if(strlen($string)>$maximoCaracteres)return false;
        else return true;
      }


    	$rodape=true;
    	$conteudo_principal = ob_get_contents();
    	ob_end_clean();
    	//master page
    	include($layout);
    	?>
