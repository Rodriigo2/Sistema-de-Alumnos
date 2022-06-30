<?php
//recibir datos
$nombre = $_POST['txt_name'];
$clave = $_POST['pass'];
$correo = $_POST['correo'];

//validar datos
if($nombre==""){
    echo'<script>alert("El nombre debe ser un texto válido"); window.location="crear_cuenta.html";</script>';
    exit;
}


if($clave==""){
    echo'<script>alert("El campo contraseña no debe estar vacio."); window.location="crear_cuenta.html";</script>';
    exit;
}

//conectar base de datos
include "../conexion.php";

//validar repeticiones nombre y correo
$sql="Select * from usuarios where email='$correo' or nombre='$nombre'";
$res_sel = mysqli_query($con,$sql);
$nro_filas_dev=mysqli_num_rows($res_sel);
if($nro_filas_dev !=0){
    echo'<script>alert("Ya existe un correo electrónico/nombre de usuario con los datos provistos"); window.location="crear_cuenta.html";</script>';
    exit;
}

//armar query
$sql = "INSERT INTO usuarios(nombre,clave,codestado,email) VALUES ('$nombre','$clave',1,'$correo')";

//ejecutar la query
$resultado = mysqli_query($con,$sql);

//controlar la respuesta y dar feedback
 if($resultado){
     //todo se ejecuto correctamente
     echo'<script>alert("El usuario se creó con éxito"); window.location="crear_cuenta.html";</script>';
 }else{
     //Hubo un error al insertar
     echo'<script>alert("Hubo un error al crear el usuario"); window.location="crear_cuenta.html";</script>';
 }
//cerrar el enlace a la bdd
mysqli_close($con);
?>