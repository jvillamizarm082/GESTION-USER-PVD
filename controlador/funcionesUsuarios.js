function agregardatos(id, nombre, apellido, telefono, direccion, edad, disc) {
    cadena = "id=" + id +
            "&nombre=" + nombre +
            "&apellido=" + apellido +
            "&telefono=" + telefono +
            "&direccion=" + direccion+
            "&edad=" + edad+
            "&disc=" + disc;
    $.ajax({
        type: "POST",
        url: "../modelo/accionesUsuarios.php?accion=registrar",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla').load('../vista/componentes/usuarioMostrar.php');
                alertify.success("Usuario Agregado con Exito");
            } else {
                alertify.error("ERROR, El Usuario ya existe");
            }
        }
    });
}

function agregaform(datos) {
    d = datos.split('||');
    $('#id_useru').val(d[1]);
    $('#nombreu').val(d[2]);
    $('#apellidou').val(d[3]);
    $('#telefonou').val(d[4]);
    $('#direccionu').val(d[5]);
    $('#edadu').val(d[6]);
    $('#discu').val(d[7]);
}

function modificarUsuario() {
    id = $('#id_useru').val();
    nombre = $('#nombreu').val();
    apellido = $('#apellidou').val();
    telefono = $('#telefonou').val();
    direccion = $('#direccionu').val();
    edad = $('#edadu').val();
    disc = $('#discu').val();

    cadena = "id=" + id +
            "&nombre=" + nombre +
            "&apellido=" + apellido +
            "&telefono=" + telefono +
            "&direccion=" + direccion +
            "&edad=" + edad +
            "&disc=" + disc;
    $.ajax({
        type: "POST",
        url: "../modelo/accionesUsuarios.php?accion=modificar",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla').load('../vista/componentes/usuarioMostrar.php');
                //alert('Cliente actualizado con exitos');
                alertify.success("Usuario actualizado con exito");
            } else {
                alertify.error("Fallo el servidor");
            }
        }
    });
}

function preguntarSiNo(id, nombre, apellido) {
    alertify.confirm('Eliminar Usuario', '¿Está seguro de eliminar el Usuario ' + nombre + ' ' + apellido + '?',
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
        url: "../modelo/accionesUsuarios.php?accion=eliminar",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla').load('../vista/componentes/usuarioMostrar.php');
                alertify.success("Eliminado con exito");
            } else {
                alertify.error("Fallo el servidor");
            }
        }
    });
}