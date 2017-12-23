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
           <img  src="./img/img_aplicacao/pt.jpg" alt="">
        </li>
        <li class="nav-item hidden"> </li>
        <li class="nav-item">
          <img src="./img/img_aplicacao/UK.jpg" alt="">
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

      <div id="Aviso" class="alert alert-danger" role="alert" style="display:none">
          <div class="row leftCaracteris">
          <div class="col-lg-2 ">
          <img class="alertaImg" src="./img/img_aplicacao/alerta.png" alt="">
          </div>
          <div class="col-lg-6">
            <span class="glyphicon glyphicon-alert"><?php print $credenciaisErradas; ?><br><?php print $tenteNovamente; ?></span>
          </div>
        </div>
      </div>
      <button name="entrar" class="btn btn-primary navbar-btn"  type="submit"><?php print $entrar; ?></button>

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
			echo"<script>document.getElementById('Aviso').style.display = 'none';</script>";
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
  <form action="index.php">
      <label class="corPreta" ><b><?php print $email; ?>:</b></label>
      <br>
      <div class="form-group input-group">
        <input type="email" class="form-control" placeholder="Email" id="inlineFormInputGroup" required>
        <div class="input-group-addon" ><img class="certo" src="./img/img_aplicacao/certo.png" alt=""></div>

      </div>
      <label class="corPreta"><b><?php print $password; ?>:</b></label><br>
      <input class="form-control" type="password" placeholder="Password" name="psw" required>
      <br>
      <label class="corPreta"><b><?php print $nome; ?>:</b></label><br>
      <input class="form-control" type="text" placeholder="Nome" name="nme" required>
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
      <button class="btn btn-default" onclick="Mudarestado('Aviso2')"  type="submit"><?php print $registar; ?></button>

  </form>

  </div>
<div class="col-lg-5 ml-auto order-lg-1">
  <img class="img-fluid" src="./img/img_aplicacao/dog.png" alt="">
</div>
</div>

</div>
<!-- /.container -->

</section>
<!-- /.content-section-b -->

<!-- /.content-section-a -->



<?php
	$conteudo_principal = ob_get_contents();
	ob_end_clean();

	//master page
	include($layout);
?>
