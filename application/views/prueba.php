<header>
  <!-- Sidebar navigation -->
  <div id="slide-out" class="side-nav sn-bg-4">
    <ul class="custom-scrollbar">
      <!-- Logo -->
      <li>
        <div class="logo-wrapper waves-light">
          <a href="<?= base_url()?>"><img src="<?= base_url()?>imagenes/sutv.png" class="img-fluid flex-center"></a>
        </div>
      </li>
      <li>
        <ul class="collapsible collapsible-accordion">
          <?php foreach($modulos as $mod) { 
            if($mod['DirIDMasterdirecciones']){?>
            <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i><?php echo $mod['DirDescripcion'] ?><i class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
            <ul>
            <?php foreach($modulos_uno as $m) { 
              if($m['DirMenuSub']){
                if($m['DirMenuSub'] == $mod['DirIDMasterdirecciones']){
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
    </ul>
    <div class="sidenav-bg mask-strong"></div>
  </div>
  <!--/. Sidebar navigation -->
  <!-- Navbar -->
  

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark primary-color double-nav">

            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse">
                    <i class="fa fa-bars"></i>
                </a>
            </div>

            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p>Material Design for Bootstrap</p>
            </div>
    <ul class="nav navbar-nav nav-flex-icons ml-auto">

      <li class="nav-item">
        <a class="nav-link"><i class="fas fa-bolt"></i> <span class="clearfix d-none d-sm-inline-block">Contacto</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i><?=$usuario['UsNombre']?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="<?= base_url()?>principal/logout">Cerrar Sesion</a>
        </div>
      </li>
    </ul>
  </nav>
  <!--Navbar-->
<!--Navbar-->

<!--/.Navbar-->
<!--/.Navbar-->
  <!-- /.Navbar -->
</header>
<!--/.Double navigation-->

----------------


<li>
        <ul class="collapsible collapsible-accordion">
          
          <?php foreach($modulos as $mod) { 
            if($mod['DirIDMasterdirecciones']){?>
            
<li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i><?php echo $mod['DirDescripcion'] ?><i class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
            <ul>
            <?php foreach($modulos_uno as $m) { 
              if($m['DirMenuSub']){
                if($m['DirMenuSub'] == $mod['DirIDMasterdirecciones']){
          ?>
                  
<li><a href="<?php echo base_url(); ?><?php echo $m['DirDireccion'] ?>"><i class="waves-effect"></i> <?php echo $m['DirDescripcion']?></a></li>
                



<?php } }}?> 
               
               
              </ul>
            </div>
          </li>



          ---------------------------


          File: C:\xampp\htdocs\SUTV\application\views\header.php
Line: 49
Function: _error_handler

File: C:\xampp\htdocs\SUTV\application\controllers\Principal.php
Line: 33
Function: view

File: C:\xampp\htdocs\SUTV\index.php
Line: 315
Function: require_once     