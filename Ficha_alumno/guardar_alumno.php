<?php
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$sexo = $_POST['sexo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$lugar_nacimiento = $_POST['lugar_nacimiento'];
$direccion = $_POST['direccion'];
$naci = $_POST['nacion'];
$cuil = $_POST['cuil'];
$secundario = $_POST['secundario'];
$lugar = $_POST['lugar'];
// $alergia = $_POST['alergia'];
// $tipo = $_POST['tipo'];
// $enfermedad = $_POST['enfermedad'];

//validar datos
if($nombre ==""){
    echo'<script>alert("El nombre debe ser un texto válido"); history.go(-1);</script>';
    exit;
}

if($apellido ==""){
    echo'<script>alert("El apellido debe ser un texto válido"); history.go(-1);</script>';
    exit;
}

if($dni ==""){
    echo'<script>alert("El DNI debe ser un texto válido"); history.go(-1);</script>';
    exit;
}

if($secundario[0]==0){
    echo'<script>alert("Debe responder si termino el secundario o no."); history.go(-1);</script>';
    exit;
}

// if($alergia[0]==0){
//     echo'<script>alert("Debe responder si tiene alguna alergia o no."); history.go(-1);</script>';
//     exit;
// }

if($sexo[0]==0){
    echo'<script>alert("Ingrese un género válido."); history.go(-1);</script>';
    exit;
}

if($naci[0]==0){
    echo'<script>alert("Ingrese una nacionalidad válida."); history.go(-1);</script>';
    exit;
}


//conectar base de datos
include "../conexion.php";

//validar repeticiones Dni
$sql="Select * from alumnos where dni='$dni' and cuil=$cuil";
$res_sel = mysqli_query($con,$sql);
$nro_filas_dev=mysqli_num_rows($res_sel);
if($nro_filas_dev !=0){
    echo'<script>alert("Ya existe un DNI/Cuil con los datos provistos"); window.location="formulario_alumno.php";</script>';
    exit;
}

$sql="Select * from alumnos where correo='$correo'";
$res_sel = mysqli_query($con,$sql);
$nro_filas_dev=mysqli_num_rows($res_sel);
if($nro_filas_dev !=0){
    echo'<script>alert("Ya existe un Correo electrónico con los datos provistos"); window.location="formulario_alumno.php";</script>';
    exit;
}

//armar query
$sql = "insert into alumnos(dni,nombre, apellido, correo, sexo, fecha_nacimiento, lugar_nacimiento, direccion, nacionalidad,cuil, secundario, lugar_secundario) VALUES ('$dni','$nombre','$apellido','$correo',$sexo[0],'$fecha_nacimiento','$lugar_nacimiento','$direccion',$naci[0],'$cuil',$secundario[0],'$lugar')";

//ejecutar la query
$resultado = mysqli_query($con,$sql);

//controlar la respuesta y dar feedback
if($resultado){
    //todo se ejecuto correctamente
    echo'<script>alert("El alumno se registro con éxito"); window.location="formulario_alumno.php";</script>';
}else{
    //Hubo un error al insertar
    echo'<script>alert("Hubo un error al registrar el alumno"); window.location="formulario_alumno.php";</script>';
}
//cerrar el enlace a la bdd
mysqli_close($con);
?>