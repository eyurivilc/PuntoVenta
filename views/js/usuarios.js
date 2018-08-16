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