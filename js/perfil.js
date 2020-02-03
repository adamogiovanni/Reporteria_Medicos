$(document).ready(function () {


    $('body').on('click', '#btnNewPerfil', function () {

        $.ajax({
            url: base_url + 'perfil/addHtml',
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

    $('body').on('submit', '#formNewPerfil', function () {
        $(".modal-body").html("<center>Cargando..</center>");

        $.ajax({
            url: base_url + 'perfil/addPerfil',
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


    
    $('body').on('click', '.editPer', function () {
        var id = $(this).data('id');
        $.ajax({
            url: base_url + 'perfil/addHtml/' + id,
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

    $('body').on('submit', '#formEditPer', function () {
        $(".modal-body").html("<center>Cargando..</center>");
        $.ajax({
            url: base_url + 'perfil/ModPerfil',
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

    $('body').on('click', '.delPer', function () {
        var id = $(this).data('id');

        $(".modal-header-mini").html('<span class="text-right" style="font-size:17px"><i class="ffa fa-pencil" aria-hidden="true"></i> Confirmacion</span><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font color="#FF0000"><i class="fa fa-times" aria-hidden="true"></i></font></span></button><br>');
        $(".modal-body-mini").html("<center>¿Estás seguro de eliminar este Perfil?</center>");
        $(".modal-footer-mini").html("<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button> <a href='#' id='confirmarBorrarPer' data-id='" + id + "' class='btn btn-danger'>Si, eliminar</a>");
        $("#ModalMini").modal("show");
    });



    $('body').on('click', '#confirmarBorrarPer', function () {
        var id = $(this).data('id');
        $.ajax({
            url: base_url + 'perfil/desactivaPer/'+id,
            data: $(this).serialize(),
            type: 'POST',
            // dataType: "json",
            success: function (data) {
                var obj = $.parseJSON(data);
                if(obj['roll'] == 'exito'){
                    $('#ModalMini').modal('hide');
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

    $('body').on('click', '.editAcc', function () {
        var id = $(this).data('id');
        $.ajax({
            url: base_url + 'perfil/accPerfil/' + id,
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



    $('body').on('submit', '#formEditOpciones', function () {
        var page = $(this).serialize(); 
        $(".modal-body").html("<center>Cargando...</center>");
        $.ajax({
            url: base_url + 'perfil/ModOpciones',
            data: page,
            type: 'POST',
            // dataType: "json",
            success: function (html) {
                location.reload();
            }
        });

        return false;
    });



}); //fin funcion ready
