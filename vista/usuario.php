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
    <title>Usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php
    include('librerias.php');
    ?>
    <script src="../controlador/funcionesUsuarios.js"></script>


</head>
<body id="body">
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
                    <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
                </div>
                <div class="modal-body">
                    <label>ID Usuario</label>
                    <input type="text" id="id_user" class="form-control input-sm" required="">
                    <label>Nombres</label>
                    <input type="text" id="nombre" class="form-control input-sm" required="">
                    <label>Apellidos</label>
                    <input type="text" id="apellido" class="form-control input-sm" required="">
                    <label>Telefono</label>
                    <input type="text" id="telefono" class="form-control input-sm" required="">
                    <label>Direccion</label>
                    <input type="text" id="dir" class="form-control input-sm" required="">

                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">GRUPO ETARIO</label>
                            
                            <select class="form-control" id="edad">                              
                                <option></option>
                                <option>PRIMERA INFANCIA(0-5)</option>
                                <option>INFANCIA(6-11)</option>
                                <option>ADOLESCENCIA(12-18)</option>
                                <option>JUVENTUD(14-26)</option>
                                <option>ADULTO(27-59)</option>
                                <option>ADULTO MAYOR(60 Ó MAS )</option>
                            </select>
                        </div>
                    </form>
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">DISCAPACIDAD</label>
                            
                            <select class="form-control" id="disc">                              
                                <option></option>
                                <option>SI</option>
                                <option>NO</option>
                            </select>
                        </div>
                    </form>
                </div>                

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
                        Agregar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------>
<!-- MODAL PARA EDICION DE DATOS-->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Datos</h4>
            </div>
            <div class="modal-body">
                <label>ID</label>
                <input type="text" hidden="" id="id_useru" class="form-control input-sm" disabled="">
                <label>Nombre</label>
                <input type="text" id="nombreu" class="form-control input-sm" required="">
                <label>Apellido</label>
                <input type="text" id="apellidou" class="form-control input-sm" required="">
                <label>Telefono</label>
                <input type="text" id="telefonou" class="form-control input-sm" required="">
                <label>Direccion</label>
                <input type="text" id="direccionu" class="form-control input-sm" required="">

                <form>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">GRUPO ETARIO</label>

                        <select class="form-control" id="edadu">                              
                            <option></option>
                            <option>PRIMERA INFANCIA(0-5)</option>
                            <option>INFANCIA(6-11)</option>
                            <option>ADOLESCENCIA(12-18)</option>
                            <option>JUVENTUD(14-26)</option>
                            <option>ADULTO(27-59)</option>
                            <option>ADULTO MAYOR(60 Ó MAS )</option>
                        </select>
                    </div>
                </form>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">DISCAPACIDAD</label>

                        <select class="form-control" id="discu">                              
                            <option></option>
                            <option>SI</option>
                            <option>NO</option>

                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizadatos">
                    Actualizar
                </button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('#tabla').load('componentes/usuarioMostrar.php');
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#guardarnuevo').click(function () {
            id = $('#id_user').val();
            nombre = $('#nombre').val();
            apellido = $('#apellido').val();
            telefono = $('#telefono').val();
            direccion = $('#dir').val();
            edad = $('#edad').val();
            disc = $('#disc').val();
            agregardatos(id, nombre, apellido, telefono, direccion, edad, disc);
        });
        $('#actualizadatos').click(function () {
            modificarUsuario();
        });

    });
</script>
<?php
include './footer.php';
?>
</body>
</html>