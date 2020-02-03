
  <div class="container">

<!--Section: Main panel-->
<section class="card card-cascade narrower mb-5">
<div class="row">
            <div class="col-md-5">
                <div class="view view-cascade info-color-dark narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                <a href="" class="white-text mx-3">EMPRESA</a>

<div>

<a type="button" id="btnNewEmpresa" class="btn-floating btn-success btn-sm"><i class="fas fa-city"></i></a>

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
        <th style="width:200px" class="th-sm">ID
        </th>
        <th class="th-sm">Nombre
        </th>
        <th class="th-sm">Rut
        </th>
        <th class="th-sm">Contacto
        </th>
        <th class="th-sm">Telefono
        </th>
        <th style="width:40px" class="th-sm">Acciones
        </th>
        </tr>
        </thead>
        <tbody>
       
        <?php
        foreach ($empresas as $emp) {
          
          ?>
          <tr >
          
           
           
           <td class="text-center">
           <h4><span class="badge badge-primary"><?=$emp['EmpId']?></span></h4>
            </td>
            <td > <?=$emp['EmpNombre']?> </td>
            <td > <?=$emp['EmpRut']?> </td>
            <td > <?=$emp['EmpContacto']?> </td>
            <td > <?=$emp['EmpTelefono']?> </td>
            <td class="text-center">
            
        
            <a type="button" class="btn btn-danger btn-rounded btn-sm px-2 delEmp" data-id="<?=$emp['EmpId']?>"><i class="far fa-trash-alt"></i></a>
            <a type="button" class="btn btn-warning btn-rounded btn-sm px-2 editEmp" data-id="<?=$emp['EmpId']?>"><i class="far fa-edit"></i></a>
           
          
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


           
    