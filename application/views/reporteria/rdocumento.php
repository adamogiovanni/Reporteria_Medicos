

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
                    alignment: 'left',
                    image: 'data:image/png;base64,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'
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
  
 

