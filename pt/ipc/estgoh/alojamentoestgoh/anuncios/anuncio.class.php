<?php

class Anuncio{

  //Atributos de um Utilizador
  public $Id_Anuncio;
  public $Titulo;
  public $Descricao;
  public $Proprietario;
  public $Morada;
  public $Telefone;
  public $Email;
  public $Codigo_postal;
  public $Data_Submetido;
  public $Disponibilidade;
  public $Estado;
  public $Preco;
  public $Fotos;
  public $Wc;
  public $Mobilia;
  public $Utensilios;
  public $Internet;
  public $Rapariga;
  public $Rapaz;
  public $Despesas;
  public $Animais;
  public $Latitude;
  public $Longitude;

  //Construtor da classe utilizador
  public function __construct ($Id_Anuncio,$Titulo,$Descricao,$Proprietario,$Morada,$Telefone,$Email,$Codigo_postal,$Data_Submetido,$Disponibilidade,$Estado,$Preco,$Fotos,$Wc,$Mobilia,$Utensilios,$Internet,$Rapariga,$Rapaz,$Despesas,$Animais,$Latitude,$Longitude){
    $this->Id_Anuncio=$Id_Anuncio;
    $this->Titulo=$Titulo;
    $this->Descricao=$Descricao;
    $this->Proprietario=$Proprietario;
    $this->Morada=$Morada;
    $this->Telefone=$Telefone;
    $this->Email=$Email;
    $this->Codigo_postal=$Codigo_postal;
    $this->Data_Submetido=$Data_Submetido;
    $this->Disponibilidade=$Disponibilidade;
    $this->Estado=$Estado;
    $this->Preco=$Preco;
    $this->Fotos=$Fotos;
    $this->Wc=$Wc;
    $this->Mobilia=$Mobilia;
    $this->Utensilios=$Utensilios;
    $this->Internet=$Internet;
    $this->Rapariga=$Rapariga;
    $this->Rapaz=$Rapaz;
    $this->Despesas=$Despesas;
    $this->Animais=$Animais;
    $this->Latitude=$Latitude;
    $this->Longitude=$Longitude;

  }
  //Devolve utilizador em array sem atributo id
  public function to_array_sem_id(){
    return array("ti"=>$this->Titulo,"de"=>$this->Descricao,"pr"=>$this->Proprietario,"mo"=>$this->Morada,"te"=>$this->Telefone,"em"=>$this->Email,"co"=>$this->Codigo_postal,"da"=>$this->Data_Submetido,"di"=>$this->Disponibilidade,"es"=>$this->Estado,"pre"=>$this->Preco,"fo"=>$this->Fotos,"wc"=>$this->Wc,"mob"=>$this->Mobilia,"ut"=>$this->Utensilios,"in"=>$this->Internet,"ra"=>$this->Rapariga,"rap"=>$this->Rapaz,"des"=>$this->Despesas,"ani"=>$this->Animais,"la"=>$this->Latitude,"lo"=>$this->Longitude);
  }
  //Devolve utilizador em array sem atributo id
  public function to_array_com_id(){
    return array("an"=>$this->Id_Anuncio,"ti"=>$this->Titulo,"de"=>$this->Descricao,"pr"=>$this->Proprietario,"mo"=>$this->Morada,"te"=>$this->Telefone,"em"=>$this->Email,"co"=>$this->Codigo_postal,"da"=>$this->Data_Submetido,"di"=>$this->Disponibilidade,"es"=>$this->Estado,"pre"=>$this->Preco,"fo"=>$this->Fotos,"wc"=>$this->Wc,"mob"=>$this->Mobilia,"ut"=>$this->Utensilios,"in"=>$this->Internet,"ra"=>$this->Rapariga,"rap"=>$this->Rapaz,"des"=>$this->Despesas,"ani"=>$this->Animais,"la"=>$this->Latitude,"lo"=>$this->Longitude);
  }
}
 ?>
