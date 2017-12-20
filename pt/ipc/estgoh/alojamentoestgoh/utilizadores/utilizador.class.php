<?php

class Utilizador
{

  //Atributos de um Utilizador
  private $Id_Utilizador;
  private $Nome;
  private $Email;
  private $Password;
  private $Tipo;
  private $Data_Inscricao;

  //Construtor da classe utilizador
  public function_construct ($Id_Utilizador,$Nome,$Email,$Password,$Tipo,$Data_Inscricao)
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
