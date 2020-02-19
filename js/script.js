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

function formateaRutDoctor(rut) {
    
    var actual = rut.replace(/^0+/, "");
    
    if (actual != '' && actual.length > 1) {
        var sinPuntos = actual.replace(/\./g, "");
        var actualLimpio = sinPuntos.replace(/-/g, "");
        var inicio = actualLimpio.substring(0, actualLimpio.length - 1);
        var rutPuntos = "";
        var i = 0;
        var j = 1;
        for (i = inicio.length - 1; i >= 0; i--) {
            var letra = inicio.charAt(i);
            rutPuntos = letra + rutPuntos;
            if (j % 3 == 0 && j <= inicio.length - 1) {
                rutPuntos = "." + rutPuntos;
            }
            j++;
        }
        var dv = actualLimpio.substring(actualLimpio.length - 1);
        rutPuntos = rutPuntos + "-" + dv;
    }
    
    $('#RutSelectDoctor').val(rutPuntos);
}