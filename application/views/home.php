<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>jq-pro-master/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url(); ?>jq-pro-master/css/mdb.css" rel="stylesheet">

</head>

<body >

<!--Main Navigation-->
<header>
<nav class="navbar navbar-expand-lg navbar-dark indigo fixed-top scrolling-navbar">

  <!-- Navbar brand -->

          <a class="navbar-brand" href="#">
    <img src="<?= base_url()?>imagenes/sutvn.png" height="30" class="d-inline-block align-top"
      alt="mdb logo"> 
  </a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

      <!-- Links -->
      <ul class="navbar-nav mr-auto smooth-scroll list-unstyled">
          <li class="nav-item active">
              <a class="nav-link" href="#home">Home
                  <span class="sr-only">(current)</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#proyecto">Proyectos</a>
          </li>
      </ul>

  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main>

<div class="container py-5">



<div id="home">



    <!--Grid row-->
    <div class="row">

        <!--Grid column-->
        <div class="col-md-12 py-3">

        <div class="view overlay z-depth-1-half">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(15).jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(16).jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(17).jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <div class="mask rgba-white-light"></div>
</div>
        </div>
        <!--Grid column-->


    </div>
    <!--Grid row-->
    <script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</div>
<div id="proyecto">
<hr>
 <h1>  <p class="text-center">PROYECTOS</p> </h1>
    <!--Grid row-->
    <div class="row">

    <?php 
    
    if(!empty($sucursal)){

    
    foreach ($sucursal as $suc) { ?>

 
  <!--Grid column-->
  <div class="col-lg-4 col-md-6 py-1">

    <!--Card-->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img src="<?= base_url()?>imagenes/Sucursales/<?= $suc['SucIMG'] ?>" class="card-img-top" alt="">
        <a href="<?= base_url()?>vista/index/<?= $suc['SucId'] ?>" target="_blank">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>
      <div class="card-body text-center py-1">
    <!-- Subtitle -->
    <h5 class="blue-text pb-2"><strong><?= $suc['SucNombreSucursal'] ?></strong></h5>
      </div>
    </div>
    <!--/.Card-->

  </div>
  <!--Grid column-->
  <?php } 
  
}?>
</div>

</div>

</div>
<!--Main container-->




</main>
<!--Main layout-->



<!--Footer-->
<footer class="page-footer font-small blue pt-4 mt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">Sistema para Monitores</h5>
        <p>Puedes subir todo el contenido que quieras.</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

          <!-- Links -->
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled">
            <li>
              <a href="#!">SUTV</a>
            </li>
            <li>
              <a href="#!">SoWork</a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->


    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="http://www.sowork.cl"> SoWork.cl</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<!--Footer-->




<script>
  var base_url = "<?=base_url()?>";
</script>


<script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/mdb.js"></script>




</body>

</html>