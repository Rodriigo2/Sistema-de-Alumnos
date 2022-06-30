<?php
$id_especialidad=$_POST['txtcod'];
$nombre_especialidad=$_POST['txtnombre'];
//conectar a la bdd
include "conexion.php";

//armar la consulta sql
$sql ="update especialidades set desc_especialidad='$nombre_especialidad' where id_especialidad='$id_especialidad'";

//ejecutar la consulta
$res = mysqli_query($con,$sql);

//controlar la ejecución y feedback al usuario 
if ($res) {
	//ejecucion de la consulta exitosa}
	// (cartel en javascript y redireccionamiento)
	echo '<script>alert("Especialidad Actualizada!");window.location="especialidad_lista.php";</script>';
}else{
	//ejecucion de la consulta con error
	echo '<script>alert("Error al actualizar!");</script>';
}
//cerrar la base
mysqli_close($con);

?>
