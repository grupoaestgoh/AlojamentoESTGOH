<?php
		//sessao
		session_start();

		//carregar controladores
		include("./comum/carregacontroladores.php");
		$dao_utilizador=new DAOUtilizadores();

		//conteudo principal
		ob_start();
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
 <div class="container">
   <a class="navbar-brand"  href="AnunciosGestor.html" ><font  size="6" color="white">AlojamentoESTGOH</font></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
 </div>
 <div class="collapse navbar-collapse" id="navbarResponsive">
   <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
       <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
         <i class="fa fa-fw fa-wrench"></i>
         <span class="nav-link-text">Meus Anúncios</span>
       </a>
       <ul class="sidenav-second-level collapse" id="collapseComponents">
         <li>
           <a href="InserirAnuncios.html">Inserir Anúncio</a>
         </li>
         <li>
           <a href="AnunciosGestor.html">Ver Meus Anúncios</a>
         </li>
       </ul>
     </li>
     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
       <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
         <i class="fa fa-fw fa-file"></i>
         <span class="nav-link-text">Anúncios dos proprietários</span>
       </a>
       <ul class="sidenav-second-level collapse" id="collapseExamplePages">
         <li>
           <a href="AnunciosNovosPendentes.html">Anúncios novos pendentes</a>
         </li>
         <li>
           <a href="AnunciosEditadosPendentes.html">Anúncios editados pendentes</a>
         </li>
         <li>
           <a href="AnunciosProprietarios.html">Ver Anúncios dos proprietários</a>
         </li>
       </ul>
     </li>
     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
       <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
         <i class="fa fa-fw fa-sitemap"></i>
         <span class="nav-link-text">Utilizadores</span>
       </a>
       <ul class="sidenav-second-level collapse" id="collapseMulti">
         <li>
           <a href="registoGestor.html">Registar gestor</a>
         </li>
         <li>
           <a href="desativaProprietario.html">Desativar proprietário</a>
         </li>
         <li>
           <a href="desativaGestor.html">Desativar gestor</a>
         </li>
       </ul>
     </li>
     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
       <a class="nav-link "  href="AnunciosDenunciados.html" >
         <i class="fa fa-fw fa-file"></i>
         <span >Anúncios denunciados</span>
       </a>
     </li>
   </ul>
   <ul class="navbar-nav sidenav-toggler">
     <li class="nav-item">
       <a class="nav-link text-center" id="sidenavToggler">
         <i class="fa fa-fw fa-angle-left"></i>
       </a>
     </li>
   </ul>
   <ul class="navbar-nav ml-auto">

     <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
           <span class="text-success">
             <strong>
               <i class="fa"></i>Tem anuncio para aprovação</strong>
           </span>
           <span class="small float-right text-muted">11:21 horas</span>
           <div class="dropdown-message small">Tem anuncio editado para aprovar.</div>
         </a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="#">
           <span class="text-warning">
             <strong>
               <i class="fa"></i>Tem pedido de desativação</strong>
           </span>
           <span class="small float-right text-muted">11:21 horas</span>
           <div class="dropdown-message small">O utilizador Manuel pediu para desativar a conta.</div>
         </a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="#">
           <span class="text-success">
             <strong>
               <i class="fa"></i>Tem anuncio para aprovação</strong>
           </span>
           <span class="small float-right text-muted">11:21 horas</span>
           <div class="dropdown-message small">Tem anuncio editado para aprovar.</div>
         </a>
         <div class="dropdown-divider"></div>

         <a class="dropdown-item" href="#">
           <span class="text-success">
             <strong>
               <i class="fa"></i>Tem anuncio para aprovação</strong>
           </span>
           <span class="small float-right text-muted">11:21 horas</span>
           <div class="dropdown-message small">Tem anuncio editado para aprovar.</div>
         </a>
         <div class="dropdown-divider"></div>

         <a class="dropdown-item" href="#">
           <span class="text-warning">
             <strong>
               <i class="fa"></i>Tem pedido de desativação</strong>
           </span>
           <span class="small float-right text-muted">11:21 horas</span>
           <div class="dropdown-message small">O utilizador Manuel pediu para desativar a conta.</div>
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
       <div class="dropdown-menu " aria-labelledby="alertsDropdown">
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
             <i class="fa"></i>
             <button type="button" class="nav-link especialBotao"  data-toggle="modal" data-target="#myModal20"><font  size="4" color="black">Alterar Dados</font></button>
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

<div id="myModal20" class="modal fade" role="dialog">
  <!-- Modal ELiminar -->
  <div class="modal fade" id="myModalDesativar" role="dialog">
    <div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Desactivar Conta</h4>
    </div>
    <div class="modal-body aumenta">
      <p>Tem a certeza que quer desativar a conta?</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Desativar</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
    </div>
  </div>
</div>
</div>
<!-- Fim ELiminar -->

<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Alterar Password</h4>
      </div>
      <div class="modal-body">
        <form action="#">
          <br>
            <label><b>Password nova:</b></label><br>
            <input class="form-control" type="email" placeholder="Password" name="eml" data-toggle="tooltip" title="Se quer alterar o email insira um novo e edite!Caso contrario deixe o inicial!">
            <br>
            <label><b>Repetir Password Nova:</b></label><br>
            <input class="form-control" type="password" placeholder="Repetir password" name="psw" data-toggle="tooltip" title="Se quer alterar a password insira uma nova e edite!">
            <br>
            <div id="Aviso1" class="alert alert-success" role="alert" style="display:none;" >
                <div class="row leftCaracteris">
                <div class="col-lg-2 ">
                <img class="alertaImg" src="img/certo.png" alt="">
                </div>
                <div class="col-lg-8">
                  <span class="glyphicon glyphicon-alert">Alterada com sucesso!</span>
                </div>
              </div>
            </div>
            <div class="row" style="text-align:center;">
            <div class="col-12">
            <button class="btn btn-primary navbar-btn" onclick="Mudarestado('Aviso1')" type="submit" >Editar</button>
            </div>
           </div>
                    </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-6">
              <button type="button" class=" btn btn-danger"  data-toggle="modal" data-target="#myModalDesativar"><font  size="3" color="white">Desativar Conta</font></button>
          </div>
          <div class="col-6">
            <button type="button" class="btn btn-default corPreta" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Page Content -->
  <div class="row">
    <div id="imgbandeira">
      <div class="col-12">
        <div class="bandeira">
          <a href="?lingua=pt">
              <img  src="img/img_aplicacao/pt.jpg" alt="">
          </a>
          <a href="?lingua=en">
            <img src="img/img_aplicacao/UK.jpg" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
    </div>
    <div class="col-lg-5">
      <div class="container">
        <div class="linhaflex">
           <div class="titulo">
            <?php print $registogestor; ?>
           </div>
           <hr>
           <form class="my-5" action="#">
           <label class="corPreta"><b><?php print $nome; ?></b></label><br>
           <input class="form-control" type="text" placeholder="Nome" name="nme" required><br>
           <label class="corPreta" ><b><?php print $emailR; ?>:</b></label><br>
           <div class="form-group input-group">
             <input type="email" placeholder="E-mail" class="form-control" id="inlineFormInputGroup" required>
             <div class="input-group-addon" ><img class="certo" src="./img/img_aplicacao/certo.png" alt=""></div>
           </div>
           <label class="corPreta"><b><?php print $password; ?></b></label><br>
           <input class="form-control" type="password" placeholder="Password" name="psw" required><br>
           <div id="Aviso2" class="alert alert-success" role="alert" style="display:none;" >
               <div class="row leftCaracteris">
               <div class="col-lg-2 ">
               <img class="alertaImg" src="./img/img_aplicacao/certo.png" alt="">
               </div>
               <div class="col-lg-8">
                 <span class="glyphicon glyphicon-alert"><?php print $alteradaSucesso; ?></span>
               </div>
             </div>
           </div>
           <button class="btn btn-primary navbar-btn" onclick="Mudarestado('Aviso2')" type="submit" ><?php print $registar; ?></button>
          </form>
   </div>
   </div>
 </div>
 <div class="col-3"></div>
 </div>
</div>

<?php
  $conteudo_principal = ob_get_contents();
	$rodape=true;
  ob_end_clean();
  //master page
  include($layout);
?>
