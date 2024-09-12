(function () {
    "use strict";

    // Configuración del token CSRF para todas las solicitudes AJAX
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Inicialización de DataTables
    var table = $(".data-table").DataTable({
        processing: true,
        serverSide: true,
        ajax: URLindex, // URL para la acción de obtener los datos
        columns: columnas, // Columnas definidas en la vista
    });

    // Manejo del envío del formulario para crear o actualizar un registro
    $("#form").on("submit", function (e) {
        e.preventDefault(); // Prevenir el envío del formulario por defecto

        $.ajax({
            data: $("#form").serialize(), // Serializar los datos del formulario
            url: URLindex, // URL para la acción de almacenamiento/actualización
            type: "POST", // Tipo de solicitud
            dataType: "json", // Tipo de datos esperado de la respuesta
            success: function (data) {
                $("#form").trigger("reset"); // Reiniciar el formulario
                $("#ajaxModel").modal("hide"); // Ocultar el modal
                table.draw(false); // Refrescar DataTable para mostrar el nuevo registro
                toastr.success("Registro guardado exitosamente."); // Mostrar notificación de éxito
            },
            error: function (response) {
                var errors = response.responseJSON.errors;
                $(".form-control").removeClass("is-invalid");
                $(".invalid-feedback").remove();

                $.each(errors, function (field, errorMessage){
                    var input = $('[name="' + field + '"]');
                    input.addClass("is-invalid");
                    input.after(
                        '<div class="invalid-feedback">' +
                        errorMessage[0] +
                        "</div>"
                    )
                });
            }
        });
    });

    // Abrir el modal para crear un nuevo registro
    $("#createNewRecord").on("click", function () {
        $("#table_id").val(""); // Limpiar el campo oculto del ID
        $("#form")[0].reset(); // Reiniciar el formulario
        $(".form-control").removeClass("is-invalid"); // Eliminar la clase de error
        $(".invalid-feedback").remove(); // Eliminar los mensajes de error
        $("#modelHeading").html("Crear nuevo " + titulo); // Establecer el título del modal
        $("#ajaxModel").modal("show"); // Mostrar el modal
    });

    // Abrir el modal para editar un registro existente
    $("body").on("click", ".editRecord", function () {
        var table_id = $(this).data("id");

        // Limpiar el estado de error previo
        $("#form")[0].reset(); // Reiniciar el formulario
        $(".form-control").removeClass("is-invalid"); // Eliminar la clase de error
        $(".invalid-feedback").remove(); // Eliminar los mensajes de error
        
        $.get(URLindex + "/" + table_id + "/edit", function (data) {
            $("#modelHeading").html("Editar " + titulo); // Establecer el título del modal
            $("#ajaxModel").modal("show"); // Mostrar el modal
            $("#table_id").val(data.id_rol); // Llenar el campo oculto con el ID

            // Llenar los campos del formulario con los datos del registro
            $.each(data, function (index, itemData) {
                $('[name="' + index + '"]').val(itemData);
            });
        });
    });

    // Manejo de la eliminación de un registro
    $("body").on("click", ".deleteRecord", function () {
        var table_id = $(this).data("id");
        var sino = confirm("Confirma borrar el registro?");
        if (sino) {
          $.ajax({
            type: "DELETE",
            url: URLindex + "/" + table_id,
            success: function success(data) {
              table.draw();
            },
            error: function error(data) {
              console.log("Error:", data);
            }
          });
        }
      });
    })();
