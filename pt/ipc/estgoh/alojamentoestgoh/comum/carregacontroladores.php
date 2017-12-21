<?php



//Ficheiro Ligacao a Base de dados
include('./comum/basedados.class.php');
//Ficheiro de varias configurações
include('./comum/config.php');
//Ficheiro da internacionalização
if (file_exists ( "./lang/i18n_" . $lingua . ".php" ))
  include "./lang/i18n_" . $lingua . ".php";
else
  include "./lang/i18n_pt.php"; // por defeito

$path = ".";

$mybd = new basedados ();


 ?>
