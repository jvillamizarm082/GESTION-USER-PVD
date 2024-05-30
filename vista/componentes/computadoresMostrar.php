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
            <h2>Información de Computadores</h2>
        </center>
        <br>
        <button class="btn btn-primary navbar-right" data-toggle="modal" data-target="#modalNuevo">
            Agregar Computador
            <span class="glyphicon glyphicon-plus"></span>
        </button>
    </div>
    
    <div class="col-sm-12 table-responsive">
        <div class="col-sm-5">
           <br>
           <input class="form-control mb-4" id="tablaComputadores" type="text" placeholder="Digite Busqueda">
           <br>
        </div>

        <table class="table table-hover table-condensed table-bordered table-responsive" id="tablaComputadores">
            <tr>
                <td class="text-center"><strong>COMPUTADOR NUMERO</td>
                <td class="text-center"><strong>ESTADO</td>            
                <td class="text-center"><strong>EDITAR</td>
                <td class="text-center"><strong>ELIMINAR</td>
            </tr>

            <tbody id="myTable">
            <?php
            $sql = "SELECT * FROM computador";
            $result = mysqli_query($conexion, $sql);
            while ($ver = mysqli_fetch_assoc($result)) {
                $datos =$ver['num_compu'] . "||" .
                        $ver['estado'];
                       
                ?>
                <tr>                  
                    <td class="text-center"><?php echo $ver['num_compu']; ?></td>
                    <td class="text-center"><?php echo $ver['estado'] ?></td>
                                    
                    <td class="text-center">
                        <button class="btn btn-warning glyphicon glyphicon-pencil" 
                                data-toggle="modal" 
                                data-target="#modalEdicion" 
                                onclick="agregaform('<?php echo $datos ?>')">
                        </button>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-danger glyphicon glyphicon-remove" 
                                onclick="preguntarSiNo('<?php echo $ver['num_compu'] ?>')">
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
  $("#tablaComputadores").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 </script>



