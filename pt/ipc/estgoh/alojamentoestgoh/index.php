<?php
	//sessao
	session_start();


	//carregar controladores
	include("./comum/carregacontroladores.php");
/*
	//verificar autorização
	if (isset($_SESSION["dtd_id_utilizador"])){
		header("Location: ./home_page.php");
	}

	//verifica se existe admin
	if ($dao_utilizador->verficar_existe_admin () == false) {
		header ( "Location: ./registo_utilizador.php?admin" );
	}*/

	//conteudo principal
	ob_start();
?>
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top"  >
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
           <a href="?lingua=pt"> <img src="./img/img_aplicacao/pt.jpg" alt=""> </a>
        </li>
        <li class="nav-item hidden"> </li>
        <li class="nav-item">
           <a href="?lingua=en"> <img src="./img/img_aplicacao/UK.jpg" alt=""> </a>
        </li>
      </ul>
      <div class="container">
        <a class="navbar-brand"  href="#" ><p class="navtitle"><?php print $logotipo; ?></p></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" id="muda">
              <a class="nav-link" href="#Log" ><font  size="4" ><?php print $login; ?></font></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#Reg"><font  size="4" ><?php print $registo; ?></font></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
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
			</ul>
			</div>
		</div>
	</header>
</section>
<!-- Page Content -->
<section class="content-section-a"  id="Log">

<div class="container">
<div class="row">
<div class="col-lg-5 ml-auto">
  <div class="clearfix"></div>
  <h2 class="section-heading corAzul"><?php print $login; ?></h2>
  <hr class="section-heading-spacer" >
    <br>
    <br>
  <form action="index.php" method="POST">
      <label class="corPreta"><b><?php print $email; ?>:</b></label><br>
      <input class="form-control" type="email" placeholder="Email" name="email" required>
      <br>
      <label class="corPreta"><b><?php print $password; ?>:</b></label><br>
      <input class="form-control"  type="password" placeholder="Password" name="password" required>
      <br>

      <div id="Aviso" class="alert alert-danger" role="alert"  style="display:none">
          <div class="row leftCaracteris">
          <div class="col-lg-2 ">
          <img class="alertaImg" src="./img/img_aplicacao/alerta.png" alt="">
          </div>
          <div class="col-lg-6">
            <span class="glyphicon glyphicon-alert"><?php print $credenciaisErradas; ?><br><?php print $tenteNovamente; ?></span>
          </div>
        </div>
      </div>
      <button name="entrar" type="submit" class="btn btn-primary navbar-btn"  ><?php print $entrar; ?></button>

  </form>

	<?php
	//verifica o login
	if(isset($_POST["entrar"]))
	{
		$mybd=new BaseDados();
		$mybd->ligar_bd();
		$DaoUtilizadores=new DAOUtilizadores();
		$utilizador=$DaoUtilizadores->obter_utilizador($_POST["email"],$_POST["password"]);
		if($utilizador!=null)
		{
			if(!strcmp($utilizador->Tipo.'anunciante') && !strcmp($utilizador->Estado.'ativo'))	header("Location: meus_anuncios.php");
			if(!strcmp($utilizador->Tipo.'estudante'))	header("Location: ver_todos_anuncios.php");
			if(!strcmp($utilizador->Tipo.'gestor') && !strcmp($utilizador->Estado.'ativo'))	header("Location: meus_anuncios.php");
		}
		else
		{
		echo "<script>document.getElementById('Aviso').style.display = 'hidden';</script>";
		}
		$mybd->desligar_bd();
	}
	?>

    </div>
<div class="col-lg-5 mr-auto">
  <img class="img-fluid" src="./img/img_aplicacao/ipad.png" alt="">
</div>
</div>

</div>



<!-- /.container -->
</section >
<section class="content-section-b"  id="Reg">

<div class="container">

<div class="row">
<div class="col-lg-5 mr-auto order-lg-2">
  <div class="clearfix"></div>
  <h2 class="section-heading corBranca"><?php print $registo; ?></h2>
  <hr class="section-heading-spacer">
  <br><br>
  <form action="index.php" method="POST">
      <label class="corPreta" ><b><?php print $email; ?>:</b></label>
      <br>
      <div class="form-group input-group">
				<input class="form-control" id="inlineFormInputGroup" type="text" name="email" placeholder="Email" pattern="^[a-z0-9.]+@[a-z0-9]+\.[a-z]+\.([a-z]+)" required>
        <div class="input-group-addon" ><img class="certo" src="./img/img_aplicacao/certo.png" alt=""></div>

      </div>
      <label class="corPreta"><b><?php print $password; ?>:</b></label><br>
      <input class="form-control" type="password" placeholder="Password" name="passwordR" required>
      <br>
      <label class="corPreta"><b><?php print $nome; ?>:</b></label><br>
      <input class="form-control" type="text" placeholder="Nome" name="nome" required>
      <br>

      <div id="Aviso2" class="alert alert-success" role="alert" style="display:none">
          <div class="row leftCaracteris">
          <div class="col-lg-2 ">
          <img class="alertaImg" src="./img/img_aplicacao/certo.png" alt="">
          </div>
          <div class="col-lg-8">
            <span class="glyphicon glyphicon-alert"><?php print $sucesso; ?></span>
          </div>
        </div>
      </div>
			<div id="Aviso3" class="alert alert-danger" role="alert"  style="display:none">
          <div class="row leftCaracteris">
          <div class="col-lg-2 ">
          <img class="alertaImg" src="./img/img_aplicacao/alerta.png" alt="">
          </div>
          <div class="col-lg-6">
            <span class="glyphicon glyphicon-alert"><?php print $insucesso; ?><br><?php print $tenteNovamente; ?></span>
          </div>
        </div>
      </div>
      <button name="registar" class="btn btn-default"  type="submit"><?php print $registar; ?></button>

  </form>
	<?php
	//verifica o login
	if(isset($_POST["registar"]))
	{
		$mybd=new BaseDados();
		$mybd->ligar_bd();
		$DaoUtilizadores=new DAOUtilizadores();
		$utilizador= new utilizador(0,verifica_nome(),$_POST["emailR"],encripta_password(),2,date("Y-m-d"));
		if(encripta_password()!=false)
		{
			$DaoUtilizadores->inserir_utilizador($utilizador);
			echo "<script>document.getElementById('Aviso2').style.display = 'hidden';</script>";
			echo "<script>document.getElementById('Aviso3').style.display = 'none';</script>";
			print "registou";
		}
		else
		{
			echo "<script>document.getElementById('Aviso2').style.display = 'none';</script>";
			echo "<script>document.getElementById('Aviso3').style.display = 'hidden';</script>";
		}

		$mybd->desligar_bd();
	}
	?>
  </div>
<div class="col-lg-5 ml-auto order-lg-1">
  <img class="img-fluid" src="./img/img_aplicacao/dog.png" alt="">
</div>
</div>

</div>
<!-- /.container -->

</section>
<!-- /.content-section-b -->

<!--
.content-section-a -->


<?php
	$conteudo_principal = ob_get_contents();
	ob_end_clean();

	//master page
	include($layout);

	function verifica_nome(){
		$valor=$_POST["nomeR"];
		//Verifica se não tem numeros
		if(preg_match('/[1-9]/',$valor)==1)$valor=false;
		return $valor;
	}

	function encripta_password(){
		$valor=password_hash($_POST["passwordR"],PASSWORD_DEFAULT);
		//verifica se tem pelo menos um caracter maiusculo
		if(preg_match('/[A-Z]/', $_POST["passwordR"])!=1)$valor=false;
		//verifica se tem pelo menos 9 carcteres
		if(strlen($_POST["passwordR"])<9) $valor=false;

		if(preg_match('/[1-9]/', $_POST["passwordR"])!=1)$valor=false;

		return $valor;
	}


?>
