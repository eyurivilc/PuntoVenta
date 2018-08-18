/*=========================================
VALIDAR SI CATEGORIA YA ESTÁ REGISTRADO
 ========================================*/
$("#nuevaCategoria").change(function () {
    //$(".alert").remove();

    var descripcion = $(this).val();
    var datos = new FormData();
    datos.append("validarCategoria", descripcion);

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            if (respuesta) {
                $("#nuevaCategoria").parent().after('<div class="alert alert-warning">Esta categoría ya existe en la base de datos</div>');
                $("#nuevaCategoria").val("");
            }
        }
    })
});
