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

  <link href="<?php echo base_url(); ?>jq-pro-master/css/style.css" rel="stylesheet">
</head>

<body >


<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
  
  <?php if(!empty($vista)) { // <-Remove this if statement ?>
    <?php 
  $i=0;
  foreach ($vista as $vis) { $i++; 
    if ($i==1 ){
        $act = 'active';
        } else {
        $act = '';
        }
  ?>

<div class="carousel-item <?=$act?>">
      <img class="d-block w-100" src="<?= base_url()?>imagenes/img_sucursales/<?= $vis['ImgDireccion'] ?>" alt="First slide">
    </div>

  <?php } ?>
<?php }else{?>

    <div class="carousel-item active">
      <img class="d-block w-100" src="<?= base_url()?>imagenes/img_sucursales/fondo.jpg ?>" alt="First slide">
    </div>

    <?php  } ?>




  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<script>
  var base_url = "<?=base_url()?>";
</script>

<script type="text/javascript">
$(function(){
    $('#carouselExampleFade.slide').carousel({
        interval: 100,
        pause: "hover"
    });

});
</script>



<script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/mdb.js"></script>

  <script>
  $(document).ready(function(){
    setTimeout(refrescar, 240000);
  });
  function refrescar(){
    location.reload();
  }
</script>

<script>
  $(document).ready(function(){
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }
});

</script>


</body>

</html>