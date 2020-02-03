<?=form_open_multipart(base_url()."sucursal\AddImagenMasiva")?>

<?php if(!empty($sucursal)) { ?>




        <div class="row">
              <div class="col">
              <div class="md-form form-sm mb-4">
              <div class="file-field">
                <div class="btn btn-primary btn-sm float-left">
                <span>Choose files</span>
                <input name="userfile" type="file">
                </div>
                <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload your file" required>
                </div>
                </div>
              </div>
              </div>
        </div>


        
        <div class="text-center form-sm mt-2">
                <button class="btn btn-info">Agregar<i class="fas fa-sign-in ml-1"></i></button>
                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
        </div>
        <?php } else { ?>
                <div class="col-lg-12  py-2 text-center">
    <h2 class="font-weight-bold deep-orange-lighter-hover mb-3">NO HAY SUCURSALES CREADAS</h2>
    </div>

        <?php } ?>
 <?=form_close()?>
 
    
