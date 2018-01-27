<?php
//sessao
session_start();
//carregar controladores
include("./comum/carregacontroladores.php");

//verifica se gestor está autenticado
if (isset($_SESSION["AE_id_utilizador"]) && isset($_SESSION["AE_nome_utilizador"]) && isset($_SESSION["AE_email_utilizador"]) && isset($_SESSION["AE_estado_utilizador"])){
	//Se não tiver sessao manda para pagina index.php
	if($_SESSION["AE_estado_utilizador"]!=1 )header("Location: ./index.php");
}else{
	header("Location: ./index.php");
}


//conteudo principal
ob_start();
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
	 <div class="container">
		 <a class="navbar-brand"  href="AnunciosAnunciante.html" ><p class="navtitle">AlojamentoESTGOH</p></a>
		 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			 <span class="navbar-toggler-icon"></span>
		 </button>
	 </div>
	 <div class="collapse navbar-collapse" id="navbarResponsive">
		 <ul class="navbar-nav ml-auto">
			 <li class="nav-item dropdown">
				 <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" color="#f8f9fa" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					 <i class="fa fa-fw fa-bell"></i>
					 <span class="d-lg-none">Notificações
						 <span class="badge badge-pill badge-warning">6 New</span>
					 </span>
					 <span class="indicator text-warning d-none d-lg-block">
						 <i class="fa fa-fw fa-circle"></i>
					 </span>
				 </a>
				 <div class="dropdown-menu notificacoes" aria-labelledby="alertsDropdown">
					 <h6 class="dropdown-header">Novas Notificações:</h6>
					 <div class="dropdown-divider"></div>
					 <a class="dropdown-item" href="#">
						 <span class="text-danger">
							 <strong>
								 <i class="fa "></i>Anuncio reprovado</strong>
						 </span>
						 <span class="small float-right text-muted">11:21 horas</span>
						 <div class="dropdown-message small">Anuncio foi rejeitado porque a decrisão tem palavras pouco apropriadas.</div>
					 </a>
					 <div class="dropdown-divider"></div>
					 <a class="dropdown-item" href="#">
						 <span class="text-success">
							 <strong>
								 <i class="fa "></i>Anuncio aprovado</strong>
						 </span>
						 <span class="small float-right text-muted">11:21 horas</span>
						 <div class="dropdown-message small">O seu anuncio foi aprovado, este já se encontra disponivel!</div>
					 </a>
					 <div class="dropdown-divider"></div>
					 <a class="dropdown-item" href="#">
						 <span class="text-danger">
							 <strong>
								 <i class="fa "></i>Anuncio reprovado</strong>
						 </span>
						 <span class="small float-right text-muted">11:21 horas</span>
						 <div class="dropdown-message small">Anuncio foi rejeitado porque a decrisão tem palavras pouco apropriadas.</div>
					 </a>
					 <div class="dropdown-divider"></div>
					 <a class="dropdown-item" href="#">
						 <span class="text-success">
							 <strong>
								 <i class="fa "></i>Anuncio aprovado</strong>
						 </span>
						 <span class="small float-right text-muted">11:21 horas</span>
						 <div class="dropdown-message small">O seu anuncio foi aprovado, este já se encontra disponivel!</div>
					 </a>
					 <div class="dropdown-divider"></div>
					 <a class="dropdown-item" href="#">
						 <span class="text-success">
							 <strong>
								 <i class="fa "></i>Anuncio aprovado</strong>
						 </span>
						 <span class="small float-right text-muted">11:21 horas</span>
						 <div class="dropdown-message small">O seu anuncio foi aprovado, este já se encontra disponivel!</div>
					 </a>
				 </div>
			 </li>
			 <li class="nav-item dropdown">
				 <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					 <i class="fa fa-user" aria-hidden="true"></i>
					 <span class="d-lg-none">Meus Dados
						 <span class="badge badge-pill badge-warning">6 New</span>
					 </span>
				 </a>
				 <div class="dropdown-menu notificacoes2" aria-labelledby="alertsDropdown">
					 <h6 class="dropdown-header">Meus Dados:</h6>
					 <div class="dropdown-divider"></div>
					 <a class="dropdown-item" href="#">
						<strong> Nome</strong>
						 <div class="dropdown-message small">António Joaquim</div>
					 </a>
					 <div class="dropdown-divider"></div>
					 <a class="dropdown-item" href="#">
						<strong> Email</strong>
						 <div class="dropdown-message small">antoniojoaquim@gmail.com</div>
					 </a>
					 <div class="dropdown-divider"></div>
						 <a class="dropdown-item" href="#">
									<strong>
										<button type="button" class="nav-link especialBotao"  data-toggle="modal" data-target="#myModalPassword"><font  size="4" color="black">Alterar Dados</font></button>
									</strong>
							</a>
				 </div>
			 </li>
			 <li class="nav-item">
				 <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
					 <i class="fa fa-fw fa-sign-out"></i>Terminar Sessão</a>
			 </li>
		 </ul>
	 </div>
 </nav>
<!-- ./Nav -->

<!-- Page Content -->
<div id="fadanun" class="container">
	<div class="row">

		<div class="col-lg-3 mesquerda">
			<h1 class="my-4"> </h1>
			<div class="list-group">
				<a href="./AnunciosAnunciante.html" class="list-group-item">Meus Anúncios</a>
				<a href="#" class="list-group-item active">Adicionar Anúncio</a>
			</div>
		</div>
		<!-- /.col-lg-3 -->

		<div class="col-lg-9">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bandeira">
							<a href="#">
									<img  src="bandeiras/pt.jpg" alt="">
							</a>
							<a href="#">
								<img src="bandeiras/UK.jpg" alt="">
							</a>
						</div>
					</div>
				</div>
			 <div class="=row">
				 <div class="addanuncio col-12">
					 <form id="signup" onsubmit="return Mudarestado('aceite')">
							 <div class="header">
									 <h3 class="baixo">Inserir/Editar Anúncio</h3>
									 <p>Preencha o formulário</p>
							 </div>
							 <div class="sep"></div>
							 <p class="aviso">* Obrigatório</p>
							 <div class="inputs">
									 <div class="sep"></div>
									 <div class="header">
											 <p class="bold">Proprietário:</p>
									 </div>
									 <div class="row">
										 <div class="col-lg-6">
											 <input type="PrimeiroNome" placeholder="Primeiro Nome*" required autofocus/>
										 </div>
										 <div class="col-lg-6">
											 <input type="UltimoNome" placeholder="Último Nome*" required/>
										 </div>
									 </div>
									 <div class="row">
										 <div class="col-lg-6">
											 <input type="email" placeholder="E-mail" required/>
										 </div>
										 <div class="col-lg-6">
											<input type="telefone" placeholder="Telefone*" required/>
										 </div>
									 </div>
									 <div class="row">
										 <div class="col-lg-6">
											 <input type="morada" placeholder="Morada*" required/>
										 </div>
										 <div class="col-lg-6">
											 <input type="postal" placeholder="Código Postal*" required/>
											 <input type="postal2" placeholder="" required/>
										 </div>
									 </div>
									 <div class="sep"></div>
									 <div class="header">
											 <p class="bold">Anúncio:</p>
									 </div>
									 <div class="row">
										 <div class="col-lg-12">
											 <input type="morada" placeholder="Título do anúncio*" required/>
										 </div>
									 </div>
									 <div class="row">
										 <div class="col-lg-12">
											 <textarea name="comment" form="signup" placeholder="  Descrição*" rows="3" required></textarea>
										 </div>
									 </div>
									 <div class="sep"></div>
									 <div class="header">
											 <p class="bold">Especificações do Quarto:</p>
									 </div>
									 <div class="sublinha">
										 <div class="row">
											 <div class="col-4">
												 <p class="especific">Casa de Banho Privativa:
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
													 <input type="radio" name="Banho" checked>Sim
												 </label>
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
														 <input type="radio" name="Banho">Não
												 </label>
											 </div>
										 </div>
									 </div>
									 <div class="sublinha">
										 <div class="row">
											 <div class="col-4">
												 <p class="especific">Internet:
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
													 <input type="radio" name="Internet" checked>Sim
												 </label>
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
														 <input type="radio" name="Internet">Não
												 </label>
											 </div>
										 </div>
									 </div>
									 <div class="sublinha">
										 <div class="row">
											 <div class="col-4">
												 <p class="especific">Despesas Incluídas:
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
													 <input type="radio" name="Renda" checked>Sim
												 </label>
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
														 <input type="radio" name="Renda">Não
												 </label>
											 </div>
										 </div>
									 </div>
									 <div class="sublinha">
										 <div class="row">
											 <div class="col-4">
												 <p class="especific">Mobília:
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
													 <input type="radio" name="Mobília" checked>Sim
												 </label>
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
														 <input type="radio" name="Mobília">Não
												 </label>
											 </div>
										 </div>
									 </div>
									 <div class="sublinha">
										 <div class="row">
											 <div class="col-4">
												 <p class="especific">Utensílios:
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
													 <input type="radio" name="Utensílios" checked>Sim
												 </label>
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
														 <input type="radio" name="Utensílios">Não
												 </label>
											 </div>
										 </div>
									 </div>
									 <div class="sublinha">
										 <div class="row">
											 <div class="col-4">
												 <p class="especific">Animais:
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
													 <input type="radio" name="Animais" checked>Sim
												 </label>
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
														 <input type="radio" name="Animais">Não
												 </label>
											 </div>
										 </div>
									 </div>
									 <div class="sublinha">
										 <div class="row">
											 <div class="col-4">
												 <p class="especific">Sexo Permitido:
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
													 <input type="checkbox" name="Animais" checked>Rapaz
												 </label>
											 </div>
											 <div class="col-4">
												 <label class="radio-inline">
														 <input type="checkbox" name="Animais">Rapariga
												 </label>
											 </div>
										 </div>
									 </div>
									 <div class="header">
											 <p class="bold">Imagens do Quarto:</p>
											 <p class="tinyy">Colocar pelo menos 3 imagens.</p>
									 </div>
									 <div class="col-lg-12">
										 <div class="row abaixu">
												 <div class="col-3">
													 <input type="file" name="arquivo" id="arquivo1" class="arquivo">
												 </div>
												 <div class="col-3">
													 <input type="text" name="file" id="file" class="file" placeholder="Arquivo" readonly="readonly">
												 </div>
												 <div class="col-3">
													 <input type="button" class="btn btnx" value="SELECIONAR">
												 </div>
										 </div>
										 <div class="row abaixu">
												 <div class="col-3">
													 <input type="file" name="arquivo" id="arquivo2" class="arquivo">
												 </div>
												 <div class="col-3">
													 <input type="text" name="file" id="file2" class="file" placeholder="Arquivo" readonly="readonly">
												 </div>
												 <div class="col-3">
													 <input type="button" class="btn btnx" value="SELECIONAR">
												 </div>
										 </div>
										 <div class="row abaixu">
												 <div class="col-3">
													 <input type="file" name="arquivo" id="arquivo3" class="arquivo">
												 </div>
												 <div class="col-3">
													 <input type="text" name="file" id="file3" class="file" placeholder="Arquivo" readonly="readonly">
												 </div>
												 <div class="col-3">
													 <input type="button" class="btn btnx" value="SELECIONAR">
												 </div>
										 </div>
										 <div class="row abaixu">
												 <div class="col-3">
													 <input type="file" name="arquivo" id="arquivo4" class="arquivo">
												 </div>
												 <div class="col-3">
													 <input type="text" name="file" id="file4" class="file" placeholder="Arquivo" readonly="readonly">
												 </div>
												 <div class="col-3">
													 <input type="button" class="btn btnx" value="SELECIONAR">
												 </div>
										 </div>
										 <div class="row abaixu">
												 <div class="col-3">
													 <input type="file" name="arquivo" id="arquivo5" class="arquivo">
												 </div>
												 <div class="col-3">
													 <input type="text" name="file" id="file5" class="file" placeholder="Arquivo" readonly="readonly">
												 </div>
												 <div class="col-3">
													 <input type="button" class="btn btnx" value="SELECIONAR">
												 </div>
										 </div>
										 <div class="row abaixu">
												 <div class="col-3">
													 <input type="file" name="arquivo" id="arquivo6" class="arquivo">
												 </div>
												 <div class="col-3">
													 <input type="text" name="file" id="file6" class="file" placeholder="Arquivo" readonly="readonly">
												 </div>
												 <div class="col-3">
													 <input type="button" class="btn btnx" value="SELECIONAR">
												 </div>
										 </div>
										 <div class="row abaixu">
											 <div class="row col-12">
												 <div class="col-12">
													 <div class="header">
															 <p class="bold">Localização da Casa:</p>
													 </div>
												 </div>
											 </div>
											 <div class="row col-12">
												 <div class="col-lg-12">
													 <div class="centro">
														 <div id="map">
														 </div>
													 </div>
												 </div>
											 </div>
											 <script>
												 var previousMarker=null;
												 function myMap() {
													 var mapOptions = {
															 center: new google.maps.LatLng(40.36021451843771,-7.862434387207031),
															 zoom: 17,
															 mapTypeId: google.maps.MapTypeId.HYBRID
													 }
													 var map = new google.maps.Map(document.getElementById("map"), mapOptions);
													 map.addListener("click", function(event) {
														 if (previousMarker != null)
															 previousMarker.setMap(null);
														 previousMarker = new google.maps.Marker({
																	 position: new google.maps.LatLng(event.latLng.lat(),event.latLng.lng()),
																	 map: map
														 });
													 });
												 }
											 </script>
											 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUym-eQ2fwfbNuGmGYa2HJacaW5zRciLo&callback=myMap"></script>
										 </div>
									 </div>
									 <div id="aceite" style="display:none;">
										 <div class="row">
											 <div class="col-12">
													 <p> O seu anúncio foi submetido com sucesso! </p>
											 </div>
										 </div>
									 </div>
									 <div class="botaoaddanuncio col-12">
										 <input id="submit" type="submit" value="Adicionar Anúncio"></input>
									 </div>
							 </div>
					 </form>
				 </div>
			 </div>
		 </div><!-- /.container -->
		</div>
		<!-- /.col-lg-9 -->

<?php
  $conteudo_principal = ob_get_contents();
	$rodape=true;
  ob_end_clean();
  //master page
  include($layout);
?>
