<?php
$cod_curso=$_POST['txtcod'];
$nombre_curso=$_POST['txtnombre'];
//conectar a la bdd
include "conexion.php";

//armar la consulta sql
$sql ="update cursos set nombre_curso='$nombre_curso' where cod_curso='$cod_curso'";

//ejecutar la consulta
$res = mysqli_query($con,$sql);

//controlar la ejecución y feedback al usuario 
if ($res) {
	//ejecucion de la consulta exitosa}
	// (cartel en javascript y redireccionamiento)
	echo '<script>alert("Curso actualizado!");window.location="curso_listar.php";</script>';
}else{
	//ejecucion de la consulta con error
	echo '<script>alert("Error al actualizar!");</script>';
}
//cerrar la base
mysqli_close($con);

?>
