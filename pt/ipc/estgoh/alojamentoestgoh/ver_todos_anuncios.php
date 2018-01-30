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
                   <a href="ver_anuncios_proprietarios.php?TerminarSessao=TS" class="nav-link navGestorimg formabotao" ><i class="fa fa-fw fa-sign-out"></i><?php print $terminaSessao; ?></a>
             </li>
          </ul>
        </div>
      </div>
    </nav>

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

	  <!-- Page Heading -->
      <h2 class="my-4">Alojamentos em Oliveira de Hospital</h2>

		<form class="navbar-form" action="ver_todos_anuncios.php" method="post">
			<input type="text" name="nome_pesquisa" placeholder="<?php print $placeholder_pesquisa;?>" class="form-control" ><br>
			<input type="submit" name="btnPesquisar" class="btn btn-default" value="<?php print $pesquisar?>">
		</form>

			  <!-- Alterar o formulário de pesquisa e adicionar filtros -->

              <?php
              $mybd->ligar_bd();

			  if(isset($_POST["btnPesquisar"])){
          if(!empty($_POST["nome_pesquisa"]))
					     $todos_anuncios=$dao_anuncios->listar_anuncios($_POST["nome_pesquisa"]);
          else
					     $todos_anuncios=$dao_anuncios->listar_anuncios_anunciante(-2,0);
        }else
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
			<hr>
			<div class="row">
				<div class="col-md-6">
					<a href="#">
						<img class="img-fluid rounded mb-3 mb-md-0" width="400" height="240" src="https://d1bvpoagx8hqbg.cloudfront.net/originals/quarto-frente-da-universidade-guimaraes-ac1e78b0fcabc44c5fcf9a1c547236a8.jpg" alt="">
					</a>
				</div>
				<div class="col-md-5">
				<?php
					echo('<a href="#" id="titulo_anuncio">'.$anuncios->Titulo.'</a>');
					echo('<h4>'.$anuncios->Preco.'€/mês</h4>');
					echo('<p>'.$anuncios->Descricao.'</p>');
				?>
				</div>
			</div>
				<?php
				}
			}
				?>
    </div>
    <!-- /.container -->

    <?php

        //termina sessão
        if(isset($_GET["TerminarSessao"]) && !empty($_GET["TerminarSessao"])){
          unset($_SESSION['AE_id_utilizador']);
          unset($_SESSION['AE_nome_utilizador']);
          unset($_SESSION['AE_email_utilizador']);
          unset($_SESSION['AE_estado_utilizador']);
          header('Location: index.php');
        }

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
  </script>
