$(document).ready(function() {

var table = $('#example').DataTable( {
    buttons: [
      { extend: 'colvis', text: 'Columnasss' },{ extend: 'excel', text: 'excel',footer: true,exportOptions:{columns: ':visible:not(.not-export-col)' } },{extend: 'copyHtml5',exportOptions:{columns: [ 0, ':visible' ]}, text: 'Copiar Contenido'},  {extend: 'pdfHtml5',footer: true,exportOptions: {columns: ':visible:not(.not-export-col)' }},{ extend: 'print',footer: true, text: 'Imprimir',exportOptions: {columns: ':visible:not(.not-export-col)' } }
    ]
} );
  
table.buttons().container()
    .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );


} );