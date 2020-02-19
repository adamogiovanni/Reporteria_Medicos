$(document).ready(function(){
  $('#birth-date').mask('00/00/0000');
  $('#phone-number').mask('0000-0000');
 })

$(document).ready(function(){
$(document).on('click', '.btnfiltro', function(){
    
var rutdoctor=$('#RutSelectDoctor').val();


$("#devengo_filter input").prop( 'id', 'IDPRUEBA' );

$('#IDPRUEBA').val(rutdoctor);
document.getElementById("IDPRUEBA").click();


});
});