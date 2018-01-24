<?php
class DAOFoto{

  //Insere um foto na base de dados
  function inserir_anuncio(Foto $foto){
    global $mybd;
      $STH=$mybd->DBH->prepare("Insert into foto (anu_id,fot_caminho,fot_nome) values (:a,:c,:n);");
    if(!$STH->execute($foto->to_array_sem_id()))return false;
    return true;
  }

    //Edita anuncio
    function editar_fotos_anuncio($idFoto){
    global $mybd;
		$STH = $mybd->DBH->prepare("Update foto Set anu_id=:a,fot_caminho=:c,fot_nome=:n Where fot_id=?");
    $STH->bindParam(1, $idFoto);
    if(!$STH->execute($anuncio->to_array_com_id()))return false;
    return true;
  }

//remove uma foto de um anuncio
  function remover_foto($idFoto){
  global $mybd;
  $STH = $mybd->DBH->prepare("Delete from foto Where fot_id=?");
  $STH->bindParam(1, $idFoto);
  if(!$STH->execute())return false;
  return true;
  }

//lista todos as fotos de um anuncio especifico
  function listar_fotos_anuncio($idAnuncio){
    $arrayFotos=[];
    global $mybd;

    $STH = $mybd->DBH->prepare("Select fot_id,anu_id,fot_caminho,fot_nome from foto where anu_id=? ;");
    $STH->bindParam(1, $idAnuncio);
    $STH->setFetchMode(PDO::FETCH_OBJ);
			while($row = $STH->fetch()){
        $arrayFotos[sizeof($arrayFotos)]=new Foto($row->fot_id,$row->anu_id,$row->fot_caminho,$row->fot_nome);
			}
    return $arrayFotos;
  }

}
 ?>
