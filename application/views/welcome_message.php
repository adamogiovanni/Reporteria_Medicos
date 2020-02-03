<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="jq-pro-master/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="jq-pro-master/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="jq-pro-master/css/style.css" rel="stylesheet">
</head>

<body class="fixed-sn pink-skin">

 <!--Double navigation-->
 <header>
  <!-- Sidebar navigation -->
  <div id="slide-out" class="side-nav sn-bg-4 fixed">
    <ul class="custom-scrollbar">
      <!-- Logo -->
      <li>
        <div class="logo-wrapper waves-light">
          <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
        </div>
      </li>
      <!--/. Logo -->
      <!--Social-->
      <li>
        <ul class="social">
          <li><a href="#" class="icons-sm fb-ic"><i class="fab fa-facebook-f"> </i></a></li>
          <li><a href="#" class="icons-sm pin-ic"><i class="fab fa-pinterest"> </i></a></li>
          <li><a href="#" class="icons-sm gplus-ic"><i class="fab fa-google-plus-g"> </i></a></li>
          <li><a href="#" class="icons-sm tw-ic"><i class="fab fa-twitter"> </i></a></li>
        </ul>
      </li>
      <!--/Social-->
      <!--Search Form-->
      <li>
        <form class="search-form" role="search">
          <div class="form-group md-form mt-0 pt-1 waves-light">
            <input type="text" class="form-control" placeholder="Search">
          </div>
        </form>
      </li>
      <!--/.Search Form-->
      <!-- Side navigation links -->
      <li>
        <ul class="collapsible collapsible-accordion">
          <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> Submit
              blog<i class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="#" class="waves-effect">Submit listing</a>
                </li>
                <li><a href="#" class="waves-effect">Registration form</a>
                </li>
              </ul>
            </div>
          </li>
          <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-hand-pointer-o"></i>
              Instruction<i class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="#" class="waves-effect">For bloggers</a>
                </li>
                <li><a href="#" class="waves-effect">For authors</a>
                </li>
              </ul>
            </div>
          </li>
          <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-eye"></i> About<i class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="#" class="waves-effect">Introduction</a>
                </li>
                <li><a href="#" class="waves-effect">Monthly meetings</a>
                </li>
              </ul>
            </div>
          </li>
          <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-envelope-o"></i> Contact me<i
                class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="#" class="waves-effect">FAQ</a>
                </li>
                <li><a href="#" class="waves-effect">Write a message</a>
                </li>
                <li><a href="#" class="waves-effect">FAQ</a>
                </li>
                <li><a href="#" class="waves-effect">Write a message</a>
                </li>
                <li><a href="#" class="waves-effect">FAQ</a>
                </li>
                <li><a href="#" class="waves-effect">Write a message</a>
                </li>
                <li><a href="#" class="waves-effect">FAQ</a>
                </li>
                <li><a href="#" class="waves-effect">Write a message</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
      <!--/. Side navigation links -->
    </ul>
    <div class="sidenav-bg mask-strong"></div>
  </div>
  <!--/. Sidebar navigation -->
  <!-- Navbar -->
  <nav class="navbar navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
    <!-- SideNav slide-out button -->
    <div class="float-left">
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
    </div>
    <!-- Breadcrumb-->
    <div class="breadcrumb-dn mr-auto">
      <p>Material Design for Bootstrap</p>
    </div>
    <ul class="nav navbar-nav nav-flex-icons ml-auto">
      <li class="nav-item">
        <a class="nav-link"><i class="fas fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Contact</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"><i class="far fa-comments"></i> <span class="clearfix d-none d-sm-inline-block">Support</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"><i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Account</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.Navbar -->
</header>
<!--/.Double navigation-->

<!--Main Layout-->
<main>
  <div class="container-fluid">

<!--Section: Main panel-->
<section class="card card-cascade narrower mb-5">

  <!--Grid row-->
  <div class="row">

  <!--Grid column-->
  <div class="col-md-5">
    

      <!--Panel Header-->
      <div class="view view-cascade py-3 gradient-card-header info-color-dark">
          <h5 class="mb-0">Sales</h5>
      </div>
      <!--/Panel Header-->
    
      <!--Panel content-->
      <div class="card-body">
    
          <!--Grid row-->
          <div class="row">
    
              <!--Grid column-->
              <div class="col-md-6 mb-4">
    
    
    
              </div>
              <!--Grid column-->
    
              <!--Grid column-->
              <div class="col-md-6 mb-4 text-center">
    
    
    
              </div>
              <!--Grid column-->
    
          </div>
          <!--Grid row-->
    
      </div>
      <!--Panel content-->
    
    


  </div>
  <!--Grid column-->

  <!--Grid column-->
  <div class="col-md-7">



  </div>
  <!--Grid column-->

  </div>
  <!--Grid row-->

</section>
  </div>
</main>
<!--/. Sidebar navigation -->
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="jq-pro-master/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="jq-pro-master/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="jq-pro-master/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="jq-pro-master/js/mdb.js"></script>

  <script type="text/javascript">
$(".button-collapse").sideNav();
// SideNav Scrollbar Initialization
var sideNavScrollbar = document.querySelector('.custom-scrollbar');
Ps.initialize(sideNavScrollbar);
</script>
</body>

</html>