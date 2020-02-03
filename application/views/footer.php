</main>
<script>
  var base_url = "<?=base_url()?>";
</script>


<script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>jq-pro-master/js/mdb.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src='<?php echo base_url(); ?>js/usuarios.js'></script>
  <script type="text/javascript" src='<?php echo base_url(); ?>js/perfil.js'></script>
  <script type="text/javascript" src='<?php echo base_url(); ?>js/sucursales.js'></script>
  <script type="text/javascript" src='<?php echo base_url(); ?>js/empresas.js'></script>


  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>

  <script type="text/javascript">
$(".button-collapse").sideNav();
// SideNav Scrollbar Initialization
var sideNavScrollbar = document.querySelector('.custom-scrollbar');
Ps.initialize(sideNavScrollbar);
</script>
 <script type="text/javascript">
$(document).ready(function () {
$('#dtBasicExample').DataTable({
  "lengthMenu": [ [5,10, 25, 50, -1], [5,10, 25, 50, "All"] ]
}
);
$('.dataTables_length').addClass('bs-select');
});
</script>




<script type="text/javascript">


$(function () {
$('.material-tooltip-smaller').tooltip({
template: '<div class="tooltip md-tooltip"><div class="tooltip-arrow md-arrow"></div><div class="tooltip-inner md-inner"></div></div>'
});
})
</script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>

<script>
  //bar
  var ctxB = document.getElementById("barChart").getContext('2d');
  var myBarChart = new Chart(ctxB, {
    type: 'bar',
    data: {
      labels: [<?php
     foreach($graficoBarra as $row)
     {
      echo "'".$row["Fecha"]."',";
     }
     ?>],
      datasets: [{
        label: 'Devengo',
        data: [<?php
     foreach($graficoBarra as $row)
     {
      echo $row["monto"].",";
     }
     ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });

</script>
<script>
  //line
  var ctxL = document.getElementById("lineChart").getContext('2d');
  var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {



      labels: 
      [     <?php
     foreach($graficoLinea as $row)
     {
      echo "'".$row["Fecha"]."',";
     }
     ?>],
      datasets: [{
          label: "Provision",
          data: [
<?php
     foreach($graficoLinea as $row)
     {
      echo $row["monto"].",";
     }
     ?>],
          backgroundColor: [
            'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
            'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        }
      ]
    },
    options: {
      responsive: true
    }
  });

</script>


</body>

</html>