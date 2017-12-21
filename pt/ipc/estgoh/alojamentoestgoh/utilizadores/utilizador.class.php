<?php

class Utilizador
{

  //Atributos de um Utilizador
  public $Id_Utilizador;
  public $Nome;
  public $Email;
  public $Password;
  public $Tipo;
  public $Data_Inscricao;

  //Construtor da classe utilizador
  public function __construct ($Id_Utilizador,$Nome,$Email,$Password,$Tipo,$Data_Inscricao)
  {
    $this->Id_Utilizador=$Id_Utilizador;
    $this->Nome=$Nome;
    $this->Email=$Email;
    $this->Password=$Password;
    $this->Tipo=$Tipo;
    $this->Data_Inscricao=$Data_Inscricao;
  }
  //Devolve utilizador em array sem atributo id
  public function to_array_sem_id()
  {
    return array("n"=>$this->Nome,"e"=>$this->Email,"p"=>$this->Password,"t"=>$this->$Tipo,"d"=$this->Data_Inscricao)
  }
  //Devolve utilizador em array sem atributo id
  public function to_array_com_id()
  {
    return array("i"=>$this->Id_Utilizador,"n"=>$this->Nome,"e"=>$this->Email,"p"=>$this->Password,"t"=>$this->$Tipo,"d"=$this->Data_Inscricao)
  }
}
 ?>
