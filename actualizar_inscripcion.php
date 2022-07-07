<?php
$dni=$_POST['dni'];
$curso=$_POST['curso'];
$especialidad = $_POST['especialidad'];
//conectar a la bdd
include "conexion.php";

//armar la consulta sql
$sql ="update inscripciones set cod_curso='$curso[0]', id_especialidad='$especialidad[0]' where dni='$dni'";

//ejecutar la consulta
$res = mysqli_query($con,$sql);

//controlar la ejecución y feedback al usuario 
if ($res) {
	//ejecucion de la consulta exitosa}
	// (cartel en javascript y redireccionamiento)
	echo '<script>alert("Inscripcion actualizado!");window.location="inscripcion_listar.php";</script>';
}else{
	//ejecucion de la consulta con error
	echo '<script>alert("Error al actualizar!");</script>';
}
//cerrar la base
mysqli_close($con);

?>
