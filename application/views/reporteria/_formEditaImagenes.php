
<?=form_open(base_url()."sucursal\EliminarImagenes")?>

 <input type='hidden' name='idS' value='<?= $sucursal ?>'/>
<!-- Grid row -->


<?php if(!empty($imagen)) { ?>

<div class="row text-center">
<?php foreach ($imagen as $img) { ?>

    <!-- Grid column -->
    <div class="col-lg-4 col-md-12 mb-lg-0 py-2">
        <!--Featured image-->
        <div class="view overlay rounded z-depth-1">
        <img src="<?= base_url()?>imagenes/img_sucursales/<?= $img['ImgDireccion'] ?>"  class="img-fluid"  alt="Sample project image">
        <a>
            <div class="mask rgba-white-slight"></div>
        </a>
        </div>
        <!--Featured image-->

            <input name='engineer[]' value="<?=$img['ImgId']?>" type="checkbox" class="form-check-input" id="<?=$img['ImgDireccion']?>">
      <label class="form-check-label" for="<?=$img['ImgDireccion']?>"><i class="fas fa-trash-alt"></i></label>
     
     

    </div>
    <br/>
  

   <?php  } ?>

   </div>

   <?php  } else {?>
    <div class="col-lg-12  py-2 text-center">
    <h2 class="font-weight-bold deep-orange-lighter-hover mb-3">SIN IMAGENES</h2>
    </div>
    <?php  } ?>

    <?php if(!empty($imagen)) { ?>
    <div class="text-center">
   <button class="btn btn-danger btn-sm"><?= $btnName ?><i class="fas fa-sign-in ml-1"></i></button>
   </div>
   <?php  } ?>
<?=form_close()?>
 






