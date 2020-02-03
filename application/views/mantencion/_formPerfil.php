
        <meta charset="UTF-8">
 <form class='form' id='<?= $formName ?>' autocomplete='off'>
 <?php if($btnName=="Agregar" or $btnName=="Modificar" ) {?>

        <input type='hidden' name='idu' value='<?= $usuario['UsId'] ?>'/>
        <input type='hidden' name='idP' value='<?= $idPer ?>'/>

<div class="row">
              <div class="col">
              <div class="md-form form-sm mb-4">
                <select name="tipoperfil"  class="mdb-select md-form" required>
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
                        <input type='text' id="txtPerfil" value='<?= $perfil['PerNombre'] ?>' name='perfil'  class="form-control form-control-sm validate" required>
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
<div class="container">
<div class="row">
              <div class="col">

              <div class="form-check">
              <input type='hidden' name='idper' value='<?= $idPer ?>'/>
              
              <?php foreach ($master as $mast) { ?>
                <h5><strong><?=$mast['MastDirecDescripcion']?></strong></h5>
                <?php foreach ($opciones as $acc) { 
                        if($acc['DirIDMasterdirecciones']==$mast['MastDirecId'])
                        { 

                  if ($acc['opcion'] == 1 ){
                        $ch = 'checked';
                } else {
                        $ch = '';
                        } ?>
                        
                <div class="form-check">
                <input name='engineer[]' value="<?=$acc['DirId']?>" type="checkbox" class="form-check-input" id="<?=$acc['DirId']?>" <?=$ch?>>
                <label class="form-check-label" for="<?=$acc['DirId']?>"><?=$acc['DirDescripcion']?></label>
                <input type="hidden" name="engineer_on_page[]" value="<?=$acc['DirId']?>"/>
                </div>       
                
                <?php } ?>

                <?php } ?>


                <?php } ?>
            
             </div>
</div> 
</div> 



<div class="text-right form-sm mt-4">
<hr style="color: #0056b2;" />
<button type='submit' class='btn btn-success btn-sm'><?=$btnName?></button>

        </div>
<?php }  ?>     
 
    

</form>








