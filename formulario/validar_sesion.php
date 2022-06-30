<?php

$correo = $_POST ['mail'];
$clave = $_POST ['pass'];
$codestado = ['codestado'];

if($correo==""){
      echo'<script>alert("El campo correo no debe estar vacio"); window.location="login.html";</script>';
      exit;
  }
  
  if($clave==""){
      echo'<script>alert("El campo contraseña no debe estar vacio."); window.location="login.html";</script>';
      exit;
  }

session_start();

$_SESSION['correo'] = $correo;

include "../conexion.php";
 
$sql = "Select * from usuarios where clave='$clave' and email='$correo' and codestado=1";

$resultado = mysqli_query($con,$sql);

$filas=mysqli_num_rows($resultado);

if($filas==0){
    echo'<script>alert("No existe una cuenta registrada con esos datos o su cuenta se encuentra inactiva."); window.location="login.html";</script>';
    exit;
}

if($filas){
      echo'<script>alert("Inicio de sesión exitoso"); window.location="../index.html";</script>';
}else{
      echo'<script>alert("Error en la autentificación o su cuenta se encuentra inactiva"); window.location="login.html";</script>';
 }

mysqli_free_result($resultado);
mysqli_close($con);