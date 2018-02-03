<?php
  session_start();

  //carregar controladores para fazer logout
	include('./basedados.class.php');
  include('../logs/DAOLog.class.php');
  include('../logs/log.class.php');
  include('./config.php');
  $mybd = new BaseDados();
  $dao_logs = new DAOLogs();
  $log = new log(-1,$_SESSION["AE_id_utilizador"],"Terminou sessão",date('Y-m-d'),date('H:m:s'));
  $dao_logs->inserir_log($log);

  $_SESSION = array();
  if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
  }
  session_destroy();

  header("Location: ../index.php");
 ?>
