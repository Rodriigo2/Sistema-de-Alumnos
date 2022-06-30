<?php
$codigo=$_POST['cod_us'];
$nombre=$_POST['nombre'];
$clave =$_POST['clave'];
$codestado = $_POST['codestado'];
$email = $_POST['email'];


include "../conexion.php";

$sql = "UPDATE usuarios set nombre = '$nombre', clave='$clave', codestado=$codestado[0],email='$email' where cod_us=$codigo";


$res=mysqli_query($con, $sql);

if($res){
    echo '<script>alert("Se actualizaron los datos correctamente!");window.location="lista_usuario.php";</script>';
}else{
    echo '<script>alert("Error no se actualizaron los datos!");window.location="lista_usuario.php";</script>';
}
mysqli_close($con);

?>