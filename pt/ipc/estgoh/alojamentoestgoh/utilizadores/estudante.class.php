<?php
class Estudante extends Utilizador{

  //Construtor da classe estudante
  function __construct($Id_Utilizador,$Nome,$Email,$Password,$Tipo,$Data_Inscricao)
  {
    parent::__construct($Id_Utilizador,$Nome,$Email,$Password,$Tipo,$Data_Inscricao);
  }
}
 ?>
