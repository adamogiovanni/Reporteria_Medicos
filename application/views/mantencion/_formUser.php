<meta charset="UTF-8">
 <form class='form' id='<?= $formName ?>' autocomplete='off'>
 <?php if($btnName=="Agregar" or $btnName=="Modificar" ) {?>

 
        <input type='hidden' name='idu' value='<?= $usuario['UsId'] ?>'/>
        <?php if ($opcion=="cuenta"){?>
          <input type='hidden' name='perfil' value='<?= $usuario['UsIdPerfil'] ?>'/>
          <input type='hidden' name='username' value='<?= $usuario['UsUsername'] ?>'/>
          <input type='hidden' name='rut' value='<?= $usuario['UsRut'] ?>'/>
          <div class="row">

<div class="col">
<div class="md-form form-sm mb-4">
<i class="fas fa-code prefix"></i>
          <input type='text' id="txtNombre"  name='nombre' class="form-control form-control-sm validate" value='<?= $usuario['UsNombre'] ?>'>
          <label  data-error="Minimo 5 Caracteres" data-success="right" for="txtNombre">Nombre</label>
        </div>
</div>

<div class="col">
<div class="md-form form-sm mb-4">
<i class="fas fa-code prefix"></i>
          <input type='text' id="txtApellido" value='<?= $usuario['UsApellidos'] ?>' name='apellidos' class="form-control form-control-sm validate">
          <label data-error="Minimo 5 Caracteres" data-success="right" for="txtApellido">Apellidos</label>
        </div>
</div>


</div> 
<div class="row">
<div class="col">
<div class="md-form form-sm mb-4">
<i class="fas fa-code prefix"></i>
          <input type='password' id="txtPass" value='<?= $usuario['UsPass'] ?>' name='pass' class="form-control form-control-sm validate">
          <label data-error="Minimo 5 Caracteres" data-success="right" for="txtPass">Password</label>
        </div>
</div>

<div class="col">
<div class="md-form form-sm mb-4">
<i class="fas fa-code prefix"></i>
          <input type="email" id="txtcorreo" value='<?= $usuario['UsCorreo'] ?>' name='correo' class="form-control form-control-sm validate">
          <label data-error="Minimo 5 Caracteres" data-success="right" for="txtcorreo">Correo</label>
        </div>

</div>

</div>        
<script type="text/javascript">
$(document).ready(function() {
    $(txtPass).trigger("change");
    $(txtcorreo).trigger("change");
});
</script>




         <?php  } else {?>
          <div class="row">

<div class="col">
<div class="md-form form-sm mb-4">
<i class="fas fa-code prefix"></i>
          <input type='text' id="txtNombre"  name='nombre' class="form-control form-control-sm validate" minlength="5" maxlength="30" value='<?= $usuario['UsNombre'] ?>'>
          <label  data-error="Minimo 5 Caracteres" data-success="Valido" for="txtNombre">Nombre</label>
        </div>
</div>

<div class="col">
<div class="md-form form-sm mb-4">
<i class="fas fa-code prefix"></i>
          <input type='text' id="txtApellido" value='<?= $usuario['UsApellidos'] ?>' minlength="5" maxlength="40" name='apellidos' class="form-control form-control-sm validate">
          <label data-error="Minimo 5 Caracteres" data-success="Valido" for="txtApellido">Apellidos</label>
        </div>
</div>
<div class="col">

<?php if ($opcion=="cuenta"){?>
<input type='hidden' name='perfil' value='<?= $usuario['UsIdPerfil'] ?>'/>
<?php   } else {
  
  if ($usuario['UsIdPerfil'] == 2){
    $sela = 'selected';
    $selu = '';
    } elseif($usuario['UsIdPerfil'] == 3) {
    $selu = 'selected';
    $sela = '';
    }else{
      $sela = '';
      $selu = '';
    }
    ?>
  

  <select name="perfil"  class="mdb-select md-form">
<option value="" disabled selected>PERFIL </option>
<option value="2"  <?=$sela?>>Administrador </option>
<option value="3"  <?=$selu?>>Usuario </option>



</select>
<?php   } ?>

</div>


</div> 
<div class="row">
<div class="col">
<div class="md-form form-sm mb-4">
<i class="fas fa-code prefix"></i>
          <input type='text' id="txtProfesion" value='<?= $usuario['UsProfesion'] ?>' minlength="5" maxlength="30" name='profesion'  class="form-control form-control-sm validate">
          <label data-error="Minimo 5 Caracteres" data-success="Valido" for="txtProfesion">Profesion</label>
        </div>
</div>
<div class="col">
<div class="md-form form-sm mb-4">
<i class="fas fa-code prefix"></i>
          <input type='text' id="txtEmpresa" value='<?= $usuario['UsEmpresa'] ?>' minlength="5" maxlength="90" name='empresa' class="form-control form-control-sm validate">
          <label data-error="Minimo 5 Caracteres" data-success="Valido" for="txtEmpresa">Empresa</label>
        </div>
</div>

</div> 
<div class="row">
<div class="col">
<div class="md-form form-sm mb-4">
<i class="fas fa-code prefix"></i>
          <input type='text' id="txtUsername" value='<?= $usuario['UsUsername'] ?>' minlength="5" maxlength="16" name='username'  class="form-control form-control-sm validate">
          <label data-error="Minimo 5 Caracteres" data-success="Valido" for="txtUsername">Username</label>
        </div>
</div>
<div class="col">
<div class="md-form form-sm mb-4">
<i class="fas fa-code prefix"></i>
          <input type='password' id="txtPass" value='<?= $usuario['UsPass'] ?>' minlength="5" maxlength="16" name='pass' class="form-control form-control-sm validate">
          <label data-error="Minimo 5 Caracteres" data-success="Valido" for="txtPass">Password</label>
        </div>
</div>

</div>        
<div class="row">


<div class="col">
    <div class="md-form">
  <input value='<?= $usuario['UsRut'] ?>' type='text' id="txtRut" name='rut' class="form-control validate" minlength="9" maxlength="10">
  <label data-error="Error" data-success="Valido" for="txtRut">Rut</label>
  <small id="passwordHelpBlockMD" class="form-text text-muted">
  Si es Menor a 10 Mill. , anteponer 0 (Ejemplo: '09123456-7').
  </small>
</div>            
    </div>
 <div class="col">
    <div class="md-form">
  <input value='<?= $usuario['UsRutEmpresa'] ?>' type='text' id="txtRutEmpresa" name='rutEmpresa' class="form-control validate" minlength="9" maxlength="10">
  <label data-error="Error" data-success="Valido" for="txtRutEmpresa">Rut Empresa</label>
  <small id="passwordHelpBlockMD" class="form-text text-muted">
  Si es Menor a 10 Mill. , anteponer 0 (Ejemplo: '09123456-7').
  </small>
</div>            
    </div>   
<div class="col">
<div class="md-form form-sm mb-4">
<i class="fas fa-code prefix"></i>
          <input type="email" id="txtcorreo" value='<?= $usuario['UsCorreo'] ?>' minlength="5" maxlength="70" name='correo' class="form-control form-control-sm validate">
          <label data-error="Error" data-success="Valido" for="txtcorreo">Correo</label>
        </div>

</div>
</div>
          <?php  } ?>

          <div class="text-right form-sm mt-4">
<hr style="color: #0056b2;" />
<div class="text-center form-sm mt-2">
                <button class="btn btn-info btn-sm"><?= $btnName ?><i class="fas fa-sign-in ml-1"></i></button>
                <button type="button" class="btn btn-outline-info waves-effect ml-auto btn-sm" data-dismiss="modal">Cerrar</button>
        </div>

        </div>

<?php if($btnName=="Modificar"){ ?>
        <script type="text/javascript">
$(document).ready(function() {
    $(txtNombre).trigger("change");  
    $(txtApellido).trigger("change");
    $(txtUsername).trigger("change");
    $(txtPass).trigger("change");
    $(txtProfesion).trigger("change");
    $(txtEmpresa).trigger("change");
    $(txtRut).trigger("change");
    $(txtRutEmpresa).trigger("change");    
    $(txtcorreo).trigger("change");
});
</script>


<?php }  ?>

 <?php  }
 else{?> 


    <!-- Grid column -->
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="email" class="form-control" value="hola" id="inputEmail4MD" placeholder="Email">
        <label for="inputEmail4MD">Email</label>
      </div>
    </div>
    <!-- Grid column -->



<?php }  ?>     
 
    

</form>






<script type="text/javascript">
$(document).ready(function(){

});

// Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script>