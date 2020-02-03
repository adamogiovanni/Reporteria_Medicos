$(document).ready(function () {


    $('body').on('click', '#btnNewUser', function () {

        $.ajax({
            url: base_url + 'usuario/addHtml',
            data: {},
            type: 'POST',
            // dataType: "json",
            success: function (html) {
        
                $(".modal-body").html(html);
                $(".modal-footer").html("");
                $("#Modal").modal("show");
            }
        });

    });


    $('body').on('submit', '#formNewUser', function () {
        $(".modal-body").html("<center>Cargando..</center>");

        $.ajax({
            url: base_url + 'usuario/addUser',
            data: $(this).serialize(),
            type: 'POST',
            // dataType: "json",
            success: function (data) {
                var obj = $.parseJSON(data);
                if(obj['roll'] == 'exito'){
                    $('#Modal').modal('hide');
                    toastr.success(
                        obj['mensaje'],
                        'Exitoso',
                        {
                          timeOut: 1000,
                          fadeOut: 1000,
                          onHidden: function () {
                              window.location.reload();
                            }
                        }
                      );

                    }
                    else
                    {               
                        $('#Modal').modal('hide');                
                        toastr.error(
                            obj['mensaje'],
                            'Error',
                            {
                              timeOut: 1000,
                              fadeOut: 1000,
                              onHidden: function () {
                                  window.location.reload();
                                }
                            }
                          );
                    }
            }
        });

        return false;
    });

    $('body').on('click', '.editUser', function () {
        var id = $(this).data('id');
        $.ajax({
            url: base_url + 'usuario/addHtml/' + id,
            data: {},
            type: 'POST',
            // dataType: "json",
            success: function (html) {
                $(".modal-header").html('<span class="text-right" style="font-size:17px"><i class="ffa fa-pencil" aria-hidden="true"></i> Editar Usuario</span><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font color="#FF0000"><i class="fa fa-times" aria-hidden="true"></i></font></span></button><br>');
                $(".modal-body").html(html);
                $(".modal-footer").html("");
                $("#Modal").modal("show");
            }
        });

    });
    $('body').on('submit', '#formEditUser', function () {
        $(".modal-body").html("<center>Cargando..</center>");
        $.ajax({
            url: base_url + 'usuario/ModUser',
            data: $(this).serialize(),
            type: 'POST',
            // dataType: "json",
            success: function (data) {
                var obj = $.parseJSON(data);
                if(obj['roll'] == 'exito'){
                    $('#Modal').modal('hide');
                    toastr.success(
                        obj['mensaje'],
                        'Exitoso',
                        {
                          timeOut: 1000,
                          fadeOut: 1000,
                          onHidden: function () {
                              window.location.reload();
                            }
                        }
                      );

                    }
                    else
                    {               
                        $('#Modal').modal('hide');                
                        toastr.error(
                            obj['mensaje'],
                            'Error',
                            {
                              timeOut: 1000,
                              fadeOut: 1000,
                              onHidden: function () {
                                  window.location.reload();
                                }
                            }
                          );
                    }
            }
        });

        return false;
    });

    $('body').on('click', '.delUser', function () {
        var id = $(this).data('id');

        $(".modal-header-mini").html('<span class="text-right" style="font-size:17px"><i class="ffa fa-pencil" aria-hidden="true"></i> Confirmacion</span><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font color="#FF0000"><i class="fa fa-times" aria-hidden="true"></i></font></span></button><br>');
        $(".modal-body-mini").html("<center>¿Estás seguro de eliminar este usuario?</center>");
        $(".modal-footer-mini").html("<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button> <a href='#' id='confirmarBorrar' data-id='" + id + "' class='btn btn-danger'>Si, eliminar</a>");
        $("#ModalMini").modal("show");
    });



    $('body').on('click', '#confirmarBorrar', function () {
        var id = $(this).data('id');
        $.ajax({
            url: base_url + 'usuario/delUser/'+id,
            data: $(this).serialize(),
            type: 'POST',
            // dataType: "json",
            success: function (data) {
                var obj = $.parseJSON(data);
                if(obj['roll'] == 'exito'){
                    $('#Modal').modal('hide');
                    toastr.success(
                        obj['mensaje'],
                        'Exitoso',
                        {
                          timeOut: 1000,
                          fadeOut: 1000,
                          onHidden: function () {
                              window.location.reload();
                            }
                        }
                      );

                    }
                    else
                    {               
                        $('#Modal').modal('hide');                
                        toastr.error(
                            obj['mensaje'],
                            'Error',
                            {
                              timeOut: 1000,
                              fadeOut: 1000,
                              onHidden: function () {
                                  window.location.reload();
                                }
                            }
                          );
                    }
            }
        });

    });


    $('body').on('click', '.editOpciones', function () {
        var ajax_data={
       "id" : $(this).data('id'),
       "opcion" : 'opciones'
       }

       $.ajax({
           url: base_url + 'usuarios/addHtml/',
           data: ajax_data,
           type: 'POST',
           // dataType: "json",
           success: function (html) {
               $(".modal-header").html('<span class="text-right" style="font-size:17px"><i class="ffa fa-pencil" aria-hidden="true"></i> Editar Usuario</span><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font color="#FF0000"><i class="fa fa-times" aria-hidden="true"></i></font></span></button><br>');
               $(".modal-body").html(html);
               $(".modal-footer").html("");
               $("#Modal").modal("show");
           }
       });

   });

   $('body').on('click', '.editCuenta', function () {
    var ajax_data={
        "id" : $(this).data('id'),
        "opcion" : 'cuenta'
        }
    $.ajax({
        url: base_url + 'usuario/cuenta/',
        data: ajax_data,
        type: 'POST',
        // dataType: "json",
        success: function (html) {
            $(".modal-header").html('<span class="text-right" style="font-size:17px"><i class="ffa fa-pencil" aria-hidden="true"></i> Editar Usuario</span><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font color="#FF0000"><i class="fa fa-times" aria-hidden="true"></i></font></span></button><br>');
            $(".modal-body").html(html);
            $(".modal-footer").html("");
            $("#ModalLG").modal("show");
        }
    });

});



$('body').on('submit', '#formContacto', function () {     
    
    $(".modal-body").html("<center>Cargando..</center>");

        $.ajax({
                url : base_url + 'principal/enviaMail',
                data        : $(this).serialize() ,
                type        : 'POST',
            success: function (data) {
                var obj = $.parseJSON(data);
                if(obj['roll'] == 'exito'){
                    $('#ModalContacto').modal('hide');
                    toastr.success(
                        'Correo Enviado',
                        'Exitoso',
                        {
                          timeOut: 1000,
                          fadeOut: 1000,
                          onHidden: function () {
                              window.location.reload();
                            }
                        }
                      );

                    }
                    else
                    {               
                        $('#ModalContacto').modal('hide');                
                        toastr.error(
                            'Error en formulario',
                            'Error',
                            {
                              timeOut: 1000,
                              fadeOut: 1000,
                              onHidden: function () {
                                  window.location.reload();
                                }
                            }
                          );
                    }
                
           
            },
            error: function(){
                alert("Please Try Again");
            }  
        
        });
        return false;
});

}); //fin funcion ready


// $('body').on('submit', '#formContacto', function () {
//     $(".modal-body").html("<center>Cargando..</center>");

//     $.ajax({
//         url: base_url + 'principal/enviaMail',
//         data: $(this).serialize(),
//         type: 'POST',
//         // dataType: "json",
//         success: function (html) {
//             $('#ModalContacto').modal('hide');
//             Command: toastr["success"]("Correo Enviado!")

//             toastr.options = {
//               "closeButton": false,
//               "debug": false,
//               "newestOnTop": false,
//               "progressBar": false,
//               "positionClass": "md-toast-top-right",
//               "preventDuplicates": false,
//               "onclick": null,
//               "showDuration": 300,
//               "hideDuration": 1000,
//               "timeOut": 5000,
//               "extendedTimeOut": 1000,
//               "showEasing": "swing",
//               "hideEasing": "linear",
//               "showMethod": "fadeIn",
//               "hideMethod": "fadeOut"
//             }
                

//         }
//     });

//     return false;
// });