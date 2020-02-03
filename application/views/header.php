<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="<?php echo base_url(); ?>imagenes/marino.ico" type="image/x-icon"/>
  <title>Nueva Clinica Madre e Hijo</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Bootstrap core CSS -->
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>jq-pro-master/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url(); ?>jq-pro-master/css/mdb.css" rel="stylesheet">

  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url(); ?>style/style.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>


</head>

<body class="hidden-sn white-skin">

 <!--Double navigation-->
<style>
 .sn-bg-4 { 
  background-image: url("./imagenes/fondoside.jpg"); }
</style>
 <header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4">
      <ul class="custom-scrollbar">
        <!-- Logo -->
        <li>
          <div class="logo-wrapper waves-light">
          <a href="<?= base_url()?>"><img src="<?= base_url()?>imagenes/logonhcm.jpg" class="img-fluid flex-center"></a>
          </div>
        </li>

        <!--/. Logo -->
        <!--Social-->
        
        <!--/.Search Form-->
        <!-- Side navigation links -->
        <li>
        <ul class="collapsible collapsible-accordion">
          
          <?php
          
          foreach($modulos as $mod) { 
            if($mod['MastDirecId']){
              ?>
            
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i><?php echo $mod['MastDirecDescripcion'] ?><i class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
            <ul>

            <?php
          $tp=$this->session->userdata('tipoPerfil');    
          if($tp==1 and $mod['MastDirecId']==1) { ?>
            
            <li><a href="<?php echo base_url(); ?>empresa"><i class="waves-effect"></i> Empresa<span class="badge badge-danger ml-2">SA</span></a></li> 
<?php } ?>
            


            <?php foreach($modulos_uno as $m) { 
              if($m['DirIDMasterdirecciones']){
                if($m['DirIDMasterdirecciones'] == $mod['MastDirecId']){
          ?>
                  
<li><a href="<?php echo base_url(); ?><?php echo $m['DirDireccion'] ?>"><i class="waves-effect"></i> <?php echo $m['DirDescripcion']?></a></li>
                



<?php } }}?> 
               
               
              </ul>
            </div>
          </li>
            
            <?php }?>


          <?php } ?>
        </ul>
      </li>

        <!--/. Side navigation links -->
      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    
    <nav class="navbar navbar-expand-lg  fixed-top scrolling-navbar teal accent-4">
      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars text-white"></i></a>
      </div>
      <!-- Breadcrumb-->
  
      <div class="breadcrumb-dn mr-auto text-white">
      <a  class="nav-link"> <span class="clearfix d-none d-sm-inline-block text-white">EMPRESA:   <?= $this->session->userdata('NomEmpresa'); ?></span></a>
</div>

      <ul class="nav navbar-nav nav-flex-icons ml-auto text-white">



      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user text-white"></i><?=$usuario['UsNombre']?>
        </a>
        
        <div class="dropdown-menu dropdown-menu-right dropdown-ins" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item editCuenta" data-id="<?=$u=$this->session->userdata('UsId');?>">Mi Cuenta</a>
          <a class="dropdown-item" href="<?= base_url()?>principal/logout">Cerrar Sesion</a>
        </div>
      </li>
    </ul>
    </nav>
    <!-- /.Navbar -->
  </header>
  <!--Modal: Login / Register Form-->

<!--Modal: Login / Register Form-->




<!-- Modal -->

<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg cascading-modal" role="document">
  <div class="modal-content">
   <div class="modal-c-tabs">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3 text-center" role="tablist">
          <li class="nav-item">  
          <a href="" class="white-text mx-3">FORMULARIO</a>
          </li>
        </ul>
        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
              <!--Body-->
              <div class="modal-body">
              </div>
              <!--Body-->
              <!--Footer-->
              <div class="modal-footer">
              </div>
              <!--Footer-->
          </div>
          <!--Panel 7-->
        </div>
        <!-- Tab panels -->              
      </div>
    </div>
  </div>
</div>

  <!-- Modal de Alerta mini-->
  <div class="modal fade " id="ModalMini" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header modal-header-mini">
          <h4 class="modal-title modal-title-mini" id="tituloModalMini"></h4>
        </div>
        <div class="modal-body modal-body-mini" id="contenidoModalMini">
        </div>
        
        <div class="modal-footer modal-footer-mini" id="pieModalMini">
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="ModalSM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-sm cascading-modal" role="document">
  <div class="modal-content">
   <div class="modal-c-tabs">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3 text-center" role="tablist">
          <li class="nav-item">  
          <a href="" class="white-text mx-3">CREAR USUARIO</a>
          </li>
        </ul>
        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
              <!--Body-->
              <div class="modal-body">
              </div>
              <!--Body-->
              <!--Footer-->
              <div class="modal-footer">
              </div>
              <!--Footer-->
          </div>
          <!--Panel 7-->
        </div>
        <!-- Tab panels -->              
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalLG" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg cascading-modal" role="document">
  <div class="modal-content">
   <div class="modal-c-tabs">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3 text-center" role="tablist">
          <li class="nav-item">  
          <a href="" class="white-text mx-3">CREAR USUARIO</a>
          </li>
        </ul>
        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
              <!--Body-->
              <div class="modal-body">
              </div>
              <!--Body-->
              <!--Footer-->
              <div class="modal-footer">
              </div>
              <!--Footer-->
          </div>
          <!--Panel 7-->
        </div>
        <!-- Tab panels -->              
      </div>
    </div>
  </div>
</div>


<!--Modal: modalYT-->
<div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <!--Content-->
    <div class="modal-content">

      <!--Body-->
      <div class="modal-body mb-0 p-0">
     
      
      </div>

      <!--Footer-->
    

    </div>
    <!--/.Content-->

  </div>
</div>
<!--Modal: modalYT-->

<div class="modal fade" id="ModalContacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog cascading-modal" role="document">
  <div class="modal-content">
   <div class="modal-c-tabs">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3 text-center" role="tablist">
          <li class="nav-item">  
          <a href="" class="white-text mx-3">FORMULARIO</a>
          </li>
        </ul>
        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
              <!--Body-->
              <div class="modal-body">
              <form class='form' id='formContacto' autocomplete='off'>

<input type='hidden' name='idu' value='<?= $usuario['UsId'] ?>'/>
<input type='hidden' name='idP' value='<?= $idPer ?>'/>

<div class="container">
<div class="row">
      <div class="col">
      <div class="md-form">
<input name="asunto" id="input-char-counter" type="text" maxlength="10" length="10" class="form-control" required>
<label for="input-char-counter">Asunto</label>
</div>



     </div>
</div> 
<div class="row">
      <div class="col">
      <div class="md-form">
<textarea name="mensaje" id="textarea-char-counter" class="form-control md-textarea" maxlength="120" length="120" rows="3" required></textarea>
<label for="textarea-char-counter">Ingrese texto.</label>
</div>
     </div>


</div> 
</div> 



<div class="text-right form-sm mt-4">
<hr style="color: #0056b2;" />
<button type='submit' class='btn btn-success btn-sm'>Enviar</button>
</div>


</form>




              </div>
              <!--Body-->
              <!--Footer-->
              <div class="modal-footer">
              </div>
              <!--Footer-->
          </div>
          <!--Panel 7-->
        </div>
        <!-- Tab panels -->              
      </div>
    </div>
  </div>
</div>

<main>

