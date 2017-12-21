<!DOCTYPE html>
<html lang="<?php print($lingua);?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php print $titulo_pagina; ?></title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/estilos.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
  <link href="https://fonts.googleapis.com/css?family=Germania+One|Ropa+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>
    <body>

					<?php if(isset($conteudo_principal)) print $conteudo_principal;  ?>


    <!-- Footer -->
    	<footer class="panel-footer  navbar-fixed-bottom">
        <div class="container">
          <ul class="list-inline">
            <li class="list-inline-item">
              <a class="corAzul" href="http://websrv2.estgoh.ipc.pt/portal2/">Estgoh</a>
            </li>
            <li class="footer-menu-divider list-inline-item divAzul">&sdot;</li>
            <li class="list-inline-item">
              <a class="corAzul" href="https://mailsecure.estgoh.ipc.pt/horde/imp/login.php">E-mail</a>
            </li>
            <li class="footer-menu-divider list-inline-item divAzul">&sdot;</li>
            <li class="list-inline-item">
              <a class="corAzul" href="http://elearning.estgoh.ipc.pt/">E-learning</a>
            </li>
            <li class="footer-menu-divider list-inline-item divAzul">&sdot;</li>
            <li class="list-inline-item">
              <a class="corAzul" href="http://biblio.estgoh.ipc.pt/">Biblioteca</a>
            </li>
            <li class="footer-menu-divider list-inline-item divAzul">&sdot;</li>
            <li class="list-inline-item">
              <a class="corAzul" href="http://netpa.estgoh.ipc.pt/netpa/page">NetPA(Portal Académico)</a>
            </li>
            <li class="footer-menu-divider list-inline-item divAzul">&sdot;</li>
            <li class="list-inline-item">
              <a class="corAzul" href="#sobre">Sobre nós</a>
            </li>
            <li class="footer-menu-divider list-inline-item divAzul">&sdot;</li>
            <li class="list-inline-item">
              <a class="corAzul" href="#contactos">Contatos</a>
            </li>
          </ul>
          <p class="copyright text-muted small">Copyright &copy; AlojamentoESTGOH 2017. Todos direitos reservados.</p>
        </div>
     	</footer>


    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="./javascript/bootstrap.min.js"></script>
<script src="./javascript/codigo_javascript.js"></script>
