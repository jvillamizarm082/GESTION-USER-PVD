<?php
session_start();//Codigo propio de php para seguridad

require_once 'conexion.php';
$conexion = conexion();

$id = $_POST['id_admin'];
$clave = $_POST['contrasena'];

$sql = "SELECT * FROM admin WHERE id_admin='$id' and contrasena='$clave'";
$resultado = mysqli_query($conexion, $sql);

$_SESSION['id_admin'] = $id;
$_SESSION['contrasena'] = $clave;

$filas = mysqli_num_rows($resultado);
if ($filas > 0) {
	header("location:../vista/usuario.php");
} else {
	
	echo "<h1>Error de autentificación</h1>";
	echo "<a href='../vista/sesion.php'><button type='button' class='close'>VOLVER</button></a>";

	//echo '<script>
			/*alert("Error De Autenticación USUARIO y CONTRASEÑA NO coinciden!")
			window.location.href=("../vista/sesion.php")
		 </script>';*/
		 
	//header("location:../vista/sesion.php?myModalError");

}
mysqli_free_result($resultado); //Linea para borrar datos que quedan en el arreglo
mysqli_close($conexion);//cerrar sesion de 



