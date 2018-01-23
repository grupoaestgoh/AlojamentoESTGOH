<?php

class Anuncio{

  //Atributos de um Utilizador
  public $Id_Anuncio;
  public $Titulo;
  public $Proprietario;
  public $Morada;
  public $Telefone;
  public $Email;
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
  public function __construct ($Id_Anuncio,$Titulo,$Proprietario,$Morada,$Telefone,$Email,$Data_Submetido,$Disponibilidade,$Estado,$Preco,$Fotos,$Wc,$Mobilia,$Utensilios,$Internet,$Rapariga,$Rapaz,$Despesas,$Animais,$Latitude,$Longitude){
    $this->Id_Anuncio=$Id_Anuncio;
    $this->Titulo=$Titulo;
    $this->Proprietario=$Proprietario;
    $this->Morada=$Morada;
    $this->Telefone=$Telefone;
    $this->Email=$Email;
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
    return array("ti"=>$this->Titulo,"pr"=>$this->Proprietario,"mo"=>$this->Morada,"te"=>$this->Telefone,"em"=>$this->Email,"da"=>$this->Data_Submetido,"di"=>$this->Disponibilidade,"es"=>$this->Estado,"pr"=>$this->Preco,"wc"=>$this->Wc,"mob"=>$this->Mobilia,"ut"=>$this->Utensilios,"in"=>$this->Internet,"ra"=>$this->Rapariga,"rap"=>$this->Rapaz,"de"=>$this->Despesas,"an"=>$this->Animais,"la"=>$this->Latitude,"lo"=>$this->Longitude);
  }
  //Devolve utilizador em array sem atributo id
  public function to_array_com_id(){
    return array("An"=>$this->Id_Anuncio,"ti"=>$this->Titulo,"pr"=>$this->Proprietario,"mo"=>$this->Morada,"te"=>$this->Telefone,"em"=>$this->Email,"da"=>$this->Data_Submetido,"di"=>$this->Disponibilidade,"es"=>$this->Estado,"pr"=>$this->Preco,"wc"=>$this->Wc,"mob"=>$this->Mobilia,"ut"=>$this->Utensilios,"in"=>$this->Internet,"ra"=>$this->Rapariga,"rap"=>$this->Rapaz,"de"=>$this->Despesas,"an"=>$this->Animais,"la"=>$this->Latitude,"lo"=>$this->Longitude);
  }
}
 ?>
