
        <meta charset="UTF-8">
 <form class='form' id='<?= $formName ?>' autocomplete='off'>


         <input type='hidden' name='idE' value='<?= $empresa['EmpId'] ?>'/>


<div class="row">
    <div class="col">

    <div class = "md-form form-sm"> 
            <input value='<?= $empresa['EmpNombre'] ?>' id = "txtNombre" class = "form-control validate" autocomplete = "off" name = "txtNombre" minlength="5" maxlength="30" required = "" type = "text" /> 
        <label for = "txtNombre" data-error = "Minimo 5 Caracteres" data-success="Valido"> Nombre </label> 
    </div>             
    </div>
    <div class="col">

    <div class = "md-form form-sm"> 
            <input value='<?= $empresa['EmpGiro'] ?>' id = "txtGiro" class = "form-control validate" autocomplete = "off" name = "txtGiro" minlength="5" maxlength="30" required = "" type = "text" pattern="[A-Za]+"/> 
        <label for = "txtGiro" data-error = "Minimo 5 Caracteres y solo letras" data-success="Valido"> Giro </label> 
    </div>             
    </div>
    
    <script type="text/javascript">
$(document).ready(function() {
$("#idRegion").change(function() {
$("#idRegion option:selected").each(function() {
idRegion = $('#idRegion').val();
$.post("<?php echo base_url(); ?>empresa/selectComuna", {
idRegion : idRegion
}, function(data) {
$("#txtComuna").html(data);
});
});
});
});
</script>
<div class="col">  
<div class = "md-form form-sm mb-4">  
<select name="idRegion" id="idRegion" onChange="mostrar(this.value);" required='required' class="mdb-select md-form" searchable="Search here..">
  <option value="" disabled selected>Region</option>
  <?php foreach ($region as $reg) {
                        
                        if ($reg['RegId'] == $comuna['ComRegionId'] ){
                        $sel = 'selected';
                        } else {
                        $sel = '';
                        } ?>
        
                        
                        <option value="<?=$reg['RegId']?>" <?=$sel?> ><?=$reg['RegNombre']?></option>';
                        <?php } ?>



  <?php
        foreach ($region as $reg) {
          ?>
          <option value="<?=$reg['RegId']?>" ><?=$reg['RegNombre']?></option>
         
          <?php
        }
        ?>
</select>
</div>             
</div>
<div class="col">  
<div class = "md-form form-sm mb-4">  
<select name="txtComuna" id="txtComuna"  required='required' class="mdb-select md-form" searchable="Search here..">

<?php if (!empty($comuna) ){?>
    <option value="<?= $comuna['ComId'] ?>"><?= $comuna['ComNombre'] ?></option>
    
<?php   } else {?>
    <option value="" disabled selected>Comuna</option>
<?php   } ?>



</select>
</div>             
</div>

    
</div> 
<div class="row">
<div class="col">
    <div class="md-form">
  <input value='<?= $empresa['EmpRut'] ?>' type='text' id="txtRut" name='txtRut' class="form-control validate" minlength="12" maxlength="12" value='<?= $empresa['EmpNombre'] ?>'>
  <label data-error="wrong" data-success="right" for="txtRut">Rut</label>
  <small id="passwordHelpBlockMD" class="form-text text-muted">
  Si es Menor a 10 Mill. , anteponer 0 (Ejemplo: '09123456-7').
  </small>
</div>            
    </div>
    <div class="col">
        <div class="md-form form-sm mb-4">
        <input value='<?= $empresa['EmpContacto'] ?>' type='text' id="txtContacto" minlength="5" maxlength="50"  name='txtContacto' class="form-control form-control-sm validate" value='<?= $empresa['EmpNombre'] ?>' required>
        <label  data-error="Minimo 5 Caracteres y solo letras" data-success="Valido" for="txtContacto">Contacto</label>
        </div>             
    </div>
    <div class="col">
        <div class="md-form form-sm mb-4">
        <input value='<?= $empresa['EmpTelefono'] ?>' type='text' id="txtTelefono" minlength="15" maxlength="15" name='txtTelefono' class="form-control form-control-sm validate" value='<?= $empresa['EmpNombre'] ?>' required>
        <label  data-error="Error" data-success="Valido" for="txtTelefono">Telefono</label>
        </div>             
    </div>
    
</div> 
<div class="row">

    <div class="col">
        <div class="md-form form-sm mb-4">
        <i class="fas fa-building prefix"></i>
        <input value='<?= $empresa['EmpDireccion'] ?>' type='text' id="txtDireccion" minlength="5" maxlength="50" name='txtDireccion' class="form-control form-control-sm validate" value='<?= $empresa['EmpNombre'] ?>'>
        <label  data-error="Error" data-success="Valido" for="txtDireccion">Direccion</label>
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