<?php
class DAODenuncias{
/*
Estado
1-ativa
2-inativa
*/


  //Insere um denuncia na base de dados
  function inserir_denuncia(Denuncia $den_denuncia){
    global $mybd;
      $STH=$mybd->DBH->prepare("Insert into denuncias (anu_id,den_descricao,den_titulo,den_data,den_estado) values (:a,:t,:de,:da,:e);");
    if(!$STH->execute($notificacao->to_array_sem_id()))return false;
    return true;
  }

    //Edita estado de notificacao
    function alterar_estado($id_den,$estado){
    global $mybd;
		$STH = $mybd->DBH->prepare("Update denuncias Set den_estado=? Where anu_id=?;");
    $STH->bindParam(1, $estado);
    $STH->bindParam(2, $id_den);
		if(!$STH->execute())return false;
    return true;
  }
//Lista notificaçoes
  function listar_denuncias($id_anuncio,$opcao){
    $arrayDenuncias=[];
    global $mybd;
    //lista para gestores
      $STH = $mybd->DBH->prepare("Select den_id,anu_id,den_decricao,den_titulo,den_data,den_estado from denuncias where  den_estado=1;");
      $STH->bindParam(1, $id_anuncio);

    $STH->execute();
      $STH->setFetchMode(PDO::FETCH_OBJ);
      $i=0;
			while($row = $STH->fetch()){
				$arrayDenuncias[$i]=new Denuncia($row->den_id,$row->anu_id,$row->den_decricao,$row->den_titulo,$row->den_data,$row->den_estado);
        $i++;
      }
    return $arrayDenuncias;
  }

}
 ?>
