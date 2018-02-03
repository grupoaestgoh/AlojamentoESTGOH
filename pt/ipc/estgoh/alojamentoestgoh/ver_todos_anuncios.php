<?php
//sessao
session_start();
//carregar controladores
include("./comum/carregacontroladores.php");

//verifica se o utilizador está autenticado
if (isset($_SESSION["AE_tipo_utilizador"]) ){
    //Verifica se é aluno
    if($_SESSION["AE_tipo_utilizador"]!=3){
				header("Location: ./index.php");
    }
}else{
    header("Location: ./index.php");
}
//conteudo principal
ob_start();
$pesquisa="";

if(isset($_POST['wc'])){
	$pesquisa.=" and anu_wcprivativo=1 ";
}
if(isset($_POST['despesas'])){
		$pesquisa.=" and anu_despesas=1 ";
}
if(isset($_POST['mobilia'])){
	 	$pesquisa.=" and anu_mobilada=1 ";
}
if(isset($_POST['utensilios'])){
	 	$pesquisa.=" and anu_utensilios=1 ";
}
if(isset($_POST['animais'])){
	 	$pesquisa.=" and anu_animais=1 ";
}
if(isset($_POST['internet'])){
	 	$pesquisa.=" and anu_internet=1 ";
}
if(isset($_POST['preco'])){
	 	$pesquisa.="and anu_preco<".$_POST['preco'];

}
if(isset($_POST['gender'])){
	if(!strcmp($_POST['gender'],"Rapaz")) $pesquisa.=" and anu_rapazes=1 ";
	if(!strcmp($_POST['gender'],"Rapariga")) $pesquisa.=" and anu_raparigas=1 ";
	if(!strcmp($_POST['gender'],"Ambos")) $pesquisa.=" and anu_raparigas=1 and anu_rapazes=1 ";

}

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
    <h2 class="my-4"><?php print $alojamentosOliveira?></h2>

	  <form class="navbar-form" action="ver_todos_anuncios.php" method="post">
		<div class="col-md-4">
		<div class="card-title" >
		<div class="input-group">
		<input type="text" id="pesquisa" name="nome_pesquisa" class="form-control" placeholder="<?php print $placeholder_pesquisa?>">
		<span class="input-group-btn">
		<input class="btn btn-secondary top" name="btnPesquisar" type="submit" value="<?php print $pesquisar?>">
		</span>
		</div>
		</div>
		</div>
	  </form>

		<div class="row">
	  <button type="button"  class="btn btn-primary" id="pesquisa_av" data-toggle="collapse" data-target="#filter-panel"><img src="img/img_aplicacao/filtro.png" height="20x"></button>
        <div id="filter-panel" class="collapse filter-panel">
            <div class="panel panel-default">
                <div class="panel-body">
                    <br>
                    <form class="form-inline" action="ver_todos_anuncios.php" method="POST" >
                        <div class="form-group">
                            <div class="espacamento" >
                                <label id="labelPreto"><?php print $precoMax ?>:
                                  <input class="espacamento" type="range" name="rangeInput" min="50" max="250" step="5" value="" oninput="updateTextInput(this.value);">
                                  <input class="caixa" type="text" size="3" id="textInput" name="preco" value="150" readonly>€</label>
                            </div>
														<div class="espacamento" >
															<label id="labelPreto"><input class="espacamento" name="wc" type="checkbox"><?php print $casabanho ?></label>
														</div>
                            <div class="espacamento" >
                                <label id="labelPreto"><input class="espacamento" name="despesas" type="checkbox"><?php print $despesas ?></label>
                            </div>
															<div class="espacamento" >
                                <label id="labelPreto"><input class="espacamento" name="mobilia" type="checkbox"><?php print $mobilia ?></label>
                            </div>
														<div class="espacamento" >
                                <label id="labelPreto"><input class="espacamento" name="utensilios" type="checkbox"><?php print $utensiliosCoz ?></label>
                            </div>
													</div>
														<div class="espacamento" >
															<label id="labelPreto"><input class="espacamento" name="anumais" type="checkbox"><?php print $Animais ?></label>
													</div>
													<div class="espacamento" >
															<label id="labelPreto"><input class="espacamento" name="internet" type="checkbox"><?php print $internet ?></label>
													</div>
                        </div>
                    <br>
                        <div class="form-group">
                          <div class="espacamento">
                            <label id="labelPreto"><?php print $exclusivo ?>:</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <label id="labelPreto" class="form-check-label">
                              <input class="form-check-input" type="radio" name="gender" value="Rapaz"><?php print $rapaz ?>
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <label id="labelPreto" class="form-check-label">
                              <input class="form-check-input" type="radio" name="gender" value="Rapariga"><?php print $rapariga ?>
                            </label>
                          </div>
                          <div class="form-check form-check-inline">
                            <label id="labelPreto" class="form-check-label">
                              <input class="form-check-input" type="radio" name="gender" value="Ambos"><?php print $ambos ?>
                            </label>
                          </div>
                        </div>
                    <br>
                    <div class="espacamento" >
					                 <button type="submit"  name="pesquisaComFiltros" class="btn btn-primary"><?php print $aplicarFiltros ?></button>
									</div>
								</form>
  									<form class="form-inline" action="ver_todos_anuncios.php" method="POST" >
									  <div class="espacamento" >
									<input type="submit"  name="pesquisaSemFiltros" class="btn btn-danger" value="<?php print $limpar ?>">
									   </div>
									 </form>

                </div>
            </div>
        </div>
	  </div>

              <?php
              $mybd->ligar_bd();
							$todos_anuncios=$dao_anuncios->listar_anuncios(-1);


							if(isset($_POST["pesquisaComFiltros"])){
								$todos_anuncios=$dao_anuncios->listar_anuncios($pesquisa);
						 }


			  if(isset($_POST["btnPesquisar"])){
          if(!empty($_POST["nome_pesquisa"]) ){
						$frase="*".$_POST["nome_pesquisa"];
					     $todos_anuncios=$dao_anuncios->listar_anuncios($frase);

          }else{
					$todos_anuncios=$dao_anuncios->listar_anuncios(-1);
				}
        }
            $mybd->desligar_bd();

			if($todos_anuncios == null)
				print $naoanuncios;
      else{
				$mybd->ligar_bd();

				for ($i=0; $i <sizeof($todos_anuncios); $i++) {
					$anuncios=$todos_anuncios[$i];
					$Proprietario=$dao_utilizadores->obter_utilizador_id($anuncios->Proprietario);
					$fotosAnuncio=$dao_fotos->listar_fotos_anuncio($anuncios->Id_Anuncio);
					$fotoPrincipal=$fotosAnuncio[0];
			?>
			<hr>
			<div class="row">
				<div class="col-md-6">

					<a href="ver_anuncio.php?IdAnuVer=<?php print $anuncios->Id_Anuncio ?>">
						<img height="250" width="400" id="foto_anuncio"  src="<?php print $fotoPrincipal->Caminho.$fotoPrincipal->Nome ?>" height="42" width="42">
					</a>

				</div>
				<div class="col-md-5">
					<a href="ver_anuncio.php?IdAnuVer=<?php print $anuncios->Id_Anuncio ?>" id="titulo_anuncio"><?php print $anuncios->Titulo ?></a>
					<h4 id="preco_anuncio"><?php print $anuncios->Preco ?> €/<?php print $mes ?></h4>
					<p><?php print $anuncios->Descricao ?></p>
				</div>
			</div>
			<?php
				}
			}
			?>
    </div>



	<?php
	$rodape=true;
	$conteudo_principal = ob_get_contents();
	ob_end_clean();
	//master page
	include($layout);
	?>
