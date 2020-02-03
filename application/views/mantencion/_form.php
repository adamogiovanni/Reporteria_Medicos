
        <meta charset="UTF-8">
 <form class='form' id='<?= $formName ?>' autocomplete='off'>
 <?php if($btnName=="Agregar" or $btnName=="Modificar" ) {?>
     
        <input type='hidden' name='idP' value='<?= $perfil['PerId'] ?>'/>
        <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
    <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
</div>
        <div class="row">
              <div class="col">
              <div class="md-form form-sm mb-4">
                <select name="tipoperfil"  class="mdb-select md-form">
                <option value="" disabled selected>Tipo Perfil</option>
                <?php foreach ($getTipoPerfil as $tp) {
                if ($tp['TPId'] == $perfil['PerIdTP'] ){
                $sel = 'selected';
                } else {
                $sel = '';
                } ?>
                <option value="<?=$tp['TPId']?>" <?=$sel?> ><?=$tp['TPDescripcion']?></option>';
                <?php } ?>
                </select>

             </div>
             </div>
        </div> 
        <div class="row">
              <div class="col">
              <div class="md-form form-sm mb-4">
              <i class="fas fa-code prefix"></i>
                        <input type='text' id="txtPerfil" value='<?= $perfil['PerNombre'] ?>' name='perfil'  class="form-control form-control-sm validate">
                        <label data-error="wrong" data-success="right" for="txtPerfil">PERFIL</label>
                      </div>
              </div>
        </div>
          

        <div class="text-center form-sm mt-2">
                <button class="btn btn-info"><?= $btnName ?><i class="fas fa-sign-in ml-1"></i></button>
                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
        </div>
<?php if($btnName=="Modificar"){ ?>
        <script type="text/javascript">
$(document).ready(function() {
    $(txtPerfil).trigger("change");  
});
</script>


<?php }  ?>

<script type="text/javascript">
$(document).ready(function() {
 $('.mdb-select').materialSelect();
});
</script>
 <?php  }
 else{?> 

<div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>


<?php }  ?>     
 


</form>



