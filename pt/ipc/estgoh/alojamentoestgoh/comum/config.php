<?php

//Dados da base de dados
	$host = "localhost";
	$dbname = "alojamentoestgoh";
	$user = "root";
	$pass = "root";

//layout
	$layout = "./comum/master_page.php";


//internacionalização

	$lang = "pt";
	if(isset($_GET["lingua"]) && !empty($_GET["lingua"])){
		$lingua=$_GET["lingua"];
		setcookie("lingua","", time()-3600);
		setcookie("lingua", $lingua ,time()+60*60*24*30, '/', $_SERVER["SERVER_NAME"]);
	}elseif(isset($_COOKIE["lingua"]) && !empty($_COOKIE["lingua"])){
		$lingua=$_COOKIE["lingua"];
	}else{
		$lingua = $lang;
	}

//saber o ficheiro atual para os links das bandeiras
	$file = $_SERVER["SCRIPT_NAME"];
	$file_array = explode('/', $file);
	$filename = $file_array[count($file_array) - 1];

?>
