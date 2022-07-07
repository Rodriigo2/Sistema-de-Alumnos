<?php
$dni=$_GET['cod'];
$especialidad=$_GET['especialidad'];

$sql ="delete from inscripciones where dni='$dni' and id_especialidad=$especialidad";
include "conexion.php";




$salida = mysqli_query($con,$sql);
if($salida){
	//borrado el usuario
	echo '<script>alert("Se borró la Inscripción!");window.location="inscripcion_listar.php";  </script>';
}else{
	//hubo un error al borrar
	echo '<script>alert("Error al borrar la inscripcion!"); window.location="inscripcion_listar.php"; </script>';
}

mysqli_close($con);

?>