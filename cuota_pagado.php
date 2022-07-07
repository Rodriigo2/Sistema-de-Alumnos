<?php
$dni = $_POST['dni'];
$nrocuota = $_POST['nrocuota'];
$saldo = $_POST['saldo'];
$importe = $_POST['importe'];


if($importe<=0){
    echo'<script>alert("El importe debe ser un número positivo"); history.go(-1);</script>';
    exit;
}

if($importe>$saldo){
    echo'<script>alert("El importe no puede ser mayor que el saldo"); history.go(-1);</script>';
    exit;
}

include "conexion.php";

$sql = "UPDATE cuotas set saldo=$saldo-$importe, importe=$importe  where dni=$dni and nrocuota=$nrocuota";
$res=mysqli_query($con, $sql);
if($res){
    $sql2 = "SELECT * FROM cuotas where dni=$dni and nro=$nrocuota and saldo=0.00 and estado_cuota=1";
    $res2=mysqli_query($con,$sql2);
    $sql = "UPDATE cuotas set estado_cuota=0  where dni=$dni and nrocuota=$nrocuota and saldo=0.00";
    $res=mysqli_query($con, $sql);
    echo '<script>alert("Cuota pagada exitosamente!");window.location="index.html";</script>';
}else{
    echo '<script>alert("Error al pagar la cuota!");history.go(-1);</script>';
}
mysqli_close($con);
?>