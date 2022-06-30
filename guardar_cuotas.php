<?php
$datos = $_POST['datos'];
$mes_pago = $_POST['mes_pago'];
$importe = $_POST['importe'];


if($importe<4500){
    echo'<script>alert("El importe de la cuota debe ser minimo 4500$"); window.location="cuotas.php";</script>';
    exit;
} 
if($importe>4500){
    echo'<script>alert("El importe de la cuota no debe ser mayor a 4500$"); window.location="cuotas.php";</script>';
    exit;
} 
include "conexion.php";

$sql="Select * from cuotas where datos=$datos[0] and importe=4500 and mes_pago=$mes_pago[0]";
$res_sel = mysqli_query($con,$sql);
$nro_filas_dev=mysqli_num_rows($res_sel);
if($nro_filas_dev!=0){
    echo'<script>alert("El alumno ya pagó la cuota de este mes"); window.location="cuotas.php";</script>';
    exit;
}


$sql = "INSERT INTO cuotas(datos,mes_pago,importe) values ($datos[0],$mes_pago[0],$importe)";

$resultado = mysqli_query($con,$sql);

//controlar la respuesta y dar feedback
if($resultado){
    //todo se ejecuto correctamente
    echo'<script>alert("La cuota fue registrada correctamente"); window.location="cuotas.php";</script>';
}else{
    //Hubo un error al insertar
    echo'<script>alert("Hubo un error al registrar la cuota"); window.location="cuotas.php";</script>';
}
//cerrar el enlace a la bdd
mysqli_close($con);
?>



?>