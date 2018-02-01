<?php

//LOCAL VOU FAZER O UPLOAD DAS FOTOS DOS ANUNCIOS
  $Caminho = 'C:\ServidorWeb\htdocs\AlojamentoESTGOH\pt\ipc\estgoh\alojamentoestgoh\img\img_anuncios/';
//titulos
	$titulo_pagina="AlojamentoESTGOH-PaginaInicial";

//Cabeçalho index
	$logotipo="AlojamentoESTGOH";
	$login="Login";
	$registo="Registo";

	//nav Paginas Gestor
	$MeusAnu="Meus Anuncios";
	$InsereAnu="Inserir Anúncio";
	$VerMeusAnu="Ver Meus Anúncios";
	$AnuProprietarios="Anúncios dos proprietários";
	$AnuNovosPend="Anúncios novos pendentes";
	$AnuEditPend="Anúncios editados pendentes";
	$VerAnuProprietarios="Ver Anúncios dos proprietários";
          //(descricoes das notificaçoes)
  $naoquerusar="O utilizador já não quer usar mais a aplicação!";
  $anuncioaprovado="Agora todos os alunos poderao ver o seu anuncio!";
  $anunciopendente="Anuncios esperam aprovacao!";
  $proprietariopendente="Proprietarios querem aceder ao sistema!";
  $denunciaAnu="Anuncios foram deunciados!";
  $reprovadoAnu="Edite o anuncio pois não está conforme as regras!";
        //
	$Uti="Utilizadores";
	$RegGestor="Registar gestor";
	$DesaProprietario="Desativar proprietário";
	$DesaGestor="Desativar gestor";
	$AnunDenunciados="Anuncios Denunciados";
	$Notificacao="Notificações";
	$novas="New";
	$NovasNotifica="Novas Notificações:";
	$MeusDados="Meus Dados";
	$MeusDados1="Meus Dados:";
	$terminaSessao="Terminar Sessão";
	$alteraDados="Alterar Dados";
	$alteraPass="Alterar Password";
	$PassNova="Password nova:";
	$PassNovaRepete="Repetir Password Nova:";
	$editar="Editar";
	$desativaConta="Desativar Conta";
	$Fechar="Fechar";
	$alteradaSucesso="Alterada com Sucesso!";
	$rejeitarAnu="Rejeitar Anúncio";
	$motivoRej="Motivo da rejeição:";
	$rejetadoSuce="Rejeitado com sucesso!";
	$rejeitar="Rejeitar";
	$certeza="Tem a certeza que quer desativar a conta?";
	$desativar="Desativar";
	$anu_aprovado="Anuncio Aprovado!";
	$anu_pendente="Tem anuncio pendente!" ;
	$pro_pendente="Tem proprietario pendente!";
	$den_denuncia="Denuncia de um anuncio!" ;
	$anu_reprovado="Anuncio reprovado!" ;
	$pro_desativa="Pedidos de desativacao de conta!";

//Rodape
	$estgohR="Estgoh";
	$emailR="E-mail";
	$elearningR="E-learning";
	$bibliotecaR="Biblioteca";
	$netpaR="NetPa (Portal Academico)";
	$sobreNosR="Sobre nós";
	$contactosR="Contactos";
	$direitosR="AlojamentoESTGOH 2017. Todos direitos reservados.";

//Pagina Index.php
	$registar="Registar";
	$nomeEscola="Escola Superior de Tecnologia e Gestão de Oliveira do Hospital";
	$frase1="Estas á procura de alojamento e ainda e ainda não encontrastes?";
	$frase2="Então junta te a nós e procura o teu quarto ideal ao melhor preço.";
	$email="Email";
	$password="Password";
	$credenciaisErradas="Credenciais erradas!";
	$tenteNovamente="Tente novamente.";
	$entrar="Entrar";
	$nome="Nome";
	$sucesso="Registado com sucesso!";
	$caracPassword="Password deve ter pelo menos 1 caracter Maiúsculo e um numero num total de pelo menos oito caracteres e no maximo 15 caracteres.";
	$PasswordIguais="As passwords tem de ser iguais!";
	$insucesso_password="Password deve ter pelo menos 1 caracter Maiúsculo e 1 Numero e um total de pelo menos oito caracteres e um maximo de 15 caracteres.";
	$insucesso_nome="O nome só pode ser constituido por palavras e tem um maximo de 50 characteres.";
	$insucesso_email="O email já se encontra registado e o email tem um maximo de 50 caracteres!";
	$alteradaSucessoPass="A password foi alterada com sucesso!.";
//Pagina Auncios_novos_pendentes.php
	$titulo="Titulo";
	$Preco="Preço";
	$local="Localização";
	$Anunciante="Anunciante";
	$aceitar="Aceitar";
	$anuncio="Anuncio";
	$eurosmes="euros/mês";
	$contacto="Contacto";
	$caracteristicas="Caracteristicas";
	$wc="WC privativo";
	$mobilada="Mobilada";
	$utensilios="Utensilios";
	$internet="Internet";
	$raparigas="Raparigas";
	$rapazes="Rapazes";
	$despesas="Despesa";
	$Animais="Animais";
	$Localizacao="Localização";
//pagina registo_anuncio.php (gestor)
$edita="Editar Anúncio";
$insere="Inserir Anúncio";
$formulario="Preencha o formulário";
$obrigatorio="* Obrigatório";
$proprietario="Proprietário:";
$anuncio1="Anuncio:";
$caracteristicasQ="Especificações do Quarto:";
$casabanho="Casa de banho privativa:";
$sim="Sim";
$nao="Não";
$adicionaAnu="Adicionar Anúncio";
$Remail="E-mail*";
$RTelefone="Telefone*";
$Rmorada="Morada*";
$Rcodigo="Codigo Postal*";
$Rtitulo="Titulo*";
$Rpreco="Preco*";
$Rdescricao="Descrição*";
$internet1="Internet:";
$despesas="Despesas incluídas:";
$mobilia="Mobília:";
$utensilios1="Utensílios:";
$Animais1="Animais:";
$sexoPermitido="Sexo Permitido:";
$rapaz="Rapaz";
$rapariga="Rapariga";
$fotos="Imagens do Quarto:";
$minimoimg="Colocar pelo menos 3 imagens.";
$naominimo="Se editar as fotos tera que colocar um minimo de 3 fotos, caso contrario manter se ao as antigas!";
$Localizacao1="Localização da Casa:";
$anuncioSucesso="O seu anúncio foi submetido com sucesso!";

//pagina ver_anuncios_proprietarios (gestor)
$disponibilidade="Disponibilidade";
$livre="Livre";
$ocupado="Ocupado";
$pesquisar="Pesquisar";
$naoanuncios="Não tem anúncios!";
$placeholder_pesquisa="Título ou Localidade";

//pagina registo_outros_gestores.phpinfo
$registogestor="Registo Gestor";

//Pagina Auncios_editados_pendentes.php

$AnuEdiPend="Anuncios Editados Pendentes";

//PaginaRegistoPrimeiroAdmistrador.php
$regPrimeiroges="Registo do Gestor";

//pagina ver_todos_anuncios
$alojamentosOliveira="Alojamentos em Oliveira de Hospital";
$mes="mês";
$ambos="ambos";
$exclusivo="Exclusivo para";
$precoMax="Preço máximo";
$utensiliosCoz="Utensílios de cozinha";
$limpar="Limpar";
$aplicarFiltros="Aplicar filtros";
//pagina anuncios Denunciados
  $motivo="Motivo";
 $titulo="Titulo";
 $preco="Preco";
 $localizacao="Localizacao";
 $anunciante="Anunciante";
 $naoAnuDen="Não tem anuncios denunciados.";
$EliminaSucesso="Eliminado com sucesso!";

$denunciadoSucesso="Denunciado com sucesso!";
$denuncia="Denunciar";
$den_anu="Denunciar Anúncio";
$motivoDen="Motivo da denuncia:";
//pagina ver meus anuncios
$elimanarAnu="Eliminar anuncio";
$certezaEliminaAnu="Tem  a certeza que quer eliminar o anuncio?";
$Eliminar="Eliminar";
?>
