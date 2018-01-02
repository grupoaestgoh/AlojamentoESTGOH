<?php



//Ficheiro Ligacao a Base de dados
include('./comum/basedados.class.php');
//Ficheiro de varias configurações
include('./comum/config.php');
include('./utilizadores/utilizador.class.php');

include('./utilizadores/DAOutilizador.class.php');
//Ficheiro da internacionalização
if (file_exists ( "./lang/i18n_" . $lingua . ".php" ))
  include "./lang/i18n_" . $lingua . ".php";
else
  include "./lang/i18n_pt.php"; // por defeito

$path = ".";


//variaies com os objetos das classes
$mybd=new BaseDados();
$dao_utilizadores=new DAOUtilizadores();

 ?>
