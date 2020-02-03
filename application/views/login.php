<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    <!-- Required meta tags always come first -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NCMH</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>jq-pro-master/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url(); ?>jq-pro-master/css/mdb.css" rel="stylesheet">

    <style>

        html,
        body,
        header,
        .view {
          height: 100vh;
        }

        @media (max-width: 740px) {
          html,
          body,
          header,
          .view {
            height: 815px;
          }
        }

        @media (min-width: 800px) and (max-width: 850px) {
          html,
          body,
          header,
          .view  {
            height: 650px;
          }
        }

        .intro-2 {
            background: url("./imagenes/login.jpg")no-repeat center center;
            background-size: cover;
        }
        .top-nav-collapse {
            background-color: #3f51b5 !important;
        }
        .navbar:not(.top-nav-collapse) {
            background: transparent !important;
        }
        @media (max-width: 768px) {
            .navbar:not(.top-nav-collapse) {
                background: #3f51b5 !important;
            }
        }
        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #3f51b5!important;
            }
        }

        .card {
            background-color: rgba(229, 228, 255, 0.2);
        }
        .md-form label {
            color: #ffffff;
        }
        h6 {
            line-height: 1.7;
        }
        

        .card {
            margin-top: 30px;
            /*margin-bottom: -45px;*/

        }

        .md-form input[type=text]:focus:not([readonly]),
        .md-form input[type=password]:focus:not([readonly]) {
            border-bottom: 1px solid #8EDEF8;
            box-shadow: 0 1px 0 0 #8EDEF8;
        }
        .md-form input[type=text]:focus:not([readonly])+label,
        .md-form input[type=password]:focus:not([readonly])+label {
            color: #8EDEF8;
        }

        .md-form .form-control {
            color: #fff;
        }
        

    </style>

</head>

<body>


    <!--Main Navigation-->
    <header>

    

        <!--Intro Section-->
        <section class="view intro-2">
        <div class="mask rgba-orange-slight h-100 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
                    <form class="form-horizontal form-material"method="post" action="<?php echo base_url(); ?>login" id="mylogin" autocomplete="off">
    
                        <!--Form with header-->
                        <div class="card wow fadeIn" data-wow-delay="0.3s">
                            <div class="card-body gradient-card-header teal accent-2">

                                <!--Header-->
                                <div class="form-header  teal accent-4">
                                <a class="navbar-brand text-white " href="#">
    REPORTERIA
  </a>
                                </div>

                                <!--Body-->
                             <div class="md-form">
                                 <i class="fas fa-user prefix text-dark"></i>
                                    <input type="text" placeholder="Usuario" name="usuario" id="orangeForm-pass" required="" class="form-control text-dark">
</div>

                                <div class="md-form">
                                    <i class="fas fa-lock prefix text-dark"></i>
                                    <input type="password" placeholder="Password"  name="pass" id="orangeForm-pass" required="" class="form-control text-dark ">
                               
                                </div>

                                <div class="text-center">
                                    <button class="btn mdb-color btn-lg">INGRESAR</button>

                                </div>
                                


                            </div>
                        </div>
                        <!--/Form with header-->
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </section>

    </header>
    <!--Main Navigation-->


    <!--  SCRIPTS  -->
    <!-- JQuery -->
    <script type="text/javascript" src="../jq-pro-master/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../jq-pro-master/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../jq-pro-master/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../jq-pro-master/js/mdb.min.js"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>