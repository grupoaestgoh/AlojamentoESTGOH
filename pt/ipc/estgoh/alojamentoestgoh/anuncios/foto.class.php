<?php

class Foto{

  //Atributos de um Utilizador
  public $Id_Foto;
  public $Caminho;
  public $Nome;


  //Construtor da classe utilizador
  public function __construct ($Id_Fot,$Caminho,$Nome){
    $this->Id_Foto=$Id_Foto;
    $this->Caminho=$Caminho;
    $this->Nome=$Nome;
  }
  //Devolve utilizador em array sem atributo id
  public function to_array_sem_id(){
    return array("c"=>$this->Caminho,"n"=>$this->Nome);
  }
  //Devolve utilizador em array sem atributo id
  public function to_array_com_id(){
    return array("f"=>$this->Id_Foto,"c"=>$this->Caminho,"n"=>$this->Nome);
  }
}
 ?>
