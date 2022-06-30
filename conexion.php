<?php

$con = mysqli_connect("localhost","root","","sistema_alumnos");

if(!$con){
    die("Error al conectar");
}
// if($con){
//     echo "Base de datos Conectada";
//     mysqli_close($con);
// }else{
//     echo"Error al conectar a la base de datos";
// }

?>