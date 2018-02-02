<?php

class Denuncia{

  //Atributos de uma denuncia
  public $Id_Denuncia;
  public $Id_Anuncio;
  public $Titulo;
  public $Descricao;
  public $Data;
  public $Estado;

  //Construtor da classe notificacao
  public function __construct ($Id_Denuncia,$Id_Anuncio,$Titulo,$Descricao,$Data,$Estado){
    $this->Id_Denuncia=$Id_Denuncia;
    $this->Id_Anuncio=$Id_Anuncio;
    $this->Titulo=$Titulo;
    $this->Descricao=$Descricao;
    $this->Data=$Data;
    $this->Estado=$Estado;

  }
  //Devolve denuncia em array sem atributo id
  public function to_array_sem_id(){
    return array("a"=>$this->Id_Anuncio,"t"=>$this->Titulo,"de"=>$this->Descricao,"da"=>$this->Data,"e"=>$this->Estado);
  }
  //Devolve denuncia em array sem atributo id
  public function to_array_com_id(){
    return array("d"=>$this->Id_Denuncia,"a"=>$this->Id_Anuncio,"t"=>$this->Titulo,"de"=>$this->Descricao,"da"=>$this->Data,"e"=>$this->Estado);
  }
}
 ?>
