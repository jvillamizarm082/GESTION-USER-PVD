function agregardatos(id, estado) {
    cadena = "id=" + id +
            "&estado=" + estado ;
            
    $.ajax({
        type: "POST",
        url: "../modelo/accionesComputadores.php?accion=registrar",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla').load('../vista/componentes/computadoresMostrar.php');
                alertify.success("Computador Agregado con Exito");
            } else {
                alertify.error("ERROR, El Computador ya existe");
            }
        }
    });
}

function agregaform(datos) {
    d = datos.split('||');
    $('#id_comu').val(d[0]);
    $('#estu').val(d[1]);
    
}

function modificarComputador() {
    id = $('#id_comu').val();
    estado = $('#estu').val();
   

    cadena = "id=" + id +
            "&estado=" + estado ;
           
    $.ajax({
        type: "POST",
        url: "../modelo/accionesComputadores.php?accion=modificar",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla').load('../vista/componentes/computadoresMostrar.php');
                //alert('Cliente actualizado con exitos');
                alertify.success("estado actualizado con exito");
            } else {
                alertify.error("Fallo el servidor");
            }
        }
    });
}

function preguntarSiNo(id, estado) {
    alertify.confirm('Eliminar Computador', '¿Está seguro de eliminar el Computador numero ' + id + ' ' +  '?',
            function () {
                eliminarDatos(id)
            }
    , function () {
        alertify.error('Se ha cancelado la eliminación.')
    });
}

function eliminarDatos(id) {
    cadena = "id=" + id;
    $.ajax({
        type: "POST",
        url: "../modelo/accionesComputadores.php?accion=eliminar",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla').load('../vista/componentes/computadoresMostrar.php');
                alertify.success("Eliminado con exito");
            } else {
                alertify.error("Fallo el servidor");
            }
        }
    });
}