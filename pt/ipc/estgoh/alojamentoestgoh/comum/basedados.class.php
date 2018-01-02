<?php
class  BaseDados {
	public $DBH = null;

  //Construtor da classe basedados
	function __construct()
  {
		$this->ligar_bd();
	}
  //Função que liga a base de dados
	function ligar_bd()
  {
  		global $host; global $dbname; global $user; global $pass;
  		try
      {
  			$this->DBH = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
  		}
       catch(PDOException $e)
      {
  			echo $e->getMessage();
  		}
	}

  //Função que desliga a base de dados
	function desligar_bd()
  {
		$this->DBH = null;
	}
}

?>
