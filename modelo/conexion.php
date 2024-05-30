<?php
function conexion() {
    $servidor = "localhost";
    $usuario = "root";
    $bd = "pvd";
    $password = "";
    $conexion = mysqli_connect($servidor, $usuario, $password, $bd);
    return $conexion;
}
if (conexion()) {
    
} else {
    echo "No conectado";
}