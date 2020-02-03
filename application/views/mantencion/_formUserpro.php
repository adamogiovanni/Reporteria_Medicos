<meta charset="UTF-8">
 <form class='form' id='<?= $formName ?>' autocomplete='off'>


         <input type='hidden' name='idE' value='<?= $empresa['EmpId'] ?>'/>



<div class="row">
<div class="col">
    <div class="md-form">
  <input value='<?= $usuario['UsRut'] ?>' type='text' id="txtRut" name='txtRut' class="form-control validate" minlength="12" maxlength="12" value='<?= $usuario['UsRut'] ?>'>
  <label data-error="wrong" data-success="right" for="txtRut">Rut</label>
  <small id="passwordHelpBlockMD" class="form-text text-muted">
  Si es Menor a 10 Mill. , anteponer 0 (Ejemplo: '09123456-7').
  </small>
</div>            
    </div>
    
    
</div> 






<div class="text-right form-sm mt-4">
<hr style="color: #0056b2;" />
<div class="text-center form-sm mt-2">
                <button class="btn btn-info btn-sm"><?= $btnName ?><i class="fas fa-sign-in ml-1"></i></button>
                <button type="button" class="btn btn-outline-info waves-effect ml-auto btn-sm" data-dismiss="modal">Cerrar</button>
        </div>

        </div>
  
 
    

</form>
<?php if($btnName=="Modificar"){ ?>
<script type="text/javascript">
$(document).ready(function() {
    $(txtNombre).trigger("change");  
    $(txtGiro).trigger("change");  
    $(txtRut).trigger("change");  
    $(txtContacto).trigger("change");  
    $(txtTelefono).trigger("change");  
    $(txtDireccion).trigger("change");  
});
</script>
<?php }  ?>


<script type="text/javascript">
$(document).ready(function(){
  $('#birth-date').mask('00/00/0000');
  $('#txtTelefono').mask(56+"(0)-0000-0000");
  $('#txtRut').mask("00.000.000-A");
});

// Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script>