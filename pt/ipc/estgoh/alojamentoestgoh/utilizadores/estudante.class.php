<?php
class Estudante extends Utilizador{
  //Atributos de um estudante
  public $Estado;

  //Construtor da classe estudante
  function __construct($Id_Utilizador,$Nome,$Email,$Password,$Tipo,$Data_Inscricao,$Estado)
  {
    parent::__construct($Id_Utilizador,$Nome,$Email,$Password,$Tipo,$Data_Inscricao);
    $this->Estado=$Estado;
  }
}
 ?>
