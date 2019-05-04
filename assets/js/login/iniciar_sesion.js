function iniciar_sesion(base_url){
    var user = $("#user").val();
    var pwd = $("#pwd").val();
    $.ajax({
        data:  {
            user,
            pwd
        },
        url:   base_url+'inicio/iniciar_sesion',
        type:  'post',
        success:  function (datos) {                
            if(datos==='CORRECTO')
            {
                location.reload(true);
            }else{
                alerta_error_modal("¡ERROR!","Los datos introducidos son incorrectos, por favor vuelva a intentarlo.");
            }
        }
    });
}

function cerrar_sesion(base_url){
    $.ajax({
        url:   base_url+'inicio/cerrar_sesion',
        type:  'post',
        success:  function (datos) {
            location.reload(true);
        }
    });
}