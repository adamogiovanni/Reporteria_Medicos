 
<!DOCTYPE html>  
<html>  
    <head>  
        <title>Reporte</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

          var data = google.visualization.arrayToDataTable([
     ['Fecha', 'monto'],
     <?php
     foreach($grafico as $row)
     {
      echo "['".$row["Fecha"]."', ".$row["monto"]."],";
     }
     ?>
    ]);

      var options = {
        bar: {groupWidth: '50%'},
         'legend':'left',
  'title':'Nombre Usuario',
      };

      var chart_div = document.getElementById('chart_div');
      var chart = new google.visualization.ColumnChart(chart_div);

      // Wait for the chart to finish drawing before calling the getImageURI() method.
      google.visualization.events.addListener(chart, 'ready', function () {
        chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
        console.log(chart_div.innerHTML);
      });

      chart.draw(data, options);

  }
  </script>
<style>
  
html {
margin: 0;
}
body {
font-family: "Times New Roman", serif;
margin: 45mm 8mm 2mm 8mm;
}

</style>
 
    </head>  
    <body>  

<div class="containes-fluid">
  <div class="row">
    <div class="float-left" >
        <div align="left">
   <form method="post" id="make_pdf" action="<?php echo base_url();?>rdocumento/descargar">
    <input type="hidden" name="hidden_html" id="hidden_html" />
    <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">Crear PDF</button>
   </form>
  </div>
    </div>

  </div>
  
</div>

<div class="row" id="testing">
  <div class="col-md-12 text-center">
    <h1>Reporte Clinica</h1>

  </div>
  <div class="col-md-4 col-md-offset-4">

  </div>
  <div class="clearfix"></div>
  <div class="col-md-7">
    <div id="chart_div" class="chart"></div>
  </div>
  <div class="col-md-12">
    <table class="table">
      <thead>
    <tr>

      <th >Id Caso
      </th>
      <th >Comprobante Prov.
      </th>
      <th >Comprobante Dev.
      </th>
      <th >Descripcion
      </th>
      <th >Debe
      </th>
      <th >Haber
      </th>
      <th >Monto
      </th>
      <th >Nro. Comprobante
      </th>
      <th >Fecha Comprobante
      </th>
      <th >Fecha Pago DEV
      </th>
      <th >Fecha Prov.
      </th>
      <th >Estado
      </th>

    </tr>
  </thead>
  <tbody>
    

       <?php
     foreach($prueba as $row)
     {
      ?>
<tr>
       <td > <?=$row["IdProceso"]?> </td>
       <td > <?=$row["CPROV"]?> </td>
       <td > <?=$row["CDEV"]?> </td>
       <td > <?=$row["DescripcionMovimiento"]?> </td>
       <td > <?=$row["Debe"]?> </td>
       <td > <?=$row["Haber"]?> </td>
       <td > <?=$row["MontoDocumento"]?> </td>
       <td > <?=$row["NroComprobante"]?> </td>
       <td > <?=$row["FechaComprobante"]?> </td>
       <td > <?=$row["FECHPAGODEV"]?> </td>
       <td > <?=$row["FECHPROV"]?> </td>
       <td > <?=$row["CodigoEstado"]?> </td>




</tr>
     <?php
      }
     ?>

    
 
  </tbody>

    </table>
  </div>

</div>




  <br />

  <br />
  <br />
  <br />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>  
</html>

<script>
$(document).ready(function(){
 $('#create_pdf').click(function(){
  $('#hidden_html').val($('#testing').html());
  $('#make_pdf').submit();
 });
});
</script>
