<?php
$codigo =$_GET['cod'];

$sql ="delete from especialidades where id_especialidad='$codigo'";
include "conexion.php";




$salida = mysqli_query($con,$sql);
if($salida){
	//borrado el usuario
	echo '<script>alert("Se borró la especialidad!");window.location="especialidad_lista.php";  </script>';
}else{
	//hubo un error al borrar
	echo '<script>alert("Error al borrar la especialidad!"); window.location="especialidad_lista.php"; </script>';
}

mysqli_close($con);

?>