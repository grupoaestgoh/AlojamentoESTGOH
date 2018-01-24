<?php
class DAOAnuncios{

  //Insere um anuncio na base de dados
  function inserir_anuncio(Anuncio $anuncio){
    global $mybd;
      $STH=$mybd->DBH->prepare("Insert into anuncio (uti_id,anu_titulo,anu_descricao,anu_morada,anu_email,anu_estado,anu_telefone,anu_codigopostal,anu_disponibilidade,anu_wcprivativo,anu_mobilada,anu_utensilios,anu_internet,anu_rapazes,anu_raparigas,anu_despesas,anu_animais,anu_latitude,anu_longitude,anu_data,anu_preco) values (:pr,:ti,:de,:mo,:em,:es,:te,:co,:di,.wc,:mob,:ut,:in,:rap,:ra,:des,:ani,:la,:lo,:da,:pre);");
    if(!$STH->execute($anuncio->to_array_sem_id()))return false;
    return true;
  }

    //Edita anuncio
    function editar_anuncio(Anuncio $anuncio){
    global $mybd;
		$STH = $mybd->DBH->prepare("Update utilizador Set anu_titulo=:ti,anu_descricao=:de,anu_morada=:mo,anu_email,anu_estado=:es,anu_telefone=:te,anu_codigopostal=:co,anu_wcprivativo=:wc,anu_mobilada=:mob,anu_utensilios=:ut,anu_internet=:in,anu_rapazes=:rap,anu_raparigas=:ra,anu_despesas=:des,anu_animais=:ani,anu_latitude=:la,anu_longitude=:lo,anu_preco=:pre Where anu_id=:an");
		if(!$STH->execute($anuncio->to_array_com_id()))return false;
    return true;
  }
  //Altera o disponibilidade de um Anuncio
  function alterar_disponibilidade($id_anuncio,$disponibilidade){
    global $mybd;
    $STH = $mybd->DBH->prepare("Update anuncio Set anu_disponibilidade=? WHERE anu_id=?");
    $STH->bindParam(1, $id_anuncio);
    $STH->bindParam(2, $disponibilidade);
    if(!$STH->execute())return false;
    return true;
  }


  //Altera o estado de um Anuncio
  function alterar_estado($id_anuncio,$estado){
    global $mybd;
    $STH = $mybd->DBH->prepare("Update anuncio Set anu_estado=? WHERE anu_id=?");
    $STH->bindParam(1, $id_anuncio);
    $STH->bindParam(2, $estado);
    if(!$STH->execute())return false;
    return true;
  }

  //Lista anuncios de anunciante
  function listar_anuncios_anunciante($id_anunciante,$string){
    $arrayAnuncios=[];
    global $mybd;
    //Devolve todos gestores ativos
    $STH = $mybd->DBH->prepare("Select  uti_id,anu_titulo,anu_descricao,anu_morada,anu_email,anu_estado,anu_telefone,anu_codigopostal,anu_disponibilidade,anu_wcprivativo,anu_mobilada,anu_utensilios,anu_internet,anu_rapazes,anu_raparigas,anu_despesas,anu_animais,anu_latitude,anu_longitude,anu_data,anu_preco from anuncio  where uti_id=? Order by anu_estado;");
    $STH->bindParam(1, $id_anunciante);
      $STH->setFetchMode(PDO::FETCH_OBJ);
			while($row = $STH->fetch()){
				$arrayAnuncios[$arrayAnuncios.length]=new Anuncio($row->anu_id,$row->anu_titulo,$row->anu_descricao,$row->uti_id,$row->anu_morada,$row->anu_telefone,$row->anu_email,$row->anu_codigopostal,$row->anu_data,$row->anu_disponibilidade,$row->anu_estado,$row->anu_preco,null,$row->anu_wcprivativo,$row->anu_mobilada,$row->anu_utensilios,$row->anu_internet,$row->anu_raparigas,$row->anu_rapazes,$row->anu_despesas,$row->anu_animais,$row->anu_latitude,$row->anu_longitude);
			}
    return $arrayAnuncios;
  }

//lista todos os anuncios
  function listar_anuncios($opcao){
    $arrayAnuncios=[];
    global $mybd;
    //Devolve todos gestores ativos
    $STH = $mybd->DBH->prepare("Select  uti_id,anu_titulo,anu_descricao,anu_morada,anu_email,anu_estado,anu_telefone,anu_codigopostal,anu_disponibilidade,anu_wcprivativo,anu_mobilada,anu_utensilios,anu_internet,anu_rapazes,anu_raparigas,anu_despesas,anu_animais,anu_latitude,anu_longitude,anu_data,anu_preco from anuncio  ? ;");
    $STH->bindParam(1, $opcao);
    $STH->setFetchMode(PDO::FETCH_OBJ);
			while($row = $STH->fetch()){
        $arrayAnuncios[$arrayAnuncios.length]=new Anuncio($row->anu_id,$row->anu_titulo,$row->anu_descricao,$row->uti_id,$row->anu_morada,$row->anu_telefone,$row->anu_email,$row->anu_codigopostal,$row->anu_data,$row->anu_disponibilidade,$row->anu_estado,$row->anu_preco,null,$row->anu_wcprivativo,$row->anu_mobilada,$row->anu_utensilios,$row->anu_internet,$row->anu_raparigas,$row->anu_rapazes,$row->anu_despesas,$row->anu_animais,$row->anu_latitude,$row->anu_longitude);
			}
    return $arrayAnuncios;
  }

}
 ?>
