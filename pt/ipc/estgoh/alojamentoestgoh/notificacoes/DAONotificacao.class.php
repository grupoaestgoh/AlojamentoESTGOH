<?php
class DAONotificacoes{
/*
Estado
1-visto
2-não viu


verde
1-Anuncio Aprovado!(Agora todos os alunos poderao ver o seu anuncio!)

amarelo
2-Tem anuncio pendente! (o anuncio com id"$id_anu" espera aprovacao!)
3-Tem proprietario pendente!(Proprietario "$email" quer acede ao sistema!)

vermelho
4-Denuncia de um anuncio! (o anuncio "$titulo" foi deunciado!)
5-Anuncio reprovado! (Edite o anuncio pois não está conforme as regras!)
6-Pedidos de desativacao de conta! (Utilizadores  não querem usar a aplicacao!)

*/


  //Insere um notificacao na base de dados
  function inserir_notificacao(Notificacao $notificacao){
    global $mybd;
      $STH=$mybd->DBH->prepare("Insert into notificacao (uti_id,not_descricao,not_data,not_hora,not_estado,not_tipo,not_cor) values (:u,:d,:da,:h,:e,:t,:c);");
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
    //lista para gestores
    if($id_utilizador==-1){
      $STH = $mybd->DBH->prepare("Select not_id,uti_id,not_descricao,not_estado,not_data,not_hora,not_tipo,not_cor from notificacao where not_tipo=1 order by not_cor asc;");

    }else{
      //lista para anunciante especifico
      $STH = $mybd->DBH->prepare("Select not_id,uti_id,not_descricao,not_estado,not_data,not_hora,not_tipo,not_cor from notificacao where uti_id=?  order by not_cor asc;");
      $STH->bindParam(1, $id_utilizador);
    }
    $STH->execute();
      $STH->setFetchMode(PDO::FETCH_OBJ);
      $i=0;
			while($row = $STH->fetch()){
				$arrayNotificaoes[$i]=new Notificacao($row->not_id,$row->uti_id,$row->not_estado,$row->not_descricao,$row->not_data,$row->not_hora,$row->not_tipo,$row->not_cor);
        $i++;
      }
    return $arrayNotificaoes;
  }

}
 ?>
