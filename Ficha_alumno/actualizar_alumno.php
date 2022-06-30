<?php
$id_alumno = $_POST['id_alumno'];
$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$genero=$_POST['genero'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$lugar_nacimiento=$_POST['lugar_nacimiento'];
$direccion=$_POST['direccion'];
$nacionalidad=$_POST['nacionalidad'];
$cuil=$_POST['cuil'];
$secundario=$_POST['secundario'];
$lugar_secundario=$_POST['lugar_secundario'];
// $alergia=$_POST['alergia'];
// $tipo_alergia=$_POST['tipo_alergia'];
// $enfermedad=$_POST['enfermedad'];
//
// if(strlen($nombre)>=30){
// 	echo '<script>alert("El nombre del alumno no debe superar los 30 caracteres."); window.location="formulario_alumno";</script>';
// 	exit;
// }
//conectar a la bdd
include "../conexion.php";

//armar la consulta sql
$sql ="update alumnos set dni='$dni',nombre='$nombre',apellido='$apellido',correo='$correo',sexo=$genero[0],fecha_nacimiento='$fecha_nacimiento',lugar_nacimiento='$lugar_nacimiento', direccion='$direccion',nacionalidad=$nacionalidad[0], cuil='$cuil', secundario=$secundario[0],lugar_secundario='$lugar_secundario' where id_alumno=$id_alumno";

//ejecutar la consulta
$res = mysqli_query($con,$sql);

//controlar la ejecución y feedback al usuario 
if ($res) {
	//ejecucion de la consulta exitosa
	// (cartel en javascript y redireccionamiento)
	echo '<script>alert("Alumno actualizado!");window.location="lista_alumno.php";</script>';
}else{
	//ejecucion de la consulta con error
	echo '<script>alert("Error al actualizar!");</script>';
}
//cerrar la base
mysqli_close($con);

?>