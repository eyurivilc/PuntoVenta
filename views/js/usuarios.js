/*=============================
SUBIENDO LA FOTO DEL USUSARIO
 =============================*/
$(".nuevaFoto").change(function () {
    var imagen = this.files[0];

    /* Validando que el formato de la imagen sea JPG o PNG */
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
        $(".nuevaFoto").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else if (imagen["size"] <= 2000000) {
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function (evento) {
            var rutaImagen = evento.target.result;
            $(".previsualizar").attr("src", rutaImagen);
        })
    } else {
        $(".nuevaFoto").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    }
});

/*=============================
EDITAR USUSARIO
 =============================*/
$(".btnEditarUsuario").click(function () {
    var idUsuario = $(this).attr("idUsuario");

    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({
        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            $("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);
            $("#fotoActual").val(respuesta["foto"]);

            $("#passwordActual").val(respuesta["password"]);

            if (respuesta["foto"] != "") {
                $(".previsualizar").attr("src", respuesta["foto"]);
            }
        }
    });
});

/*=============================
ACTIVAR USUSARIO
 =============================*/
$(".btnActivar").click(function() {
    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");

    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

        }
    })
    if (estadoUsuario == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario', 1);
    } else {
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('Activado');
        $(this).attr('estadoUsuario', 0);
    }
});

/*=========================================
VALIDAR SI EL USUSARIO YA ESTÁ REGISTRADO
 ========================================*/
$("#nuevoUsuario").change(function () {
    $(".alert").remove();

    var usuario = $(this).val();
    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            if (respuesta) {
                $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');
                $("#nuevoUsuario").val("");
            }
        }
    })
});

/*=============================
ELIMINAR USUSARIO
 =============================*/
$(".btnEliminarUsuario").click(function () {
    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");

    swal({
        title: "¿Está seguro de borrar el usuario?",
        text: "¡Si no lo está puede cancelar la acción!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085D6",
        cancelButtonColor: "#D33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar Usuario!"
    }).then((resultado) => {
        if (resultado.value) {
            window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
        }
    });
});