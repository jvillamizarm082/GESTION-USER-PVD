<?php

require_once "conexion.php";
$conexion = conexion();
$var = $_GET['accion'];

/** Registrar nuevo Usuario. * */
if ($var == "registrar") {
    
    $i = $_POST['id'];
    $n = $_POST['nombre'];
    $a = $_POST['apellido'];
    $t = $_POST['telefono'];
    $c = $_POST['contrasena'];
    $sql = "INSERT into admin (id_admin, nombre_admin, apellido_admin, telefono_admin, contrasena)
        values ('$i','$n','$a','$t','$c')";
    echo $result = mysqli_query($conexion, $sql);

/** Modificar información del Usuario. * */
} elseif ($var == "modificar") {
    $i = $_POST['id'];
    $n = $_POST['nombre'];
    $a = $_POST['apellido'];
    $t = $_POST['telefono'];
    $c = $_POST['contrasena'];
    $sql = "UPDATE admin SET nombre_admin='$n',apellido_admin='$a',telefono_admin='$t',contrasena='$c' WHERE id_admin='$i'";
    echo $result = mysqli_query($conexion, $sql);

/** Eliminar Usuario. * */
} elseif ($var == "eliminar") {
    $id = $_POST['id'];
    $sql = "DELETE from admin where id_admin='$id'";
    echo $result = mysqli_query($conexion, $sql);
} else {
    /** Mensaje de error. * */
    echo "Error...";
}