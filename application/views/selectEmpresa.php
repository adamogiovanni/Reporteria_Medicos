<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap Template</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>jq-pro-master/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url(); ?>jq-pro-master/css/mdb.min.css" rel="stylesheet">

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
            background: url("./imagenes/fondo.jpg")no-repeat center center;
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
          <div class="mask rgba-lime-slight h-100 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
                    <form class="form-horizontal form-material"method="post" action="<?php echo base_url(); ?>login/selectEmpresa" id="mylogin">
    

<style>
input { color: #ffffff; }
.select-wrapper+label { color: #ffffff; }
</style>
    
                        <!--Form with header-->
                        <div class="card wow fadeIn" data-wow-delay="0.3s">
                            <div class="card-body gradient-card-header info-color-dark">
                            <input type='hidden' name='idu' value='<?= $UsId ?>'/>
                            <input type='hidden' name='idTP' value='<?= $tipoPerfil ?>'/>
                            <input type='hidden' name='idPer' value='<?= $perfil ?>'/>
                            <input type='hidden' name='UsCorreo' value='<?= $correo ?>'/>
                                <!--Header-->
                                <div class="form-header mdb-color">
                                    <h3><i class="far fa-building"></i> EMPRESA</h3>
                                </div>

                                <select name='empresa' class="mdb-select md-form colorful-select dropdown-primary" required>
                                <option class="text-default" value="" disabled selected>SELECCIONAR</option>
                                <?php
        foreach ($empresas as $emp) {

          ?>
          <option value="<?=$emp['EmpId']?>" ><?=$emp['EmpNombre']?></option>';
          <?php
        }
        ?>
</select>
                              


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

    <script>
  var base_url = "<?=base_url()?>";
</script>

    <!--  SCRIPTS  -->
    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/mdb.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script type="text/javascript">
$(document).ready(function() {
 $('.mdb-select').materialSelect();
});
</script>
</body>

</html>