<?php
$codigo=$_GET['codigo'];

$sql ="delete from usuarios where cod_us=$codigo";
include "../conexion.php";




$salida = mysqli_query($con,$sql);
if($salida){
	//borrado el usuario
	echo '<script>alert("Se borró el Usuario!");window.location="lista_usuario.php";  </script>';
}else{
	//hubo un error al borrar
	echo '<script>alert("Error al borrar el Usuario!"); window.location="lista_usuario.php"; </script>';
}

mysqli_close($con);

?>