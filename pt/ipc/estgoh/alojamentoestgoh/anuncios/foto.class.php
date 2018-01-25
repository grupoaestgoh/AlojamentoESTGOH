<?php

class Foto{

  //Atributos de um Utilizador
  public $Id_Foto;
  public $Id_anuncio;
  public $Caminho;
  public $Nome;


  //Construtor da classe utilizador
  public function __construct ($Id_Foto,$Id_anuncio,$Caminho,$Nome){
    $this->Id_Foto=$Id_Foto;
    $this->Id_anuncio=$Id_anuncio;
    $this->Caminho=$Caminho;
    $this->Nome=$Nome;
  }
  //Devolve utilizador em array sem atributo id
  public function to_array_sem_id(){
    return array("a"=>$this->Id_anuncio,"c"=>$this->Caminho,"n"=>$this->Nome);
  }
  //Devolve utilizador em array sem atributo id
  public function to_array_com_id(){
    return array("f"=>$this->Id_Foto,"a"=>$this->Id_anuncio,"c"=>$this->Caminho,"n"=>$this->Nome);
  }
}
 ?>
