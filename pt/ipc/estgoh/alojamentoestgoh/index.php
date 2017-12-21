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
        <a class="navbar-brand"  href="PaginaInicial.html" ><p class="navtitle">AlojamentoESTGOH</p></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" id="muda">
              <a class="nav-link" href="#Log" ><font  size="4" >Login</font></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#Reg"><font  size="4" >Registo</font></a>
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
<h1>Alojamento ESTGOH</h1>
<h3>Escola superior Tecnologia e Gestão de Oliveira do Hospital</h3>
<hr class="intro-divider aumentar">
<ul class="list-inline intro-social-buttons">
  <li class="list-inline-item" style="background-color: rgba(100,100,100,0.6);">
      <span class="network-name">Estas á procura de alojamento e ainda
                                  e ainda não encontrastes?
      </span>
      <br>
      <span class="network-name">Então junta te a nós e procura o teu quarto ideal
                                  ao melhor preço.
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
  <h2 class="section-heading corAzul">Login</h2>
  <hr class="section-heading-spacer" >
    <br>
    <br>
  <form action="PaginaInicial.html">
      <label class="corPreta"><b>Email:</b></label><br>
      <input class="form-control" type="email" placeholder="Email" name="eml" required>
      <br>
      <label class="corPreta"><b>Password:</b></label><br>
      <input class="form-control" type="password" placeholder="Password" name="psw" required>
      <br>

      <div id="Aviso" class="alert alert-danger" role="alert" style="display:none">
          <div class="row leftCaracteris">
          <div class="col-lg-2 ">
          <img class="alertaImg" src="./img/img_aplicacao/alerta.png" alt="">
          </div>
          <div class="col-lg-6">
            <span class="glyphicon glyphicon-alert">Credenciais erradas!<br>Tente novamente.</span>
          </div>
        </div>
      </div>
      <button class="btn btn-primary navbar-btn" onclick="Mudarestado('Aviso')" type="submit">Entrar</button>

  </form>

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
  <h2 class="section-heading corBranca">Registo</h2>
  <hr class="section-heading-spacer">
  <br><br>
  <form action="PaginaInicial.html">
      <label class="corPreta" ><b>Email:</b></label>
      <br>
      <div class="form-group input-group">
        <input type="email" class="form-control" placeholder="Email" id="inlineFormInputGroup" required>
        <div class="input-group-addon" ><img class="certo" src="./img/img_aplicacao/certo.png" alt=""></div>

      </div>
      <label class="corPreta"><b>Password:</b></label><br>
      <input class="form-control" type="password" placeholder="Password" name="psw" required>
      <br>
      <label class="corPreta"><b>Nome:</b></label><br>
      <input class="form-control" type="text" placeholder="Nome" name="nme" required>
      <br>
      <div id="Aviso2" class="alert alert-success" role="alert" style="display:none">
          <div class="row leftCaracteris">
          <div class="col-lg-2 ">
          <img class="alertaImg" src="./img/img_aplicacao/certo.png" alt="">
          </div>
          <div class="col-lg-8">
            <span class="glyphicon glyphicon-alert">Registado com sucesso!</span>
          </div>
        </div>
      </div>
      <button class="btn btn-default" onclick="Mudarestado('Aviso2')"  type="submit">Registar</button>

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
