<?php
$id_alumno =$_GET['id'];

$sql ="delete from alumnos where id_alumno='$id_alumno'";
include "../conexion.php";




$salida = mysqli_query($con,$sql);
if($salida){
	//borrado el usuario
	echo '<script>alert("Se borró el ALUMNO!");window.location="lista_alumno.php";  </script>';
}else{
	//hubo un error al borrar
	echo '<script>alert("Error al borrar el alumno!"); window.location="lista_alumno.php"; </script>';
}

mysqli_close($con);

?>