<?php
class DAONotificacoes{
/*
Estado
1-visto
2-não viu

amarelo-
Tem anuncio pendente!
Tem proprietario pendente!

verde-
O anuncio foi aceite e encontrasse ativo!

vermelho-
Tem uma denuncia de um anuncio!
O seu anuncio foi rejeitado!
Tem pedidos de desativacao de conta!

*/


  //Insere um notificacao na base de dados
  function inserir_notificacao(Notificacao $notificacao){
    global $mybd;
      $STH=$mybd->DBH->prepare("Insert into notificacao (uti_id,not_descricao,not_data,not_hora,not_estado) values (u,:d,:da,:h,:e);");
    if(!$STH->execute($notificacao->to_array_sem_id()))return false;
    return true;
  }

    //Edita estado de notificacao
    function alterar_estado($id_not,$estado){
    global $mybd;
		$STH = $mybd->DBH->prepare("Update notificacao Set not_estado=? Where not_id=?;");
    $STH->bindParam(1, $estado);
    $STH->bindParam(2, $id_not);
		if(!$STH->execute($anuncioEdita->to_array_com_id()))return false;
    return true;
  }
//Lista notificaçoes
  function listar_notificacoes($id_utilizador){
    $arrayNotificaoes=[];
    global $mybd;
    $STH = $mybd->DBH->prepare("Select not_id,uti_id,not_descricao,not_estado,not_data,not_hora from notificacao where uti_id=? order by not_estado desc;");
    $STH->bindParam(1, $id_utilizador);
    $STH->execute();
      $STH->setFetchMode(PDO::FETCH_OBJ);
      $i=0;
			while($row = $STH->fetch()){
				$arrayNotificaoes[$i]=new Notificacao($row->not_id,$row->uti_id,$row->not_estado,$row->not_descricao,$row->not_data,$row->not_hora);
        $i++;
      }
    return $arrayNotificaoes;
  }

}
 ?>
