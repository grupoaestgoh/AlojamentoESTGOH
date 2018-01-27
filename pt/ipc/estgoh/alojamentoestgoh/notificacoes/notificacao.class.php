<?php

class Notificacao{

  //Atributos de uma notificação
  public $Id_Notificacao;
  public $Id_Uti;
  public $Estado;
  public $Descricao;
  public $Data;
  public $Hora;
  public $Tipo;
  public $Cor;

  //Construtor da classe notificacao
  public function __construct ($Id_Notificacao,$Id_Uti,$Estado,$Descricao,$Data,$Hora,$Tipo,$Cor){
    $this->Id_Notificacao=$Id_Notificacao;
    $this->Id_Uti=$Id_Uti;
    $this->Estado=$Estado;
    $this->Descricao=$Descricao;
    $this->Data=$Data;
    $this->Hora=$Hora;
    $this->Tipo=$Tipo;
    $this->Cor=$Cor;
  }
  //Devolve notificacao em array sem atributo id
  public function to_array_sem_id(){
    return array("u"=>$this->Id_Uti,"e"=>$this->Estado,"d"=>$this->Descricao,"da"=>$this->Data,"h"=>$this->Hora,"t"=>$this->Tipo,"c"=>$this->Cor);
  }
  //Devolve notificacao em array sem atributo id
  public function to_array_com_id(){
    return array("n"=>$this->Id_Notificacao,"u"=>$this->Id_Uti,"e"=>$this->Estado,"d"=>$this->Descricao,"da"=>$this->Data,"h"=>$this->Hora,"t"=>$this->Tipo,"c"=>$this->Cor);
  }
}
 ?>
