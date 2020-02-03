
  <div class="container">

<!--Section: Main panel-->
<section class="card card-cascade narrower mb-5">
      

      <!--/Panel Header-->
      <div class="row">
            <div class="col-md-5">
                <div class="view view-cascade info-color-dark narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                <a href="" class="white-text mx-3">USUARIOS</a>

<div>

<a type="button" id="btnNewUser" class="btn-floating btn-success btn-sm"><i class="fas fa-user-plus"></i></a>

</div>
                </div>
                
            </div>
        </div>



        <div class="row">
      <!--Panel content-->
      <div class="card-body">
    
          <!--Grid row-->
          <div class="row">
    
              <!--Grid column-->
              <div class="col-md-12 mb-8">
              
              <table  id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

                <thead>
    <tr>
      <th class="th-sm">Nombre
      </th>
      <th class="th-sm">Username
      </th>
      <th class="th-sm">Perfil
      </th>
      <th style="width:40px" class="th-sm">Acciones
      </th>
    </tr>
  </thead>
                <tbody>
                 
                 <?php
                  foreach ($usuarios as $user) {
                    
                    ?>
                    <tr >
                      
                      <td ><?=$user['UsNombre']?> <?=$user['UsApellidos']?> </td>
                      <td ><?=$user['UsUsername']?></td>
                      <td ><?=$user['PerNombre']?></td>
                      <td >
                     
                      <?php
            $u=$this->session->userdata('UsId');  
            $tp=$this->session->userdata('tipoPerfil');?>
           
           <?php if($tp==1){?> 
              
             

                <?php if($user['UsId']==$u){?> 
                <a type="button" class="btn btn-warning btn-rounded btn-sm px-2 editUser" data-id="<?=$user['UsId']?>"><i class="fas fa-user-edit"></i></a>
  
           <?php } else { ?>
            <a type="button" class="btn btn-danger btn-rounded btn-sm px-2 delUser" data-id="<?=$user['UsId']?>"><i class="fas fa-user-times"></i></a>
            <a type="button" class="btn btn-warning btn-rounded btn-sm px-2 editUser" data-id="<?=$user['UsId']?>"><i class="fas fa-user-edit"></i></a>
            <?php } ?>

            <?php } else {?> 
              <?php if($user['UsIdPerfil']==1){?> 
                <?php } else {?> 
                  <?php if($user['UsId']==$u){?> 
                <a type="button" class="btn btn-warning btn-rounded btn-sm px-2 editUser" data-id="<?=$user['UsId']?>"><i class="fas fa-user-edit"></i></a>
  
           <?php } else { ?>
            <a type="button" class="btn btn-danger btn-rounded btn-sm px-2 delUser" data-id="<?=$user['UsId']?>"><i class="fas fa-user-times"></i></a>
            <a type="button" class="btn btn-warning btn-rounded btn-sm px-2 editUser" data-id="<?=$user['UsId']?>"><i class="fas fa-user-edit"></i></a>
            <?php } ?>
                <?php } ?>

            <?php } ?>         
                      </td>

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
    
  



    
              </div>
    
    
          </div>
          <!--Grid row-->
    
      </div>
      <!--Panel content-->


  </div>
  </div>
