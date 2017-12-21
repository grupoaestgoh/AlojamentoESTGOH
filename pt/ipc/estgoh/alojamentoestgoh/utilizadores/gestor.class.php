<?php
class Gestor extends Utilizador{

  //Construtor da classe gestor
  function __construct($Id_Utilizador,$Nome,$Email,$Password,$Tipo,$Data_Inscricao)
  {
    parent::__construct($Id_Utilizador,$Nome,$Email,$Password,$Tipo,$Data_Inscricao);
  }
  //Devolve gestor em array sem atributo id
  public function to_array_sem_id()
  {
    return array("n"=>$this->Nome,"e"=>$this->Email,"p"=>$this->Password,"t"=>$this->$Tipo,"d"=$this->Data_Inscricao)
  }
  //Devolve gestor em array sem atributo id
  public function to_array_com_id()
  {
    return array("i"=>$this->Id_Utilizador,"n"=>$this->Nome,"e"=>$this->Email,"p"=>$this->Password,"t"=>$this->$Tipo,"d"=$this->Data_Inscricao)
  }
}
 ?>
