

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
      
      <!-- Si se quiere controlar que solo permita numero se puede usar la linea de abajo, pero no permitira la K tampoco.-->
      <!-- onkeypress='return event.charCode >= 48 && event.charCode <= 57' -->
      <input class="form-control" placeholder="Rut Doctor" type="text" id="RutSelectDoctor" name="RutSelectDoctor">

      <button class="btn btn-primary btnfiltro" name="btnfiltro" id="btnfiltro"> Buscar Doctor  </button>
      
    </div>
    <?php 
  } 
?>



<div class="container-fluid">

        
<!--Accordion wrapper-->
<div class="accordion md-accordion accordion-blocks" id="accordionEx78" role="tablist" aria-multiselectable="true">
  <div class="card">
    <!-- Card header -->
    <div class="card-header" role="tab" id="headingUnfiled">

      <a data-toggle="collapse" data-parent="#accordionEx78" href="#collapseUnfiled" aria-expanded="true"
        aria-controls="collapseUnfiled">
        <h5 class="mt-1 mb-0">
          <span>Provision</span>
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
                <th>Nombre Estado</th>
                <th>Nro. Comprobante</th>      
                <th>Fecha Comprobante</th>
                <th>Rut Profesional</th>
                <th>Observación</th>
                <th>Valor Neto</th>                     
              </tr>
            </thead>

            <tfooter>
              <tr>
                <th>Empresa</th>
                <th>Caso</th>                
                <th>Nombre Estado</th>
                <th>Nro. Comprobante</th>      
                <th>Fecha Comprobante</th>
                <th>Rut Profesional</th>
                <th>Observación</th> 
                <th>Valor Neto</th>
              </tr>
            </tfooter>
            <tfoot>
              <tr>
                <th colspan="7" style="text-align:right">Total Pagina:</th>
                <th></th>
              </tr>
              <tr>
                <th colspan="7" style="text-align:right">Total General:</th>
                <th></th>
              </tr>
            </tfoot>
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
                       <th>ID</th>-->
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
                       <th>ID</th>
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

$(document).ready(function() 
  {

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
      url:'rdocumento/consultaprovision',
      type: 'POST'
    },
    

    //Calculo de Total
    //Inicio
    "footerCallback": function ( row, data, start, end, display ) 
    {
      var api = this.api(), data;

      // Remove the formatting to get integer data for summation
      var intVal = function ( i ) {
          return typeof i === 'string' ?
              i.replace(/[\$,]/g, '')*1 :
              typeof i === 'number' ?
                  i : 0;
      };

      // Total over all pages
      total = api
          .column(7)
          .data()
          .reduce( function (a, b) {
             return intVal(a) + intVal(b);
          }, 0 );

      // Total over this page
      pageTotal = api
          .column(7, { page: 'current'} )
          .data()
          .reduce( function (a, b) {
              return intVal(a) + intVal(b);
          }, 0 );


      // Update footer
      //$( api.column( 7 ).footer() ).html(('$'+pageTotal));//'$'+ pageTotal +'( $'+ total +' total)');

      //var numFormat = $.fn.dataTable.render.number( '\.', ',', 2, ' $ ' ).display;
      
      $('tr:eq(0) th:eq(1)', api.table().footer()).html(pageTotal);
      $('tr:eq(1) th:eq(1)', api.table().footer()).html(total);


    },
    //Final

   
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

    });
  });



  $(document).ready( function () {

   $('.datepicker').pickadate({
          today: '',
          format: 'yyyy-mm-dd',
          formatSubmit: 'yyyy-mm-dd',
          clear: 'Clear selection',
          close: 'Cancel'})
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

"footerCallback": function ( row, data, start, end, display ) 
{
  var api = this.api(), data;

  // Remove the formatting to get integer data for summation
  var intVal = function ( i ) {
      return typeof i === 'string' ?
          i.replace(/[\$,]/g, '')*1 :
          typeof i === 'number' ?
              i : 0;
  };

  // Total over all pages
  total = api
      .column( 7 )
      .data()
      .reduce( function (a, b) {
          return intVal(a) + intVal(b);
      }, 0 );

  // Total over this page
  pageTotal = api
      .column( 7, { page: 'current'} )
      .data()
      .reduce( function (a, b) {
          return intVal(a) + intVal(b);
      }, 0 );

  // Update footer
  $( api.column( 7 ).footer() ).html(
      '$'+ pageTotal +' ( $'+ total +' total)'
  );
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
                extend: 'pdfHtml5',
                text: 'PDF',
                orientation: 'landscape',
                title: 'NCMH',
                filename: 'NCMH',
                customize: function ( doc ) {
                // Splice the image in after the header, but before the table
                doc.content.splice( 1, 0, {
                    margin: [ 0, 0, 0, 12 ],
                    alignment: 'center',
                    image: 'data:image/jpeg;base64,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'
                } );
                // Data URL generated by http://dataurl.net/#dataurlmaker
                }
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
  
 

