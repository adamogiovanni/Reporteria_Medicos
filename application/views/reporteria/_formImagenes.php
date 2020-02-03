<?=form_open_multipart(base_url()."sucursal\addImagenSuc")?>


<input type='hidden' name='idS' value='<?= $sucursal ?>'/>
<div class="row">
              <div class="col">
              <div class="md-form form-sm mb-4">
              <div class="file-field">
                <div class="btn btn-primary btn-sm float-left">
                <span>Choose files</span>
                <input name="files[]" type="file" multiple>
                </div>
                <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Subir uno o mas imagenes" required>
                </div>
                </div>
              </div>
              </div>
        </div>


        
        <div class="text-center form-sm mt-2">
                <button class="btn btn-info"><?= $btnName ?><i class="fas fa-sign-in ml-1"></i></button>
                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
        </div>


 <?=form_close()?>
 
    









