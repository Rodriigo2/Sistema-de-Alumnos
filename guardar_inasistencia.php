<?php
$datos = $_POST['datos'];
$curso = $_POST['curso'];
$fecha = $_POST['fecha'];

include "conexion.php";

$sql="Select * from inasistencias where dni=$datos[0] and fecha='$fecha'";
$res_sel = mysqli_query($con,$sql);
$nro_filas_dev=mysqli_num_rows($res_sel);
if($nro_filas_dev!=0){
    echo'<script>alert("La inasistencia del alumno ya se registró para el día ingresado"); window.location="inasistencia.php";</script>';
    exit;
}

$sql = "INSERT INTO inasistencias(dni,curso,fecha) values ($datos[0],$curso[0],'$fecha')";

$resultado = mysqli_query($con,$sql);

//controlar la respuesta y dar feedback
if($resultado){
    //todo se ejecuto correctamente
    echo'<script>alert("La inasistencia fue registrada correctamente"); window.location="inasistencia.php";</script>';
}else{
    //Hubo un error al insertar
    echo'<script>alert("Hubo un error al registrar la inasistencia"); history.go(-1);</script>';
}
//cerrar el enlace a la bdd
mysqli_close($con);
?>

?>