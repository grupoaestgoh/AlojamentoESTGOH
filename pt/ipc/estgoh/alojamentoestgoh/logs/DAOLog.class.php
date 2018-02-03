<?php
class DAOLogs{


  //Insere um log na base de dados
  function inserir_log(Log $log){
    global $mybd;
      $STH=$mybd->DBH->prepare("Insert into acoes (uti_id,aca_descricao,aca_data,aca_hora) values (:u,:d,:a,:d,:h);");
    if(!$STH->execute($log->to_array_sem_id()))return false;
    return true;
  }


//Lista log
  function listar_logs($opcao){
    $arraylogs=[];
    global $mybd;
    //lista todods logs
    if($opcao==0){
      $STH = $mybd->DBH->prepare("Select aca_id,uti_id,aca_descricao,aca_data,aca_hora from acoes;");
    }else {
      $STH = $mybd->DBH->prepare("Select aca_id,acoes.uti_id,aca_descricao,aca_data,aca_hora,utilizador.uti_id,uti_nome from acoes,utilizador where acoes.uti_id=utilizador.uti_id and acoes.uti_id=?;");
      $STH->bindParam(1, $opcao);
    }
    $STH->execute();
      $STH->setFetchMode(PDO::FETCH_OBJ);
      $i=0;
			while($row = $STH->fetch()){
				$arraylogs[$i]=new Log($row->aca_id,$row->uti_id,$row->aca_descricao,$row->aca_data,$row->aca_hora);
        $i++;
      }
    return $arraylogs;
  }

}
 ?>
