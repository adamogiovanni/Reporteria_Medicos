
  <div class="container">

<!--Section: Main panel-->
<section class="card card-cascade narrower mb-5">
<div class="row">
            <div class="col-md-5">
                <div class="view view-cascade info-color-dark narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                <a href="" class="white-text mx-3">PERFIL</a>

<div>

<a type="button" id="btnNewPerfil" class="btn-floating btn-success btn-sm"><i class="fas fa-user-plus"></i></a>

</div>
                </div>
                
            </div>
        </div>



        <div class="row">
            
                <div class="card-body">
                <div class="row">
    
    <!--Grid column-->
    <div class="col-md-12 mb-12">
    <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
      <thead>
        <tr>
        <th style="width:200px" class="th-sm">Accesos
        </th>
        <th class="th-sm">Perfil
        </th>
        <th style="width:40px" class="th-sm">Acciones
        </th>
        </tr>
        </thead>
        <tbody>
       
        <?php
        foreach ($perfil as $per) {
          
          ?>
          <tr >
          
          <?php
           if ($per['PerIdTP'] == 1 ){
             $class = 'class="table-primary font-weight-bold"';
           } else {
             $class = '';
           }
           ?>
           
           
           <td class="text-center">
           <?php 
           $IdPerfil=$this->session->userdata('UsIdPerfil'); 
           if($per['PerIdTP']==3 and $per['PerId']!=$IdPerfil){?> 
            <a type="button" class="btn btn-danger btn-sm editAcc" data-id="<?=$per['PerId']?>"><i class="fas fa-list-ol"></i> Accesos</a>
           <?php } ?>
            </td>
            <td <?=$class?>> <?=$per['PerNombre']?> </td>
            <td class="text-center">
            
            <?php 
           $tipo=$this->session->userdata('tipoPerfil'); 
           $u=$this->session->userdata('UsIdPerfil');  
           if($tipo!=3){?>
            <?php if($per['PerId']==$u){?> 
              <a type="button" class="btn btn-warning btn-rounded btn-sm px-2 editPer" data-id="<?=$per['PerId']?>"><i class="fas fa-user-edit"></i></a>
                <?php } else {?> 
            <a type="button" class="btn btn-danger btn-rounded btn-sm px-2 delPer" data-id="<?=$per['PerId']?>"><i class="fas fa-user-times"></i></a>
            <a type="button" class="btn btn-warning btn-rounded btn-sm px-2 editPer" data-id="<?=$per['PerId']?>"><i class="fas fa-user-edit"></i></a>
            <?php } ?>
            <?php } ?>
          
            </td>

          </tr>
        <?php } ?>
           </tbody>
           </table>
        </div>
        </div>




                </div>
            
        </div>

</section>
  </div>


</section>
  </div>
