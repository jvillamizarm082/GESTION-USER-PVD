<?php
require_once "../../modelo/conexion.php";
$conexion = conexion();
?>

<div class="row">
    <br>
    <br>
    <br>
    <br>
   
    <div>
        <center>
            <h2>Información de Usuarios</h2>
        </center>
        <br>
        <button class="btn btn-primary navbar-right" data-toggle="modal" data-target="#modalNuevo">
            Agregar Usuario
            <span class="glyphicon glyphicon-plus"></span>
        </button>
    </div>
    
    <div class="col-sm-12 table-responsive">
        <div class="col-sm-5">
           <br>
           <input class="form-control mb-4" id="tablaUsuarios" type="text" placeholder="Digite Busqueda">
           <br>
        </div>

        <table class="table table-hover table-condensed table-bordered table-responsive" id="tablaUsuarios">
            <tr>
                <td class="text-center"><strong>ITEM</td>
                <td class="text-center"><strong>ID USUARIO</td>
                <td class="text-center"><strong>NOMBRES</td>
                <td class="text-center"><strong>APELLIDOS</td>
                <td class="text-center"><strong>TELEFONO</td>
                <td class="text-center"><strong>DIRECCION</td>
                <td class="text-center"><strong>GRUPO ETARIO</td>
                <td class="text-center"><strong>DISCAPACIDAD</td>
                <td class="text-center"><strong>EDITAR</td>
                <td class="text-center"><strong>ELIMINAR</td>
            </tr>

            <tbody id="myTable">
            <?php
            $sql = "SELECT * FROM usuarios";
            $result = mysqli_query($conexion, $sql);
            while ($ver = mysqli_fetch_assoc($result)) {
                $datos = $ver['item'] . "||" .
                        $ver['id_usuario'] . "||" .
                        $ver['nombre_usuario'] . "||" .
                        $ver['apellido_usuario'] . "||" .
                        $ver['telefono_usuario'] . "||" .
                        $ver['direccion_usuario']. "||" .
                        $ver['rango_edad']. "||" .
                        $ver['discapacidad'];
                ?>
                <tr>
                    <td class="text-center"><?php echo $ver['item']; ?></td>
                    <td><?php echo $ver['id_usuario']; ?></td>
                    <td><?php echo $ver['nombre_usuario'] ?></td>
                    <td><?php echo $ver['apellido_usuario'] ?></td>
                    <td><?php echo $ver['telefono_usuario'] ?></td>
                    <td><?php echo $ver['direccion_usuario'] ?></td>
                    <td><?php echo $ver['rango_edad'] ?></td>
                    <td class="text-center"><?php echo $ver['discapacidad'] ?></td>
                    <td class="text-center">
                        <button class="btn btn-warning glyphicon glyphicon-pencil" 
                                data-toggle="modal" 
                                data-target="#modalEdicion" 
                                onclick="agregaform('<?php echo $datos ?>')">
                        </button>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-danger glyphicon glyphicon-remove" 
                                onclick="preguntarSiNo('<?php echo $ver['id_usuario'] ?>','<?php echo $ver['nombre_usuario'] ?>','<?php echo $ver['apellido_usuario'] ?>')">
                        </button>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

        <br>
    </div>
    <?php
    $conexion->close();
    ?>

 </div>

 <script type="text/javascript">
     $(document).ready(function(){
  $("#tablaUsuarios").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 </script>



