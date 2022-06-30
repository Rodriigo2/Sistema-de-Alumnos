<?php
$cod=$_POST['codigo'];
$des=$_POST['des'];


include "conexion.php";

$sql = "UPDATE nacionalidades set desc_nacion = '$des' where nacionalidad=$cod";


$res=mysqli_query($con, $sql);

if($res){
    echo '<script>alert("Se actualizaron los datos correctamente!");window.location="listar_nacionalidades.php";</script>';
}else{
    echo '<script>alert("Error no se actualizaron los datos!");window.location="listar_nacionalidades.php";</script>';
}
mysqli_close($con);

?>