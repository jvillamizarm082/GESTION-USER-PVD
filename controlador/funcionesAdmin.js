function agregardatos(id, nombre, apellido, telefono, contrasena) {
    cadena = "id=" + id +
            "&nombre=" + nombre +
            "&apellido=" + apellido +
            "&telefono=" + telefono +
            "&contrasena=" + contrasena;
    $.ajax({
        type: "POST",
        url: "../modelo/accionesAdmin.php?accion=registrar",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla').load('../vista/componentes/AdminMostrar.php');
                alertify.success("Administrador Agregado con Exito");
            } else {
                alertify.error("ERROR, El Administrador ya existe");
            }
        }
    });
}

function agregaform(datos) {
    d = datos.split('||');
    $('#id_adminu').val(d[1]);
    $('#nombreu').val(d[2]);
    $('#apellidou').val(d[3]);
    $('#telefonou').val(d[4]);
    $('#contrasenau').val(d[5]);
}

function modificarAdmin() {
    id = $('#id_adminu').val();
    nombre = $('#nombreu').val();
    apellido = $('#apellidou').val();
    telefono = $('#telefonou').val();
    contrasena = $('#contrasenau').val();

    cadena = "id=" + id +
            "&nombre=" + nombre +
            "&apellido=" + apellido +
            "&telefono=" + telefono +
            "&contrasena=" + contrasena;
    $.ajax({
        type: "POST",
        url: "../modelo/accionesAdmin.php?accion=modificar",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla').load('../vista/componentes/AdminMostrar.php');
                //alert('Cliente actualizado con exitos');
                alertify.success("Administrador actualizado con exito");
            } else {
                alertify.error("Fallo el servidor");
            }
        }
    });
}

function preguntarSiNo(id, nombre, apellido) {
    alertify.confirm('Eliminar Administrador', '¿Está seguro de eliminar el Administrador ' + nombre + ' ' + apellido + '?',
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
        url: "../modelo/accionesAdmin.php?accion=eliminar",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                $('#tabla').load('../vista/componentes/AdminMostrar.php');
                alertify.success("Eliminado con exito");
            } else {
                alertify.error("Fallo el servidor");
            }
        }
    });
}