/*
 * Funcion encargada de registrar cada una de las nuevas categorias
 */
function registrar_categoria(base_url){
    var categoria = $("#categoria").val();
    if(categoria.trim(" ")===""){
        alerta_error_modal("¡ERROR!","Debe agregar el nombre de la categoría, recuerde que no puede estar vacío el campo.");
    }else{
        $.ajax({
            data:  {
                categoria
            },
            url:   base_url+'categorias/categoria/registrar_categoria',
            type:  'post',
            success:  function (datos) {
                var rst = JSON.parse(datos);
                if(rst["registro"]){
                    alerta_correcto_modal("¡REGISTRO EXITOSO!","La categoría ha sido registrada correctamente.");
                    recargar_categorias(base_url);
                    $("#formRegistrarCategoria").trigger("reset");
                }else{
                    alerta_error_modal("¡ERROR!","Se ha producido un error al tratar de registrar la categoría, por favor vuelva a intentarlo.");
                }
            }
        });
    }
}

/*
 * Funcion encargada de mostrar las opciones para modificar una categoria en la tabla
 */
function mostrar_modificar(categoria_id){
    $("#mod_nombre_categoria"+categoria_id).show();
    $("#mod_categoria"+categoria_id).show();
    $("#div_nombre_categoria"+categoria_id).hide();
    $("#op_mod_categoria"+categoria_id).hide();
}
/*
 * Funcion encargada de cancelar el proceso de modificacion de categoria ocultando el input donde se puede modificar su nombre
 */
function ocultar_modificar(categoria_id){
    $("#div_nombre_categoria"+categoria_id).show();
    $("#op_mod_categoria"+categoria_id).show();
    $("#mod_nombre_categoria"+categoria_id).hide();
    $("#mod_categoria"+categoria_id).hide();
}

/*
 * Funcion encargada de modificar el nombre de la categoria que ya se habia registrado con anterioridad
 */
function modificar_categoria(categoria_id, base_url){
    var nuevo_nombre = $("#nombre_categoria"+categoria_id).val();
    if(nuevo_nombre.trim(" ")===""){
        alerta_error_modal("¡ERROR!","Debe agregar el nombre de la categoría, recuerde que no puede estar vacío el campo.");
    }else{
        $.ajax({
            data:  {
                categoria_id,
                nuevo_nombre
            },
            url:   base_url+'categorias/categoria/modificar_categoria',
            type:  'post',
            success:  function (datos) {
                var rst = JSON.parse(datos);
                if(rst["modificacion"]){
                    alerta_correcto_modal("¡MODIFICACIÓN EXITOSA!","El nombre de la categoría ha sido modificada correctamente.");
                    recargar_categorias(base_url);
                    ocultar_modificar(categoria_id);
                }else{
                    alerta_error_modal("¡ERROR!","Se ha producido un error al tratar de modificar la categoría, por favor vuelva a intentarlo.");
                }
            }
        });
    }
}

/*
 * Funcion encargada de eliminar cualquier categoria con un mensaje de confirmacion previo
 */
function eliminar_categoria(categoria_id, base_url){
    swal({   
        title: "¿ELIMINAR CATEGORIA?",   
        text: "Presione SI para eliminar la categoría, presione NO para cancelar la transacción.",   
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
                    categoria_id
                },
                url:   base_url+'categorias/categoria/eliminar_categoria',
                type:  'post',
                success:  function (datos) {
                    var rst = JSON.parse(datos);
                    if(rst["eliminacion"]){
                        alerta_correcto_modal("¡ELIMINACIÓN EXITOSA!","La categoría ha sido eliminada correctamente.");
                        recargar_categorias(base_url);
                        ocultar_modificar(categoria_id);
                    }else if(!rst["eliminacion"] && rst["msj"]==="CATEGORIACONREGISTRO"){
                        alerta_error_modal("¡ERROR!","Hay actividades asociadas a esta categoría por lo tanto no puede ser eliminada.");
                    }else{
                        alerta_error_modal("¡ERROR!","Se ha producido un error al tratar de eliminar la categoría, por favor vuelva a intentarlo.");
                    }
                }
            });
        }
    });
}

/*
 * Funcion encargada de recargar la tabla de categorias con el fin de invocarla una vez se realice alguna modificacion o eliminacion de las mismas
 */
function recargar_categorias(base_url){
    $.ajax({
        url:   base_url+'categorias/categoria/getDatosCategorias',
        type:  'post',
        success:  function (html) {
            $("#divContTabla").html(html);
            $('#myTable').DataTable();
        }
    });
}