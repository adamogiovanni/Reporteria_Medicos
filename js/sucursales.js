$(document).ready(function () {


    $('body').on('click', '#btnSucursal', function () {

        $.ajax({
            url: base_url + 'Sucursal/verHtml',
            data: {},
            type: 'POST',
            // dataType: "json",
            success: function (html) {
                $(".modal-body").html(html);
                $("#modalYT").modal("show");
            }
        });

    });
    $('body').on('click', '#btnNewSucursal', function () {

        $.ajax({
            url: base_url + 'Sucursal/addHtml',
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


    $('body').on('submit', '#formNewSucursal', function () {
        $(".modal-body").html("<center>Cargando..</center>");

        $.ajax({
            url: base_url + 'Sucursal/addImagen',
            data: $(this).serialize(),
            type: 'POST',
            // dataType: "json",
            success: function (html) {
                location.reload();
            }
        });

        return false;
    });

    
    $('body').on('click', '.btnNewImagenSuc', function () {
        var id = $(this).data('id');
        $.ajax({
            url: base_url + 'Sucursal/addIMG/'+ id,
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

    $('body').on('click', '#btnImagenMasiva', function () {

        $.ajax({
            url: base_url + 'Sucursal/verImagenMasiva',
            data: {},
            type: 'POST',
            // dataType: "json",
            success: function (html) {
                $(".modal-body").html(html);
                $("#modalYT").modal("show");
            }
        });

    });


    $('body').on('click', '.editSucursal', function () {
        var id = $(this).data('id');
        $.ajax({
            url: base_url + 'Sucursal/addHtml/' + id,
            data: {},
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

    $('body').on('click', '.editImagenes', function () {
        var id = $(this).data('id');
        $.ajax({
            url: base_url + 'Sucursal/EditarImagen/' + id,
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
    $('body').on('submit', '#formEditaImagenes', function () {
        $(".modal-body").html("<center>Cargando..</center>");
        $.ajax({
            url: base_url + 'Sucursal/EliminarImagenes',
            data: $(this).serialize(),
            type: 'POST',
            // dataType: "json",
            success: function (html) {
               // location.reload();
            }
        });

        return false;
    });

    $('body').on('click', '.delSucursal', function () {
        var id = $(this).data('id');

        $(".modal-header-mini").html('<span class="text-right" style="font-size:17px"><i class="ffa fa-pencil" aria-hidden="true"></i> Confirmacion</span><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font color="#FF0000"><i class="fa fa-times" aria-hidden="true"></i></font></span></button><br>');
        $(".modal-body-mini").html("<center>¿Estás seguro de eliminar la sucursal?</center>");
        $(".modal-footer-mini").html("<button type='button' class='btn btn-default btn-sm' data-dismiss='modal'>Cancelar</button> <a href='#' id='SucursalEliminada' data-id='" + id + "' class='btn btn-danger btn-sm'>Eliminar</a>");
        $("#ModalMini").modal("show");
    });



    $('body').on('click', '#SucursalEliminada', function () {
        var id = $(this).data('id');
        $.ajax({
            url: base_url + 'sucursal/EliminaSucursal',
            data: {
                id: id
            },
            type: 'POST',
            // dataType: "json",
            success: function (html) {
                $('#ModalMini').modal('hide');
               
            

            toastr.success(
  'Sucursal Eliminada!',
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

    });


}); //fin funcion ready


