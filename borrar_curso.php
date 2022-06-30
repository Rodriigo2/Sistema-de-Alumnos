<?php
$codigo =$_GET['cod'];

$sql ="delete from cursos where cod_curso='$codigo'";
include "conexion.php";




$salida = mysqli_query($con,$sql);
if($salida){
	//borrado el usuario
	echo '<script>alert("Se borró el CURSO!");window.location="curso_listar.php";  </script>';
}else{
	//hubo un error al borrar
	echo '<script>alert("Error al borrar el Curso!"); window.location="curso_listar.php"; </script>';
}

mysqli_close($con);

?>