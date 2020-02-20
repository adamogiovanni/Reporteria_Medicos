$(document).ready(function(){
  $('#birth-date').mask('00/00/0000');
  $('#phone-number').mask('0000-0000');
 })


//Al presionar el boton Buscar doctor con id,nombre y clase btnfiltro se ejecuta esta funcion
$(document).ready(function(){
$(document).on('click', '.btnfiltro', function(){
    
//primero guardamos en la variable rutdoctor el valor del elemento con id RutSelectDoctor
//en este caso el input
var rutdoctor=$('#RutSelectDoctor').val();


//Aqui la magia, se le agrega la propiedad id al input dentro de el filtro 
//en la tabla devengo (este nombre lo asigna directamente datatable) y luego se le indica el nombre que quiere llevar
//con la finalidad de poder manipularlo mas tarde.

$("#devengo_filter input").prop( 'id', 'idfiltrodevengo' );
//Aqui se le asigna el valor de la variable guardada al id del input search en el datatable
$('#idfiltrodevengo').val(rutdoctor);
//y como la funcion del input se activa es con un keypress tenemos que simular que una tecla se preciono y levante y se usa esta funcion.
$('#idfiltrodevengo').keyup();


//y asi con los demas logrande que se filtre en las 3 tablas.

$("#example_filter input").prop( 'id', 'idfiltroprovision' );
$('#idfiltroprovision').val(rutdoctor);
$('#idfiltroprovision').keyup();

$("#pago_filter input").prop( 'id', 'idfiltropago' );
$('#idfiltropago').val(rutdoctor);
$('#idfiltropago').keyup();

});
});


var formatNumber = {
 separador: ".", // separador para los miles
 sepDecimal: ',', // separador para los decimales
 formatear:function (num){
 num +='';
 var splitStr = num.split('.');
 var splitLeft = splitStr[0];
 var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
 var regx = /(\d+)(\d{3})/;
 while (regx.test(splitLeft)) {
 splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
 }
 return this.simbol + splitLeft +splitRight;
 },
 new:function(num, simbol){
 this.simbol = simbol ||'';
 return this.formatear(num);
 }
}