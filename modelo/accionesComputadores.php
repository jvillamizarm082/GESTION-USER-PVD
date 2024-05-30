<?php

require_once "conexion.php";
$conexion = conexion();
$var = $_GET['accion'];

/** Registrar nuevo Coputador. * */
if ($var == "registrar") {
    
    $i = $_POST['id'];
    $e = $_POST['estado'];
   
    $sql = "INSERT into computador (num_compu, estado)
        values ('$i','$e')";
    echo $result = mysqli_query($conexion, $sql);

/** Modificar información del computador. * */
} elseif ($var == "modificar") {
    $i = $_POST['id'];
    $e = $_POST['estado'];
   
    $sql = "UPDATE computador SET estado ='$e' WHERE num_compu='$i'";
    echo $result = mysqli_query($conexion, $sql);

/** Eliminar Computador. * */
} elseif ($var == "eliminar") {
    $id = $_POST['id'];
    $sql = "DELETE from computador where num_compu='$id'";
    echo $result = mysqli_query($conexion, $sql);
} else {
    /** Mensaje de error. * */
    echo "Error...";
}