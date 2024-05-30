<?php
require_once "../../modelo/conexion.php";
$conexion = conexion();
?>

<div class="row">

    <style>
        .hidetext { 
            -webkit-text-security: disc;
            text-align: center;


        }
    </style>
    <br>
    <br>
    <br>
    <br>
    <div>
        <center>
            <h2>Administradores</h2>
        </center>

        <button class="btn btn-primary navbar-right" data-toggle="modal" data-target="#modalNuevo">
            Agregar Administrador 
            <span class="glyphicon glyphicon-plus"></span>
        </button>
    </div>
    <div class="col-sm-12 table-responsive">


        <div class="col-sm-5">
           <br>
           <input class="form-control mb-4" id="tablaAdmin" type="text" placeholder="Digite Busqueda">

           <br>
       </div>
       <table class="table table-hover table-condensed table-bordered table-responsive">
        <tr>
            <td class="text-center"><strong>ITEM</td>
            <td class="text-center"><strong>ID ADMIN</td>
            <td class="text-center"><strong>NOMBRE</td>
            <td class="text-center"><strong>APELLIDO</td>
            <td class="text-center"><strong>TELEFONO</td>
            <td class="text-center"><strong>CONTRASEÑA</td>                          
            <td class="text-center"><strong>EDITAR</td>
            <td class="text-center"><strong>ELIMINAR</td>
        </tr>
        <tbody id="myTable">
            <?php
            $sql = "SELECT * FROM admin";
            $result = mysqli_query($conexion, $sql);
            while ($ver = mysqli_fetch_assoc($result)) {
                $datos = $ver['item'] . "||" .
                $ver['id_admin'] . "||" .
                $ver['nombre_admin'] . "||" .
                $ver['apellido_admin'] . "||" .
                $ver['telefono_admin'] . "||" .
                $ver['contrasena'];

                ?>
                <tr>
                    <td class="text-center"><?php echo $ver['item']; ?></td>
                    <td><?php echo $ver['id_admin']; ?></td>
                    <td><?php echo $ver['nombre_admin']; ?></td>
                    <td><?php echo $ver['apellido_admin']; ?></td>
                    <td><?php echo $ver['telefono_admin']; ?></td>                  
                    <td class="text-center" id="contrasen" type="password"><?php echo $ver ['contrasena']; ?>                  
                    <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                </td>                 

                <td>
                    <button class="btn btn-warning glyphicon glyphicon-pencil" 
                    data-toggle="modal" 
                    data-target="#modalEdicion" 
                    onclick="agregaform('<?php echo $datos ?>')">
                </button>
            </td>
            <td>
                <button class="btn btn-danger glyphicon glyphicon-remove" 
                onclick="preguntarSiNo('<?php echo $ver['id_admin'] ?>','<?php echo $ver['nombre_admin'] ?>','<?php echo $ver['apellido_admin'] ?>')">
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

<script type="text/javascript">
  function mostrarPassword(){
    var cambio = document.getElementById("contrasen");

    if(cambio.type == "password"){
      cambio.type = "text";
      $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
  }else{
      cambio.type = "password";
      $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
  }
} 
</script> 

<script type="text/javascript">
 $(document).ready(function(){
  $("#tablaAdmin").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});
});
</script>
</div>