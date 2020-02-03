<?=form_open_multipart(base_url()."sucursal/".$ControlName)?>

<input type='hidden' name='idSU' value='<?= $miSucursal['SucId'] ?>'/>
        <div class="row">
              <div class="col">
              <div class="md-form form-sm mb-4">
              <i class="fas fa-code prefix"></i>
                        <input type='text' id="txtNombreSucursal" value='<?= $miSucursal['SucNombreSucursal'] ?>' name='sucursal'  class="form-control form-control-sm validate" required>
                        <label data-error="wrong" data-success="right" for="txtNombreSucursal">Sucursal</label>
                      </div>
              </div>
        </div>
<?php 
if($btnName=="Agregar"){?>

<div class="row">
              <div class="col">
              <div class="md-form form-sm mb-4">
              <div class="file-field">
                <div class="btn btn-primary btn-sm float-left">
                <span>Choose files</span>s
                <input name="userfile" type="file">
                </div>
                <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload your file" required>
                </div>
                </div>
              </div>
              </div>
        </div>

<?php } else { ?>
        <div class="row">
              <div class="col">
              <div class="md-form form-sm mb-4">
              <div class="file-field">
                <div class="btn btn-primary btn-sm float-left">
                <span>Choose files</span>s
                <input name="userfile" type="file">
                </div>
                <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload your file">
                </div>
                </div>
              </div>
              </div>
        </div>

        <?php }  ?>
        
        <div class="text-center form-sm mt-2">
                <button class="btn btn-info btn-sm"><?= $btnName ?><i class="fas fa-sign-in ml-1"></i></button>
                
                <button type="button" class="btn btn-outline-info waves-effect ml-auto btn-sm" data-dismiss="modal">Cerrar</button>
        </div>

<script type="text/javascript">
$(document).ready(function() {
    $(txtNombreSucursal).trigger("change");  
});
</script>        

 <?=form_close()?>
 
    









