function registrar_actividad(base_url){
    var titulo_actividad = $("#titulo_actividad").val();
    var descripcion_actividad = $("#descripcion_actividad").val();
    var categoria_actividad = $("#categoria_actividad").val();
    if(titulo_actividad.trim(" ")===""){
        alerta_error_modal("¡ERROR!","Debe agregar el titulo de la actividad.");
    }else if(descripcion_actividad.trim(" ")===""){
        alerta_error_modal("¡ERROR!","Debe agregar una descripción a la actividad.");
    }else if(descripcion_actividad.trim(" ").length < 15){
        alerta_error_modal("¡ERROR!","La descripción debe contener como mínimo 15 caracteres.");
    }else if(categoria_actividad===""){
        alerta_error_modal("¡ERROR!","Seleccione la categoría de la actividad.");
    }else{
        $.ajax({
            data:  {
                titulo_actividad,
                descripcion_actividad,
                categoria_actividad
            },
            url:   base_url+'actividades/actividad/registrar_actividad',
            type:  'post',
            success:  function (datos) {                
                var rst = JSON.parse(datos);
                if(rst["registro"]){
                    alerta_correcto_modal("¡REGISTRO EXITOSO!", "La actividad se ha registrado correctamente.");
                    recargar_actividades(base_url);
                    $("#formRegistroActividad").trigger("reset");
                }else{
                    alerta_error_modal("¡ERROR!", "Se ha producido un error al tratar de registrar la actividad, por favor vualva a intentarlo.");
                }
            }
        });
    }
}

/*
 * Funcion encargada de mostrar las opciones para modificar una actividad en la tabla
 */
function mostrar_modificar(actividad_id){
    $("#mod_titulo_actividad"+actividad_id).show();
    $("#mod_descripcion_actividad"+actividad_id).show();
    $("#mod_categoria_actividad"+actividad_id).show();
    $("#mod_actividad"+actividad_id).show();
    $("#div_titulo"+actividad_id).hide();
    $("#div_descripcion"+actividad_id).hide();
    $("#div_categoria"+actividad_id).hide();
    $("#op_mod_actividad"+actividad_id).hide();
}
/*
 * Funcion encargada de cancelar el proceso de modificacion de actividad ocultando el input donde se pueden modificar sus datos
 */
function ocultar_modificar(actividad_id){
    $("#div_titulo"+actividad_id).show();
    $("#div_descripcion"+actividad_id).show();
    $("#div_categoria"+actividad_id).show();
    $("#op_mod_actividad"+actividad_id).show();
    $("#mod_titulo_actividad"+actividad_id).hide();
    $("#mod_descripcion_actividad"+actividad_id).hide();
    $("#mod_categoria_actividad"+actividad_id).hide();
    $("#mod_actividad"+actividad_id).hide();
}

/*
 * Funcion encargada de modificar la informacion de la categoria
 */
function modificar_actividad(actividad_id, base_url){
    var nuevo_titulo = $("#titulo_actividad"+actividad_id).val();
    var nueva_descripcion = $("#descripcion_actividad"+actividad_id).val();
    var nueva_categoria = $("#categoria_actividad"+actividad_id).val();
    if(nuevo_titulo.trim(" ")===""){
        alerta_error_modal("¡ERROR!","Debe agregar el titulo de la actividad.");
    }else if(nueva_descripcion.trim(" ")===""){
        alerta_error_modal("¡ERROR!","Debe agregar una descripción a la actividad.");
    }else if(nueva_descripcion.trim(" ").length < 15){
        alerta_error_modal("¡ERROR!","La descripción debe contener como mínimo 15 caracteres.");
    }else if(nueva_categoria===""){
        alerta_error_modal("¡ERROR!","Seleccione la categoría de la actividad.");
    }else{
        $.ajax({
            data:  {
                actividad_id,
                nuevo_titulo,
                nueva_descripcion,
                nueva_categoria
            },
            url:   base_url+'actividades/actividad/modificar_actividad',
            type:  'post',
            success:  function (datos) {
                var rst = JSON.parse(datos);
                if(rst["modificacion"]){
                    alerta_correcto_modal("¡MODIFICACIÓN EXITOSA!","La actividad ha sido modificada correctamente.");
                    recargar_actividades(base_url);
                    ocultar_modificar(actividad_id);
                }else{
                    alerta_error_modal("¡ERROR!","Se ha producido un error al tratar de modificar la actividad, por favor vuelva a intentarlo.");
                }
            }
        });
    }
}

/*
 * Funcion encargada de eliminar cualquier categoria con un mensaje de confirmacion previo
 */
function eliminar_actividad(actividad_id, base_url){
    swal({   
        title: "¿ELIMINAR ACTIVIDAD?",   
        text: "Presione SI para eliminar la actividad, presione NO para cancelar la transacción.",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#03a9f3",   
        confirmButtonText: "SI",   
        cancelButtonText: "NO",   
        closeOnConfirm: true,   
        closeOnCancel: true 
    }, function(isConfirm){   
        if (isConfirm) {     
            $.ajax({
                data:  {
                    actividad_id
                },
                url:   base_url+'actividades/actividad/eliminar_actividad',
                type:  'post',
                success:  function (datos) {
                    var rst = JSON.parse(datos);
                    if(rst["eliminacion"]){
                        alerta_correcto_modal("¡ELIMINACIÓN EXITOSA!","La actividad ha sido eliminada correctamente.");
                        recargar_actividades(base_url);
                        ocultar_modificar(actividad_id);
                    }else{
                        alerta_error_modal("¡ERROR!","Se ha producido un error al tratar de eliminar la actividad, por favor vuelva a intentarlo.");
                    }
                }
            });
        }
    });
}

/*
 * Funcion encargada de recargar la tabla de actividades con los datos actualizados
 */
function recargar_actividades(base_url){
    $.ajax({
        url:   base_url+'actividades/actividad/getActividades',
        type:  'post',
        success:  function (html) {
            $("#divContTabla").html(html);
            $('#myTable').DataTable();
        }
    });
}

/*
 * Funcion encargada de consultar la actividad seleccionada en el autocomplete
 */
function mostrar_actividad_seleccionada(actividad_id, base_url){
    $.ajax({
        data: {actividad_id},
        url:   base_url+'actividades/actividad/getActividadSeleccionada',
        type:  'post',
        success:  function (html) {
            $("#divContActividades").html(html);
        }
    });
}