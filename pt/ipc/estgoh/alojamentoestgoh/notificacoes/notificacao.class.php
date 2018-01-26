<?php

class Notificacao{

  //Atributos de uma notificação
  public $Id_Notificacao;
  public $Id_Uti;
  public $Estado;
  public $Descricao;
  public $Data;
  public $Hora;

  //Construtor da classe utilizador
  public function __construct ($Id_Notificacao,$Id_Uti,$Estado,$Descricao,$Data,$Hora){
    $this->Id_Notificacao=$Id_Notificacao;
    $this->Id_Uti=$Id_Uti;
    $this->Estado=$Estado;
    $this->Descricao=$Descricao;
    $this->Data=$Data;
    $this->Hora=$Hora;
  }
  //Devolve notificacao em array sem atributo id
  public function to_array_sem_id(){
    return array("u"=>$this->Id_Uti,"e"=>$this->Estado,"d"=>$this->Descricao,"da"=>$this->Data,"h"=>$this->Hora);
  }
  //Devolve notificacao em array sem atributo id
  public function to_array_com_id(){
    return array("n"=>$this->Id_Notificacao,"u"=>$this->Id_Uti,"e"=>$this->Estado,"d"=>$this->Descricao,"da"=>$this->Data,"h"=>$this->Hora);
  }
}
 ?>
