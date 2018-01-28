<?php
class DAOAnuncios{
/*
Estado
1-ativo
2-pendente
3-editado
4-inativo

Disponibilidade
1-Disponivel
2-Indisponivél
*/


  //Insere um anuncio na base de dados
  function inserir_anuncio(Anuncio $anuncio){
    global $mybd;
      $STH=$mybd->DBH->prepare("Insert into anuncio (uti_id,anu_titulo,anu_descricao,anu_morada,anu_email,anu_estado,anu_telefone,anu_codigopostal,anu_disponibilidade,anu_wcprivativo,anu_mobilada,anu_utensilios,anu_internet,anu_rapazes,anu_raparigas,anu_despesas,anu_animais,anu_latitude,anu_longitude,anu_data,anu_preco) values (:pr,:ti,:de,:mo,:em,:es,:te,:co,:di,.wc,:mob,:ut,:in,:rap,:ra,:des,:ani,:la,:lo,:da,:pre);");
    if(!$STH->execute($anuncio->to_array_sem_id()))return false;
    return true;
  }

    //Edita anuncio edita tudo excepto a data e o id do anuncio1
    function editar_anuncio(Anuncio $anuncioEdita){
    global $mybd;
		$STH = $mybd->DBH->prepare("Update anuncio Set uti_id=:pr,anu_titulo=:ti,anu_descricao=:de,anu_morada=:mo,anu_email=:em,anu_estado=:es,anu_telefone=:te,anu_codigopostal=:co,anu_disponibilidade=:di,anu_wcprivativo=:wc,anu_mobilada=:mob,anu_utensilios=:ut,anu_internet=:in,anu_rapazes=:rap,anu_raparigas=:ra,anu_despesas=:des,anu_animais=:ani,anu_latitude=:la,anu_longitude=:lo,anu_data=:da,anu_preco=:pre Where anu_id=:an;");
		if(!$STH->execute($anuncioEdita->to_array_com_id()))return false;
    return true;
  }
//Lista anuncios de anunciante ATIVOS e PENDENTES e ordena por estado, fazendo os ativos aparecerem primeiro e os pendentes depois
  function listar_anuncios_anunciante($id_anunciante,$estado_anuncio){
    $arrayAnuncios=[];
    global $mybd;
    if($id_anunciante==-1){
       $STH = $mybd->DBH->prepare("Select anu_id,uti_id,anu_titulo,anu_descricao,anu_morada,anu_email,anu_estado,anu_telefone,anu_codigopostal,anu_disponibilidade,anu_wcprivativo,anu_mobilada,anu_utensilios,anu_internet,anu_rapazes,anu_raparigas,anu_despesas,anu_animais,anu_latitude,anu_longitude,anu_data,anu_preco from anuncio where anu_estado=?;");
$STH->bindParam(1, $estado_anuncio);
    }else{ $STH = $mybd->DBH->prepare("Select anu_id,uti_id,anu_titulo,anu_descricao,anu_morada,anu_email,anu_estado,anu_telefone,anu_codigopostal,anu_disponibilidade,anu_wcprivativo,anu_mobilada,anu_utensilios,anu_internet,anu_rapazes,anu_raparigas,anu_despesas,anu_animais,anu_latitude,anu_longitude,anu_data,anu_preco from anuncio where uti_id=? and anu_estado=?;");
    $STH->bindParam(1, $id_anunciante);
    $STH->bindParam(2, $estado_anuncio);
  }
    $STH->execute();
      $STH->setFetchMode(PDO::FETCH_OBJ);
      $i=0;
			while($row = $STH->fetch()){
				$arrayAnuncios[$i]=new Anuncio($row->anu_id,$row->anu_titulo,$row->anu_descricao,$row->uti_id,$row->anu_morada,$row->anu_telefone,$row->anu_email,$row->anu_codigopostal,$row->anu_data,$row->anu_disponibilidade,$row->anu_estado,$row->anu_preco,null,$row->anu_wcprivativo,$row->anu_mobilada,$row->anu_utensilios,$row->anu_internet,$row->anu_raparigas,$row->anu_rapazes,$row->anu_despesas,$row->anu_animais,$row->anu_latitude,$row->anu_longitude);
        $i++;
      }
    return $arrayAnuncios;
  }

  //busca anuncio por id
    function obter_anuncio($id_anuncio){
      global $mybd;
      $STH = $mybd->DBH->prepare("Select anu_id,uti_id,anu_titulo,anu_descricao,anu_morada,anu_email,anu_estado,anu_telefone,anu_codigopostal,anu_disponibilidade,anu_wcprivativo,anu_mobilada,anu_utensilios,anu_internet,anu_rapazes,anu_raparigas,anu_despesas,anu_animais,anu_latitude,anu_longitude,anu_data,anu_preco from anuncio where anu_id=?;");
      $STH->bindParam(1, $id_anuncio);
      $STH->execute();
      $STH->setFetchMode(PDO::FETCH_OBJ);
      while($row = $STH->fetch()){
        return new Anuncio($row->anu_id,$row->anu_titulo,$row->anu_descricao,$row->uti_id,$row->anu_morada,$row->anu_telefone,$row->anu_email,$row->anu_codigopostal,$row->anu_data,$row->anu_disponibilidade,$row->anu_estado,$row->anu_preco,null,$row->anu_wcprivativo,$row->anu_mobilada,$row->anu_utensilios,$row->anu_internet,$row->anu_raparigas,$row->anu_rapazes,$row->anu_despesas,$row->anu_animais,$row->anu_latitude,$row->anu_longitude);
      }
    }

//lista todos os anuncios
  function listar_anuncios($opcao){
    $arrayAnuncios=[];
    global $mybd;
    $STH = $mybd->DBH->prepare("Select anu_id,uti_id,anu_titulo,anu_descricao,anu_morada,anu_email,anu_estado,anu_telefone,anu_codigopostal,anu_disponibilidade,anu_wcprivativo,anu_mobilada,anu_utensilios,anu_internet,anu_rapazes,anu_raparigas,anu_despesas,anu_animais,anu_latitude,anu_longitude,anu_data,anu_preco from anuncio;");
    $STH->bindParam(1, $opcao);
    $STH->execute();
    $STH->setFetchMode(PDO::FETCH_OBJ);
    $i=0;
			while($row = $STH->fetch()){
        $arrayAnuncios[$i]=new Anuncio($row->anu_id,$row->anu_titulo,$row->anu_descricao,$row->uti_id,$row->anu_morada,$row->anu_telefone,$row->anu_email,$row->anu_codigopostal,$row->anu_data,$row->anu_disponibilidade,$row->anu_estado,$row->anu_preco,null,$row->anu_wcprivativo,$row->anu_mobilada,$row->anu_utensilios,$row->anu_internet,$row->anu_raparigas,$row->anu_rapazes,$row->anu_despesas,$row->anu_animais,$row->anu_latitude,$row->anu_longitude);
        $i++;
      }
    return $arrayAnuncios;
  }

//pesquisa todos os anuncios
  function pesquisar_anuncios($opcao,$chave){
    $arrayAnuncios=[];
    global $mybd;
    $STH = $mybd->DBH->prepare("Select anu_id,uti_id,anu_titulo,anu_descricao,anu_morada,anu_email,anu_estado,anu_telefone,anu_codigopostal,anu_disponibilidade,anu_wcprivativo,anu_mobilada,anu_utensilios,anu_internet,anu_rapazes,anu_raparigas,anu_despesas,anu_animais,anu_latitude,anu_longitude,anu_data,anu_preco from anuncio WHERE (anu_titulo LIKE '%$chave%' OR anu_morada LIKE '%$chave%');");
    $STH->bindParam(1, $opcao);
    $STH->execute();
    $STH->setFetchMode(PDO::FETCH_OBJ);
    $i=0;

    while($row = $STH->fetch()){
  		$arrayAnuncios[$i]=new Anuncio($row->anu_id,$row->anu_titulo,$row->anu_descricao,$row->uti_id,$row->anu_morada,$row->anu_telefone,$row->anu_email,$row->anu_codigopostal,$row->anu_data,$row->anu_disponibilidade,$row->anu_estado,$row->anu_preco,null,$row->anu_wcprivativo,$row->anu_mobilada,$row->anu_utensilios,$row->anu_internet,$row->anu_raparigas,$row->anu_rapazes,$row->anu_despesas,$row->anu_animais,$row->anu_latitude,$row->anu_longitude);
        $i++;
  	}
    return $arrayAnuncios;
  }
  
}
 ?>
