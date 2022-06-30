<?php
$datos = $_POST['datos'];
$fecha = $_POST['fecha'];
$motivo = $_POST['motivo'];
$fecha_inasistencia = $_POST['inasistencia'];

if($motivo==""){
    echo'<script>alert("Debe ingresar el motivo de la inasistencia"); window.location="justificar-inasistencia.php";</script>';
    exit;
}
if($fecha==""){
    echo'<script>alert("Debe ingresar la fecha del día de la justificación"); window.location="justificar-inasistencia.php";</script>';
    exit;
}
if($fecha_inasistencia==""){
    echo'<script>alert("Debe ingresar la fecha de la inasistencia"); window.location="justificar-inasistencia.php";</script>';
    exit;
}
//conectarse a la base de datos
include "conexion.php";

//
$sql = "Select * from justificaciones where dni=$datos[0] and fecha_inasistencia=$fecha_inasistencia";
$res_sel = mysqli_query($con,$sql);
$nro_filas_dev=mysqli_num_rows($res_sel);
if($nro_filas_dev!=0){
    echo'<script>alert("El alumno ya justifico la inasistencia de esta fecha"); history.go(-1);</script>';
    exit;
}
//armar la query sql
$sql = "INSERT INTO justificaciones(dni,fecha,motivo,fecha_inasistencia) VALUES ($datos[0],'$fecha','$motivo','$fecha_inasistencia')";

//ejecutar la query
$resultado = mysqli_query($con,$sql);

//controlar la respuesta y dar feedback
if($resultado){
    //todo se ejecuto correctamente
    echo'<script>alert("El justificatorio se cargo con éxito"); window.location="justificar-inasistencia.php";</script>';
}else{
    //Hubo un error al insertar
    echo'<script>alert("Hubo un error al cargar el justificatorio"); history.go(-1);</script>';
}
//cerrar el enlace a la bdd
mysqli_close($con);




?>