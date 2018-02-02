<?php

class Log{

  //Atributos de uma denuncia
  public $Id_Log;
  public $Id_utilizador;
  public $Acao;
  public $Data;
  public $Hora;

  //Construtor da classe notificacao
  public function __construct ($Id_Log,$Id_utilizador,$Acao,$Data,$Hora){
    $this->Id_Log=$Id_Log;
    $this->Id_utilizador=$Id_utilizador;
    $this->Acao=$Acao;
    $this->Data=$Data;
    $this->Hora=$Hora;

  }
  //Devolve log em array sem atributo id
  public function to_array_sem_id(){
    return array("u"=>$this->Id_utilizador,"a"=>$this->Acao,"d"=>$this->Data,"h"=>$this->Hora);
  }
  //Devolve log em array sem atributo id
  public function to_array_com_id(){
    return array("l"=>$this->Id_Log,"u"=>$this->Id_utilizador,"a"=>$this->Acao,"d"=>$this->Data,"h"=>$this->Hora);
  }
}
 ?>
