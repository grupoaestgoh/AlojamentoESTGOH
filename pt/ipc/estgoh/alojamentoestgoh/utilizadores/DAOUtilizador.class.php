<?php
class DAOUtilizadores{
  /*
  0-adimistrador
  1-gestor
  2-anunciantes
  3-estudante

  Estado
  1-ativo
  2-pendente
  3-desativacao
  4-inativo
  */

  //Insere um utilizador na base de dados, se falhar devolve false, se tiver sucesso devolve true
  function inserir_utilizador(Utilizador $utilizador){
    global $mybd;
      $STH=$mybd->DBH->prepare("Insert into utilizador (uti_nome,uti_email,uti_password,uti_estado,uti_tipo,uti_inscricao) values (:n,:e,:p,0,:t,:d);");
    if(!$STH->execute($utilizador->to_array_sem_id()))return false;
    return true;
  }

  //Obtem um Utilizador através do seu e-mail e password, a password vem já encriptada!
  function obter_utilizador($email,$password){//nao se vai utilizar a password aqui porque nao funciona no mysql!
    global $mybd;
    $STH=$mybd->DBH->prepare("Select uti_id,uti_nome,uti_email,uti_password,uti_estado,uti_tipo,uti_inscricao from utilizador where uti_email=?;");
    $STH->bindParam(1,$email);
    $STH->execute();
    $STH->setFetchMode(PDO::FETCH_OBJ);
    while($row = $STH->fetch()){
      if($row->uti_tipo==2)return new Anunciante($row->uti_id,$row->uti_nome,$row->uti_email,$row->uti_password,$row->uti_estado,$row->uti_tipo,$row->uti_inscricao,$row->uti_estado);
      if($row->uti_tipo==1)return new Estudante($row->uti_id,$row->uti_nome,$row->uti_email,$row->uti_password,$row->uti_estado,$row->uti_tipo,$row->uti_inscricao);
      if($row->uti_tipo==0)return new Gestor($row->uti_id,$row->uti_nome,$row->uti_email,$row->uti_password,$row->uti_estado,$row->uti_tipo,$row->uti_inscricao,$row->uti_estado);
    }

    return null;
  }

  //Obtem um Utilizador através do seu id
  function obter_utilizador_id($id_utilizador){
    global $mybd;
    			$STH = $mybd->DBH->prepare("Select  uti_id,uti_nome,uti_email,uti_password,uti_estado,uti_tipo,uti_inscricao from utilizador  where uti_id=? ;");
    			$STH->bindParam(1, $id_utilizador);
    			$STH->execute();
    			$STH->setFetchMode(PDO::FETCH_OBJ);
    			while($row = $STH->fetch()){
            return new Utilizador($row->uti_id,$row->uti_nome,$row->uti_email,$row->uti_password,$row->uti_estado,$row->uti_tipo,$row->uti_inscricao);
    			}
    			return null;
  }

  //Edita os dados (password) de um utilizador existente na base de dados
  function editar_utilizador(Utilizador $utilizador){
    global $mybd;
		$STH = $mybd->DBH->prepare("Update utilizador Set uti_password=:p WHERE uti_id=:i");
		if(!$STH->execute($utilizador->to_array_com_id()))return false;
    return true;
  }

  //Altera o estado de um Utilizador do tipo Anunciante ou Gestor
  function alterar_estado($id_utilizador,$estado){
    global $mybd;
    $STH = $mybd->DBH->prepare("Update utilizador Set uti_estado=? WHERE uti_id=?");
    $STH->bindParam(1, $id_utilizador);
    $STH->bindParam(2, $estado);
    if(!$STH->execute())return false;
    return true;
  }

  //Lista contas de utilizador
  function listar_utilizadores($opcao){
    $arrayUtilizadores=[];
    global $mybd;
    //Devolve todos gestores ativos
    if($opcao==1)$STH = $mybd->DBH->prepare("Select  uti_id,uti_nome,uti_email,uti_password,uti_estado,uti_tipo,uti_inscricao from utilizador  where uti_estado='ativo' and uti_tipo='gestor' ;");
    //Devolve todos anunciantes ativos
    if($opcao==2)$STH = $mybd->DBH->prepare("Select  uti_id,uti_nome,uti_email,uti_password,uti_estado,uti_tipo,uti_inscricao from utilizador  where uti_estado='ativo' and uti_tipo='anunciante' ;");
			$STH->setFetchMode(PDO::FETCH_OBJ);
			while($row = $STH->fetch()){
				$arrayUtilizadores[sizeof($arrayUtilizadores)]=new Utilizador($row->uti_id,$row->uti_nome,$row->uti_email,$row->uti_password,$row->uti_estado,$row->uti_tipo,$row->uti_inscricao);
			}
    return $arrayUtilizadores;
  }

  //Verificar se já existe gestor/ 0-admistrador/1-gestor/2-anunciante/3-aluno
  function verificar_gestor(){
    global $mybd;
    $STH=$mybd->DBH->prepare("Select uti_email from utilizador where uti_tipo=0;");
    $STH->execute();
    $STH->setFetchMode(PDO::FETCH_OBJ);
    while($row = $STH->fetch()){
      return true;
    }
      return false;
  }

//Verificar se já existe algum utilizador com esse email
  function verificar_email($email){
    global $mybd;
    $STH=$mybd->DBH->prepare("Select uti_email from utilizador where uti_email=?;");
    $STH->bindParam(1,$email);
    $STH->execute();
    $STH->setFetchMode(PDO::FETCH_OBJ);
    while($row = $STH->fetch()){
    	return true;
    }
    	return false;
  }
}
 ?>
