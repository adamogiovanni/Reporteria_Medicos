

<div class="container">
    <div class="row">
        <div clasS="col">
            <canvas id="lineChart"></canvas>
        </div>
        <div clasS="col">

             <canvas id="barChart"></canvas>
        </div>
    </div>
</div>

<hr><!--
<div class="container">
    <div class="row">
        <div clasS="col">
              <div id="chartContainer" style="height: 300px; width: 100%;"></div>
<button class="btn invisible" id="backButton">< Back</button>
        </div>
    </div>
</div>

<hr> -->

<!--   <a type="button" target="_blank" href="<?php echo base_url();?>rdocumento/probando" class="btn btn-danger">Reporte Completo</a>

 -->
<?php $UsIdPerfil = $this->session->userdata('UsIdPerfil');
        if($UsIdPerfil==2){?>
        <div class="container">
<?=form_open(base_url()."rdocumento")?>
<select id="xxx" name="xxx" class="mdb-select md-form" >
  <option value="" disabled selected>Buscar por Rut</option>
        <?php foreach ($consultaRutDoctor as $doc) { ?>                
                <option value="<?=$doc['RutCliente']?>"  ><?=$doc['RutCliente']?></option>';
                <?php } ?>
</select>

  <button class="btn btn-primary"> Buscar Doctor </button>
<?=form_close()?>
 
 </div>
<?php } ?>



<div class="container-fluid">

        
<!--Accordion wrapper-->
<div class="accordion md-accordion accordion-blocks" id="accordionEx78" role="tablist" aria-multiselectable="true">
<div class="card">
    <!-- Card header -->
    <div class="card-header" role="tab" id="headingUnfiled">

      <a data-toggle="collapse" data-parent="#accordionEx78" href="#collapseUnfiled" aria-expanded="true"
        aria-controls="collapseUnfiled">
        <h5 class="mt-1 mb-0">
          <span>Provision Prueba</span>
          <i class="fas fa-angle-down rotate-icon"></i>
        </h5>
      </a>
    </div>

    <!-- Card body -->
    <div id="collapseUnfiled" class="collapse" role="tabpanel" aria-labelledby="headingUnfiled" data-parent="#accordionEx78">
    <div class="card-body">
    <div class="row">
        <div class="col">
            <div class="md-form">
              <input placeholder="Seleccione Fecha" type="text" id="min" name="min" class="form-control datepicker">
              <label for="date-picker-example">Inicio</label>
            </div>
        </div>
        <div class="col">
                 <div class="md-form">
                     <input placeholder="Seleccione Fecha" type="text" id="max" name="max" class="form-control datepicker">
                      <label for="date-picker-example">Final</label>
                 </div>
        </div>   
        <div class="form-group">
                          <div class="input-group date">
                            <button type="button" class="btn btn-warning btn-md btn-search" name = "search" id="search">Buscar</button> 
                          </div>
                          <!-- /.input group -->
        </div>     
    </div>
        <!-- Table responsive wrapper -->
    <div class="table-responsive mx-3">
          <!--Table-->
          <table  id="example" class="table table-hover mb-0">

                  <thead>
                    <tr>
                      <th>Empresa</th>
                      <th>Caso</th>
                      <th>Valor Neto</th>
                      <th>Nombre Estado</th>
                      <th>Nro. Comprobante</th>      
                      <th>Fecha Comprobante</th>
                      <th>Rut Profesional</th>
                      <th>Observación</th>                     
                    </tr>
                  </thead>

                  <tfooter>
                    <tr>
                      <th>Empresa</th>
                      <th>Caso</th>
                      <th>Valor Neto</th>
                      <th>Nombre Estado</th>
                      <th>Nro. Comprobante</th>      
                      <th>Fecha Comprobante</th>
                      <th>Rut Profesional</th>
                      <th>Observación</th> 
                    </tr>
                  </tfooter>
          </table>
    </div>
    </div>
    </div>
</div>

</div>

<div class="accordion md-accordion accordion-blocks" id="accordionEx79" role="tablist" aria-multiselectable="true">
<div class="card">
    <!-- Card header -->
    <div class="card-header" role="tab" id="aaa">

      <a data-toggle="collapse" data-parent="#accordionEx79" href="#qq" aria-expanded="true"
        aria-controls="qq">
        <h5 class="mt-1 mb-0">
          <span>Devengo</span>
          <i class="fas fa-angle-down rotate-icon"></i>
        </h5>
      </a>
    </div>

    <!-- Card body -->
    <div id="qq" class="collapse" role="tabpanel" aria-labelledby="aaa" data-parent="#accordionEx79">
    <div class="card-body">
    <div class="row">
        <div class="col">
            <div class="md-form">
              <input placeholder="Seleccione Fecha" type="text" id="mindevengo" name="mindevengo" class="form-control fechadevengo">
              <label for="date-picker-example">Inicio</label>
            </div>
        </div>
        <div class="col">
                 <div class="md-form">
                     <input placeholder="Seleccione Fecha" type="text" id="maxdevengo" name="maxdevengo" class="form-control fechadevengo">
                      <label for="date-picker-example">Final</label>
                 </div>
        </div>   
        <div class="form-group">
                          <div class="input-group date">
                            <button type="button" class="btn btn-warning btn-md btn-search" name = "bfechadevengo" id="bfechadevengo">Buscar</button> 
                          </div>
                          <!-- /.input group -->
        </div>     
    </div>
        <!-- Table responsive wrapper -->
    <div class="table-responsive mx-3">
          <!--Table-->
          <table  id="devengo" class="table table-hover mb-0">

                  <thead>
                    <tr>
                      <th>Empresa</th>
                      <!-- <th>ID</th>-->
                      <th>Tipo Documento</th>
                      <th>Valor Neto</th>
                      <th>Valor Retencion</th>                      
                      <th>Nombre Estado</th>
                      <th>Nro. Comprobante</th>         
                      <th>Fecha Comprobante</th> 
                      <th>Observación</th>
                      <th>Rut Profesional</th>  
                    </tr>
                  </thead>

                  <tfooter>
                    <tr>
                      <th>Empresa</th>
                       <!-- <th>ID</th>-->
                      <th>Tipo Documento</th>
                      <th>Valor Neto</th>
                      <th>Valor Retencion</th>                         
                      <th>Nombre Estado</th>
                      <th>Nro. Comprobante</th>         
                      <th>Fecha Comprobante</th> 
                      <th>Observación</th>
                      <th>Rut Profesional</th>                   
                    </tr>
                  </tfooter>
          </table>
    </div>
    </div>
    </div>
</div>

</div>

<div class="accordion md-accordion accordion-blocks" id="accordionEx55" role="tablist" aria-multiselectable="true">
<div class="card">
    <!-- Card header -->
    <div class="card-header" role="tab" id="bbb">

      <a data-toggle="collapse" data-parent="#accordionEx79" href="#xx" aria-expanded="true"
        aria-controls="xx">
        <h5 class="mt-1 mb-0">
          <span>Pago</span>
          <i class="fas fa-angle-down rotate-icon"></i>
        </h5>
      </a>
    </div>

    <!-- Card body -->
    <div id="xx" class="collapse" role="tabpanel" aria-labelledby="bbb" data-parent="#accordionEx55">
    <div class="card-body">
    <div class="row">
        <div class="col">
            <div class="md-form">
              <input placeholder="Seleccione Fecha" type="text" id="minpago" name="minpago" class="form-control fechapago">
              <label for="date-picker-example">Inicio</label>
            </div>
        </div>
        <div class="col">
                 <div class="md-form">
                     <input placeholder="Seleccione Fecha" type="text" id="maxpago" name="maxpago" class="form-control fechapago">
                      <label for="date-picker-example">Final</label>
                 </div>
        </div>   
        <div class="form-group">
                          <div class="input-group date">
                            <button type="button" class="btn btn-warning btn-md btn-search" name = "bfechapago" id="bfechapago">Buscar</button> 
                          </div>
                          <!-- /.input group -->
        </div>     
    </div>
        <!-- Table responsive wrapper -->
    <div class="table-responsive mx-3">
          <!--Table-->
          <table  id="pago" class="table table-hover mb-0">

                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Empresa</th>
                      <th>Correlativo</th>
                      <th>Fecha_Proceso</th>                     
                      <th>Nro. Documento</th>
                      <th>Valor Neto</th>
                      <th>Nro. Comprobante</th>        
                      <th>Fecha Comprobante</th>     
                      <th>Fecha Proceso</th>
                       <th>Rut Funcionario</th>
                    </tr>
                  </thead>

                  <tfooter>
                    <tr>

                      <th>ID</th>
                      <th>Empresa</th>
                      <th>Correlativo</th>
                      <th>Fecha_Proceso</th>                     
                      <th>Nro. Documento</th>
                      <th>Valor Neto</th>
                      <th>Nro. Comprobante</th>        
                      <th>Fecha Comprobante</th>     
                      <th>Fecha Proceso</th>
                       <th>Rut Funcionario</th>
                    </tr>
                  </tfooter>
          </table>
    </div>
    </div>
    </div>
</div>

</div>

</div>

<script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->

  <!-- MDB core JavaScript -->
  <script  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  

 <script type="text/javascript">


$('#search').click(function(){

var min = $('#min').val();
var max = $('#max').val();

 var parametros = {
                "min" : min,
                "max" : max};

if(min != '' && max ){
   var table = $('#example').DataTable();
    table.destroy();
$('#example').dataTable( {
language: {
      processing: "<i class='fa fa-spinner fa-5x fa-spin fa-fw' aria-hidden='true'></i>",
      search: "<i class='fa fa-search' aria-hidden='true'></i>",
      lengthMenu:     "Mostrando _MENU_ casos",
      info:           "Mostrando del _START_ al _END_ de _TOTAL_ casos",
      infoEmpty:      "Mostrando 0 al 0 de 0 coincidencias",
      infoFiltered: "(filtrado de un total de _MAX_ elementos)",
      infoPostFix: "",
      loadingRecords: "<i class='fa fa-spinner fa-5x fa-spin fa-fw' aria-hidden='true'></i>",
      zeroRecords: "No se encontraron coincidencias",
      emptyTable: "No hay datos para mostrar",
      paginate: {
        first: "<i class='fa fa-fast-backward fa-lg' aria-hidden='true'></i>",
        previous: "<i class='fa fa-backward fa-lg' aria-hidden='true'></i>",
        next: "<i class='fa fa-forward fa-lg' aria-hidden='true'></i>",
        last: "<i class='fa fa-fast-forward fa-lg' aria-hidden='true'></i>"

      }
      //,
      //aria: {
      //    sortAscending: ": activate to sort column ascending",
      //    sortDescending: ": activate to sort column descending"
      //}
    }
  ,"ajax": {
    data:parametros,
    url:'rdocumento/consultarango',
    type: 'POST'
  },
  dom: 'Bfrtip',
  buttons: [
            'copy', {
                extend: 'excel',
                text: 'Excel',
                title: 'NCMH',
                filename: 'NCMH',
            }, {
                extend: 'pdf',
                text: 'PDF',
                orientation: 'landscape',
                title: 'NCMH',
                filename: 'NCMH',
                
            }, {
                extend: 'print',
                text: 'Imprimir',
                title: 'NCMH',
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                },
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
            }
        ],
               "dom": '<"dt-buttons"Bf><"clear">lirtp',
            "paging": true,
            "autoWidth": true
} );

}else{
    alert('Both Date is Required and Choose what to show!');
}

});




$(document).ready(function() {

var min = 0;
var max = 0;

 var parametros = {
                "min" : min,
                "max" : max};

$('#example').dataTable( {

language: {
      processing: "<i class='fa fa-spinner fa-5x fa-spin fa-fw' aria-hidden='true'></i>",
      search: "<i class='fa fa-search' aria-hidden='true'></i>",
      lengthMenu:     "Mostrando _MENU_ casos",
      info:           "Mostrando del _START_ al _END_ de _TOTAL_ casos",
      infoEmpty:      "Mostrando 0 al 0 de 0 coincidencias",
      infoFiltered: "(filtrado de un total de _MAX_ elementos)",
      infoPostFix: "",
      loadingRecords: "<i class='fa fa-spinner fa-5x fa-spin fa-fw' aria-hidden='true'></i>",
      zeroRecords: "No se encontraron coincidencias",
      emptyTable: "No hay datos para mostrar",
      paginate: {
        first: "<i class='fa fa-fast-backward fa-lg' aria-hidden='true'></i>",
        previous: "<i class='fa fa-backward fa-lg' aria-hidden='true'></i>",
        next: "<i class='fa fa-forward fa-lg' aria-hidden='true'></i>",
        last: "<i class='fa fa-fast-forward fa-lg' aria-hidden='true'></i>",
      }
      //,
      //aria: {
      //    sortAscending: ": activate to sort column ascending",
      //    sortDescending: ": activate to sort column descending"
      //}
    }
  ,"ajax": {
    data:parametros,
    url:'rdocumento/consultarango',
    type: 'POST'
  },
  dom: 'Bfrtip',
  lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 Datos', '25 Datos', '50 Datos', 'Todos' ]
        ],
 buttons: [
            'pageLength', 

                    {
            extend: 'copy',
            text: 'Copiar',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        },
            { extend: 'colvis', text: 'Columnas' }, 
            {
                extend: 'excel',
                text: 'Excel',
                title: 'NCMH',
                filename: 'NCMH',
            }, {
                extend: 'pdf',
                text: 'PDF',
                orientation: 'landscape',
                title: 'NCMH',
                filename: 'NCMH',
                
            }, {
                extend: 'print',
                text: 'Imprimir',
                title: 'NCMH',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://200.54.54.107/reporteria/imagenes/ncmh.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                messageTop: function () {
                        return 'Provisión';
                },
                messageBottom: null
            }
        ],

} );


});


  $(document).ready( function () {

   $('.datepicker').pickadate({
today: '',
format: 'yyyy-mm-dd',
formatSubmit: 'yyyy-mm-dd',
clear: 'Clear selection',
close: 'Cancel'
})

} );
 
  </script>

<script>
$(document).ready(function(){
 $('#create_pdf').click(function(){
  $('#hidden_html').val($('#testing').html());
  $('#make_pdf').submit();
 });
});
</script>


 <script type="text/javascript">

$('#bfechadevengo').click(function(){

var min = $('#mindevengo').val();
var max = $('#maxdevengo').val();

 var parametros = {
                "min" : min,
                "max" : max};

if(min != '' && max ){
   var table = $('#devengo').DataTable();
    table.destroy();
$('#devengo').dataTable( {
language: {
      processing: "<i class='fa fa-spinner fa-5x fa-spin fa-fw' aria-hidden='true'></i>",
      search: "<i class='fa fa-search' aria-hidden='true'></i>",
      lengthMenu:     "Mostrando _MENU_ casos",
      info:           "Mostrando del _START_ al _END_ de _TOTAL_ casos",
      infoEmpty:      "Mostrando 0 al 0 de 0 coincidencias",
      infoFiltered: "(filtrado de un total de _MAX_ elementos)",
      infoPostFix: "",
      loadingRecords: "<i class='fa fa-spinner fa-5x fa-spin fa-fw' aria-hidden='true'></i>",
      zeroRecords: "No se encontraron coincidencias",
      emptyTable: "No hay datos para mostrar",
      paginate: {
        first: "<i class='fa fa-fast-backward fa-lg' aria-hidden='true'></i>",
        previous: "<i class='fa fa-backward fa-lg' aria-hidden='true'></i>",
        next: "<i class='fa fa-forward fa-lg' aria-hidden='true'></i>",
        last: "<i class='fa fa-fast-forward fa-lg' aria-hidden='true'></i>"

      }
      //,
      //aria: {
      //    sortAscending: ": activate to sort column ascending",
      //    sortDescending: ": activate to sort column descending"
      //}
    }
  ,"ajax": {
    data:parametros,
    url:'rdocumento/consultadevengo',
    type: 'POST'
  },
  dom: 'Bfrtip',
  buttons: [
            'copy', {
                extend: 'excel',
                text: 'Excel',
                title: 'NCMH',
                filename: 'NCMH',
            }, {
                extend: 'pdf',
                text: 'PDF',
                orientation: 'landscape',
                title: 'NCMH',
                filename: 'NCMH',
            }, {
                extend: 'print',
                text: 'Imprimir',
                title: 'NCMH',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                messageTop: function () {
                        return 'Devengo';
                },
                messageBottom: null
            }
        ],
               "dom": '<"dt-buttons"Bf><"clear">lirtp',
            "paging": true,
            "autoWidth": true
} );

}else{
    alert('Both Date is Required and Choose what to show!');
}

});




$(document).ready(function() {

var min = 0;
var max = 0;

 var parametros = {
                "min" : min,
                "max" : max};

$('#devengo').dataTable( {

language: {
      processing: "<i class='fa fa-spinner fa-5x fa-spin fa-fw' aria-hidden='true'></i>",
      search: "<i class='fa fa-search' aria-hidden='true'></i>",
      lengthMenu:     "Mostrando _MENU_ casos",
      info:           "Mostrando del _START_ al _END_ de _TOTAL_ casos",
      infoEmpty:      "Mostrando 0 al 0 de 0 coincidencias",
      infoFiltered: "(filtrado de un total de _MAX_ elementos)",
      infoPostFix: "",
      loadingRecords: "<i class='fa fa-spinner fa-5x fa-spin fa-fw' aria-hidden='true'></i>",
      zeroRecords: "No se encontraron coincidencias",
      emptyTable: "No hay datos para mostrar",
      paginate: {
        first: "<i class='fa fa-fast-backward fa-lg' aria-hidden='true'></i>",
        previous: "<i class='fa fa-backward fa-lg' aria-hidden='true'></i>",
        next: "<i class='fa fa-forward fa-lg' aria-hidden='true'></i>",
        last: "<i class='fa fa-fast-forward fa-lg' aria-hidden='true'></i>",
      }
      //,
      //aria: {
      //    sortAscending: ": activate to sort column ascending",
      //    sortDescending: ": activate to sort column descending"
      //}
    }
  ,"ajax": {
    data:parametros,
    url:'rdocumento/consultadevengo',
    type: 'POST'
  },
  dom: 'Bfrtip',
  lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 Datos', '25 Datos', '50 Datos', 'Todos' ]
        ],
 buttons: [
            'pageLength', 

                    {
            extend: 'copy',
            text: 'Copiar',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        },
            { extend: 'colvis', text: 'Columnas' }, 
            {
                extend: 'excel',
                text: 'Excel',
                title: 'NCMH',
                filename: 'NCMH',
            }, {
                extend: 'pdf',
                text: 'PDF',
                orientation: 'landscape',
                title: 'NCMH',
                filename: 'NCMH',
            }, {
                extend: 'print',
                text: 'Imprimir',
                title: 'NCMH',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                messageTop: function () {
                        return 'Devengo';
                },
                messageBottom: null
            }
        ],
        "dom": '<"dt-buttons"Bf><"clear">lirtp',
            "paging": true,
            "autoWidth": true
} );


});


  $(document).ready( function () {

   $('.fechadevengo').pickadate({
today: '',
format: 'yyyy-mm-dd',
formatSubmit: 'yyyy-mm-dd',
clear: 'Clear selection',
close: 'Cancel'
})

} );
 
  </script>







 <script type="text/javascript">

$('#bfechapago').click(function(){

var min = $('#minpago').val();
var max = $('#maxpago').val();

 var parametros = {
                "min" : min,
                "max" : max};

if(min != '' && max ){
   var table = $('#pago').DataTable();
    table.destroy();
$('#pago').dataTable( {
language: {
      processing: "<i class='fa fa-spinner fa-5x fa-spin fa-fw' aria-hidden='true'></i>",
      search: "<i class='fa fa-search' aria-hidden='true'></i>",
      lengthMenu:     "Mostrando _MENU_ casos",
      info:           "Mostrando del _START_ al _END_ de _TOTAL_ casos",
      infoEmpty:      "Mostrando 0 al 0 de 0 coincidencias",
      infoFiltered: "(filtrado de un total de _MAX_ elementos)",
      infoPostFix: "",
      loadingRecords: "<i class='fa fa-spinner fa-5x fa-spin fa-fw' aria-hidden='true'></i>",
      zeroRecords: "No se encontraron coincidencias",
      emptyTable: "No hay datos para mostrar",
      paginate: {
        first: "<i class='fa fa-fast-backward fa-lg' aria-hidden='true'></i>",
        previous: "<i class='fa fa-backward fa-lg' aria-hidden='true'></i>",
        next: "<i class='fa fa-forward fa-lg' aria-hidden='true'></i>",
        last: "<i class='fa fa-fast-forward fa-lg' aria-hidden='true'></i>"

      }
      //,
      //aria: {
      //    sortAscending: ": activate to sort column ascending",
      //    sortDescending: ": activate to sort column descending"
      //}
    }
  ,"ajax": {
    data:parametros,
    url:'rdocumento/consultapago',
    type: 'POST'
  },
  dom: 'Bfrtip',
  buttons: [
            'copy', {
                extend: 'excel',
                text: 'Excel',
                title: 'NCMH',
                filename: 'NCMH',
            }, {
                extend: 'pdf',
                text: 'PDF',
                orientation: 'landscape',
                title: 'NCMH',
                filename: 'NCMH',
            }, {
                extend: 'print',
                text: 'Imprimir',
                title: 'NCMH',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                messageTop: function () {
                        return 'Pago';
                },
                messageBottom: null,
            }
        ],
               "dom": '<"dt-buttons"Bf><"clear">lirtp',
            "paging": true,
            "autoWidth": true
} );

}else{
    alert('Both Date is Required and Choose what to show!');
}

});




$(document).ready(function() {

var min = 0;
var max = 0;

 var parametros = {
                "min" : min,
                "max" : max};

$('#pago').dataTable( {

language: {
      processing: "<i class='fa fa-spinner fa-5x fa-spin fa-fw' aria-hidden='true'></i>",
      search: "<i class='fa fa-search' aria-hidden='true'></i>",
      lengthMenu:     "Mostrando _MENU_ casos",
      info:           "Mostrando del _START_ al _END_ de _TOTAL_ casos",
      infoEmpty:      "Mostrando 0 al 0 de 0 coincidencias",
      infoFiltered: "(filtrado de un total de _MAX_ elementos)",
      infoPostFix: "",
      loadingRecords: "<i class='fa fa-spinner fa-5x fa-spin fa-fw' aria-hidden='true'></i>",
      zeroRecords: "No se encontraron coincidencias",
      emptyTable: "No hay datos para mostrar",
      paginate: {
        first: "<i class='fa fa-fast-backward fa-lg' aria-hidden='true'></i>",
        previous: "<i class='fa fa-backward fa-lg' aria-hidden='true'></i>",
        next: "<i class='fa fa-forward fa-lg' aria-hidden='true'></i>",
        last: "<i class='fa fa-fast-forward fa-lg' aria-hidden='true'></i>",
      }
      //,
      //aria: {
      //    sortAscending: ": activate to sort column ascending",
      //    sortDescending: ": activate to sort column descending"
      //}
    }
  ,"ajax": {
    data:parametros,
    url:'rdocumento/consultapago',
    type: 'POST'
  },
  dom: 'Bfrtip',
  lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 Datos', '25 Datos', '50 Datos', 'Todos' ]
        ],
 buttons: [
            'pageLength', 

                    {
            extend: 'copy',
            text: 'Copiar',
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
        },
            { extend: 'colvis', text: 'Columnas' }, 
            {
                extend: 'excel',
                text: 'Excel',
                title: 'NCMH',
                filename: 'NCMH',
            }, {
                extend: 'pdf',
                text: 'PDF',
                orientation: 'landscape',
                title: 'NCMH',
                filename: 'NCMH',
            }, {
                extend: 'print',
                text: 'Imprimir',
                title: 'NCMH',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },
                messageTop: function () {
                        return 'Pago';
                },
                messageBottom: null,
            }
        ],
        "dom": '<"dt-buttons"Bf><"clear">lirtp',
            "paging": true,
            "autoWidth": true
} );


});


  $(document).ready( function () {

   $('.fechapago').pickadate({
today: '',
format: 'yyyy-mm-dd',
formatSubmit: 'yyyy-mm-dd',
clear: 'Clear selection',
close: 'Cancel'
})

} );
 
  </script>
  
  <script type="text/javascript">
$(document).ready(function() {
 $('.mdb-select').materialSelect();
});
</script>
  
 

