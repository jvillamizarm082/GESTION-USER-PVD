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
    $d = $_POST['direccion'];
    $e = $_POST['edad'];
    $ds= $_POST['disc'];
    $sql = "INSERT into usuarios (id_usuario, nombre_usuario, apellido_usuario, telefono_usuario, direccion_usuario, rango_edad, discapacidad)
        values ('$i','$n','$a','$t','$d','$e','$ds')";
    echo $result = mysqli_query($conexion, $sql);

/** Modificar información del Usuario. * */
} elseif ($var == "modificar") {
    $i = $_POST['id'];
    $n = $_POST['nombre'];
    $a = $_POST['apellido'];
    $t = $_POST['telefono'];
    $d = $_POST['direccion'];
    $e = $_POST['edad'];
    $ds= $_POST['disc'];
    $sql = "UPDATE usuarios SET nombre_usuario='$n',apellido_usuario='$a',telefono_usuario='$t',direccion_usuario='$d', rango_edad='$e', discapacidad='$ds' WHERE id_usuario='$i'";
    echo $result = mysqli_query($conexion, $sql);

/** Eliminar Usuario. * */
} elseif ($var == "eliminar") {
    $id = $_POST['id'];
    $sql = "DELETE from usuarios where id_usuario='$id'";
    echo $result = mysqli_query($conexion, $sql);
} else {
    /** Mensaje de error. * */
    echo "Error...";
}