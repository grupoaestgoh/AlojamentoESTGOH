<?php
  include('./comum/basedados.class.php');
  include('./comum/config.php');
  include('./utilizadores/DAOutilizadores.class.php');

  $mybd=new BaseDados();
  $mybd->ligar_bd();
  $DaoUtilizadores=new DAOUtilizadores();
  $resposta=$DaoUtilizadores->verificar_email($_POST['email']);
  if($resposta==true){
    echo 1;
  }else{
    echo 0;
  }
  $mybd->desligar_bd();
?>
