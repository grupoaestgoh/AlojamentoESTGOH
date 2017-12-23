<?php
class Anunciante extends Utilizador{
  //Atributos de um anunciante
  public $Estado;

  //Construtor da classe anunciante
  function __construct($Id_Utilizador,$Nome,$Email,$Password,$Tipo,$Data_Inscricao,$Estado){
    parent::__construct($Id_Utilizador,$Nome,$Email,$Password,$Tipo,$Data_Inscricao);
    $this->Estado=$Estado;
  }
  //Devolve anunciante em array sem atributo id
  public function to_array_sem_id(){
    return array("n"=>$this->Nome,"e"=>$this->Email,"p"=>$this->Password,"t"=>$this->$Tipo,"d"=$this->Data_Inscricao,"es"=$this->Estado)
  }
  //Devolve anunciante em array sem atributo id
  public function to_array_com_id(){
    return array("i"=>$this->Id_Utilizador,"n"=>$this->Nome,"e"=>$this->Email,"p"=>$this->Password,"t"=>$this->$Tipo,"d"=$this->Data_Inscricao,"es"=$this->Estado)
  }
}
 ?>
