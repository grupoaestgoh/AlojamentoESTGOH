<!DOCTYPE html>
<html lang="<?php print($lingua);?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php print $titulo_pagina; ?></title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
  <link href="https://fonts.googleapis.com/css?family=Germania+One|Ropa+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/estilos.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="./javascript/bootstrap.min.js"></script>
  <script src="./javascript/codigo_javascript.js"></script>

</head>
    <body>

					<?php if(isset($conteudo_principal)) print $conteudo_principal;  ?>

          <?php
          if(isset($rodape) ){
              if($rodape==true){
              print "
              <!-- Footer -->
                <footer class=\"panel-footer  navbar-fixed-bottom\">
                  <div class=\"container\">
                    <ul class=\"list-inline\">
                      <li class=\"list-inline-item\">
                        <a class=\"corAzul\" href=\"http://websrv2.estgoh.ipc.pt/portal2/\">$estgohR</a>
                      </li>
                      <li class=\"footer-menu-divider list-inline-item \">&sdot;</li>
                      <li class=\"list-inline-item\">
                        <a class=\"corAzul\" href=\"https://mailsecure.estgoh.ipc.pt/horde/imp/login.php\">$emailR</a>
                      </li>
                      <li class=\"footer-menu-divider list-inline-item \">&sdot;</li>
                      <li class=\"list-inline-item\">
                        <a class=\"corAzul\" href=\"http://elearning.estgoh.ipc.pt/\">$elearningR</a>
                      </li>
                      <li class=\"footer-menu-divider list-inline-item \">&sdot;</li>
                      <li class=\"list-inline-item\">
                        <a class=\"corAzul\" href=\"http://biblio.estgoh.ipc.pt/\">$bibliotecaR</a>
                      </li>
                      <li class=\"footer-menu-divider list-inline-item \">&sdot;</li>
                      <li class=\"list-inline-item\">
                        <a class=\"corAzul\" href=\"http://netpa.estgoh.ipc.pt/netpa/page\">$netpaR</a>
                      </li>
                      <li class=\"footer-menu-divider list-inline-item \">&sdot;</li>
                      <li class=\"list-inline-item\">
                        <a class=\"corAzul\" href=\"#sobre\">$sobreNosR</a>
                      </li>
                      <li class=\"footer-menu-divider list-inline-item \">&sdot;</li>
                      <li class=\"list-inline-item\">
                        <a class=\"corAzul\" href=\"#contactos\">$contactosR</a>
                      </li>
                    </ul>
                    <p class=\"copyright text-muted small\">Copyright &copy; $direitosR</p>
                  </div>
                </footer>

              ";
            }else{
                  print "
                  <footer class=\"footerGestor\">
                    <div class=\"row\">
                      <div class=\"col-3\"></div>
                      <div class=\"container col-9\">
                        <ul class=\"list-inline\">
                          <li class=\"list-inline-item corBranca\">
                            <a class=\"corBranca\" href=\"http://websrv2.estgoh.ipc.pt/portal2/\">$estgohR</a>
                          </li>
                          <li class=\"footer-menu-divider list-inline-item corBranca\">&sdot;</li>
                          <li class=\"list-inline-item corBranca\">
                            <a class=\"corBranca\" href=\"https://mailsecure.estgoh.ipc.pt/horde/imp/login.php\">$emailR</a>
                          </li>
                          <li class=\"footer-menu-divider list-inline-item corBranca\">&sdot;</li>
                          <li class=\"list-inline-item corBranca\">
                            <a class=\"corBranca\" href=\"http://elearning.estgoh.ipc.pt/\">$elearningR</a>
                          </li>
                          <li class=\"footer-menu-divider list-inline-item corBranca\">&sdot;</li>
                          <li class=\"list-inline-item corBranca\">
                            <a class=\"corBranca\" href=\"http://biblio.estgoh.ipc.pt/\">$bibliotecaR</a>
                          </li>
                          <li class=\"footer-menu-divider list-inline-item corBranca\">&sdot;</li>
                          <li class=\"list-inline-item corBranca\">
                            <a class=\"corBranca\" href=\"http://netpa.estgoh.ipc.pt/netpa/page\">$netpaR</a>
                          </li>
                          <li class=\"footer-menu-divider list-inline-item corBranca\">&sdot;</li>
                          <li class=\"list-inline-item corBranca\">
                            <a class=\"corBranca\" href=\"#sobre\">$sobreNosR</a>
                          </li>
                          <li class=\"footer-menu-divider list-inline-item corBranca\">&sdot;</li>
                          <li class=\"list-inline-item corBranca\">
                            <a class=\"corBranca\" href=\"#contactos\">$contactosR</a>
                          </li>
                        </ul>
                        <p class=\"copyright text-muted small corBranca\">Copyright &copy; $direitosR</p>
                      </div>
                    </div>
                  </footer>

                  ";
              }
          }






?>
    </body>
</html>
