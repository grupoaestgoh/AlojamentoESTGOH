<?php
class Gestor extends Utilizador{
  //Atributos de um gestor
  public $Estado;

  //Construtor da classe gestor
  function __construct($Id_Utilizador,$Nome,$Email,$Password,$Tipo,$Data_Inscricao,$estado){
    parent::__construct($Id_Utilizador,$Nome,$Email,$Password,$Tipo,$Data_Inscricao);
    $this->Estado=$Estado;
  }
  //Devolve gestor em array sem atributo id
  public function to_array_sem_id(){
    return array("n"=>$this->Nome,"e"=>$this->Email,"p"=>$this->Password,"t"=>$this->$Tipo,"d"=>$this->Data_Inscricao,"es"=>$this->Estado);
  }
  //Devolve gestor em array sem atributo id
  public function to_array_com_id(){
    return array("i"=>$this->Id_Utilizador,"n"=>$this->Nome,"e"=>$this->Email,"p"=>$this->Password,"t"=>$this->$Tipo,"d"=>$this->Data_Inscricao,"es"=>$this->Estado);
  }
}
 ?>
