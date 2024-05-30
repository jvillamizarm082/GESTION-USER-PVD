<?php
session_start();
error_reporting(0);
$nom = $_SESSION['id_admin'];//parametro enviado desde sesion.php
$docu = $_SESSION['contrasena'];

if ($nom == NULL && $docu == NULL) {
    header("location:sesion.php");
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon"  type="image/jpg" href="../imagenes/favicon1.jpg">
    <title>Administradores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php
    include('librerias.php');
    ?>
    <script src="../controlador/funcionesAdmin.js"></script>
</head>
<body>
    <?php
    include 'header.php';       
    ?>
    <div class="container">
        <div id="tabla"></div>
    </div>
    <!-- MODAL PARA INSERTAR REGISTROS -->
    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Administrador</h4>
                </div>
                <div class="modal-body">
                    <label>ID Admin</label>
                    <input type="text" id="id_admin" class="form-control input-sm" required="">
                    <label>Nombres</label>
                    <input type="text" id="nombre" class="form-control input-sm" required="">
                    <label>Apellidos</label>
                    <input type="text" id="apellido" class="form-control input-sm" required="">
                    <label>Telefono</label>
                    <input type="text" id="telefono" class="form-control input-sm" required="">
                    <label>Constraseña</label>
                    <input type="password" id="contrasena" class="form-control input-sm" required="">
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
                        Agregar
                    </button>
                </div>
            </div>
        </div>
    </div>

     <!-- MODAL PARA ACTUALIZAR REGISTROS -->
     <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Actualizar Datos</h4>
                </div>
                <div class="modal-body">
                    <label>ID Admin</label>
                    <input type="text" id="id_adminu" class="form-control input-sm" required="" disabled="">
                    <label>Nombres</label>
                    <input type="text" id="nombreu" class="form-control input-sm" required="">
                    <label>Apellidos</label>
                    <input type="text" id="apellidou" class="form-control input-sm" required="">
                    <label>Telefono</label>
                    <input type="text" id="telefonou" class="form-control input-sm" required="">
                    <label>Constraseña</label>
                    <input type="password" id="contrasenau" class="form-control input-sm" required="">       

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizadatos">
                        Actualizar
                    </button>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabla').load('componentes/adminMostrar.php');
        });
    </script>

    <script type="text/javascript">
    $(document).ready(function () {
            $('#guardarnuevo').click(function () {
                id = $('#id_admin').val();
                nombre = $('#nombre').val();
                apellido = $('#apellido').val();
                telefono = $('#telefono').val();
                contrasena = $('#contrasena').val();
                agregardatos(id, nombre, apellido, telefono, contrasena);
            });
            $('#actualizadatos').click(function () {
                modificarAdmin();
            });

        });
    </script>
    
    <?php
    include './footer.php';
    ?>
</body>
</html>
