$(document).ready(function () {


    $('body').on('click', '#btnNewEmpresa', function () {

        $.ajax({
            url: base_url + 'empresa/addHtml',
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

    
    $('body').on('submit', '#formNewEmp', function () {
        $(".modal-body").html("<center>Cargando..</center>");

        $.ajax({
            url: base_url + 'empresa/addEmpresa',
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

    $('body').on('click', '.editEmp', function () {
        var id = $(this).data('id');
        $.ajax({
            url: base_url + 'empresa/addHtml/' + id,
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

    $('body').on('submit', '#formEditEmp', function () {
        $(".modal-body").html("<center>Cargando..</center>");
        $.ajax({
            url: base_url + 'empresa/ModEmpresa',
            data: $(this).serialize(),
            type: 'POST',
            // dataType: "json",
            success: function (html) {
                $('#Modal').modal('hide');
               
            

                toastr.success(
      'Empresa Modificada!',
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
        });

        return false;
    });


    $('body').on('click', '.delEmp', function () {
        var id = $(this).data('id');

        $(".modal-header-mini").html('<span class="text-right" style="font-size:17px"><i class="ffa fa-pencil" aria-hidden="true"></i> Confirmacion</span><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font color="#FF0000"><i class="fa fa-times" aria-hidden="true"></i></font></span></button><br>');
        $(".modal-body-mini").html("<center>¿Estás seguro de eliminar esta empresa?</center>");
        $(".modal-footer-mini").html("<button type='button' class='btn btn-default btn-sm' data-dismiss='modal'>Cancelar</button> <a href='#' id='confirmarBorrarEmp' data-id='" + id + "' class='btn btn-danger btn-sm'>Eliminar</a>");
        $("#ModalMini").modal("show");
    });



    $('body').on('click', '#confirmarBorrarEmp', function () {
        var id = $(this).data('id');
        $.ajax({
            url: base_url + 'empresa/desactivaEmp/'+id,
            data: $(this).serialize(),
            type: 'POST',
            // dataType: "json",
            success: function (data) {
                var obj = $.parseJSON(data);
                if(obj['roll'] == 'exito'){
                    $('#ModalMini').modal('hide');
                    toastr.success(
                        'Empresa Eliminada!',
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
                        $('#ModalMini').modal('hide');                
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


}); 