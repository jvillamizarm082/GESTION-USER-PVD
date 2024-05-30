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
    <title>Computadores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php
    include('librerias.php');
    ?>
    <script src="../controlador/funcionesComputadores.js"></script>


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
                    <h4 class="modal-title" id="myModalLabel">Agregar Computador</h4>
                </div>
                <div class="modal-body">
                    <label>Numero de Computador</label>
                    <input type="text" id="id_com" class="form-control input-sm" required="">                  
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Estado</label>                          
                            <select class="form-control" id="est">                              
                                <option></option>
                                <option>LIBRE</option>
                                <option>OCUPADO</option>
                            </select>
                        </div>
                    </form>
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
                    <input type="text" hidden="" id="id_comu" class="form-control input-sm" disabled="">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Estado</label>

                            <select class="form-control" id="estu">                              
                                <option></option>
                                <option>LIBRE</option>
                                <option>OCUPADO</option>
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
            $('#tabla').load('componentes/computadoresMostrar.php');
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#guardarnuevo').click(function () {
                id = $('#id_com').val();
                estado = $('#est').val();

                agregardatos(id, estado);
            });
            $('#actualizadatos').click(function () {
                modificarComputador();
            });

        });
    </script>
    <?php
    include './footer.php';
    ?>
</body>
</html>