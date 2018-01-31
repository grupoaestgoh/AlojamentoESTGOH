<?php

//Ficheiro Ligacao a Base de dados
include('./comum/basedados.class.php');
//Ficheiro de varias configurações
include('./comum/config.php');


include('./utilizadores/DAOutilizador.class.php');
include('./utilizadores/utilizador.class.php');
include('./utilizadores/anunciante.class.php');
include('./utilizadores/gestor.class.php');
include('./utilizadores/estudante.class.php');
include('./anuncios/anuncio.class.php');
include('./anuncios/foto.class.php');
include('./anuncios/DAOAnuncio.class.php');
include('./anuncios/DAOFotos.class.php');
include('./notificacoes/DAONotificacao.class.php');
include('./notificacoes/notificacao.class.php');
include('./denuncias/DAODenuncia.class.php');
include('./denuncias/denuncia.class.php');
//Ficheiro da internacionalização
if (file_exists ( "./lang/i18n_" . $lingua . ".php" ))
  include "./lang/i18n_" . $lingua . ".php";
else
  include "./lang/i18n_pt.php"; // por defeito

$path = ".";


//variaies com os objetos das classes
$mybd=new BaseDados();
$dao_utilizadores=new DAOUtilizadores();
$dao_anuncios=new DAOAnuncios();
$dao_fotos=new DAOFoto();
$dao_notificacao=new DAONotificacoes();
$dao_denuncias=new DAODenuncias();

 ?>
