<?php
//recibir datos
$codigo = $_POST['txtcod'];
$nombre = $_POST['txtnombre'];

//validar los datos
if($codigo<=0){
    echo'<script>alert("El código debe ser un número positivo"); window.location="cursos.html";</script>';
    exit;
}

if($nombre==""){
    echo'<script>alert("El nombre debe ser un texto válido"); window.location="cursos.html";</script>';
    exit;
}

//conectarse a la base de datos
include "conexion.php";
//valido que no exista el curso o el código
$sql="Select * from cursos where nombre_curso='$nombre' or cod_curso=$codigo ";
$res_sel = mysqli_query($con,$sql);
$nro_filas_dev=mysqli_num_rows($res_sel);
if($nro_filas_dev !=0){
    echo'<script>alert("Ya existe un curso con los datos provistos"); window.location="cursos.html";</script>';
    exit;
}
//armar la query sql
$sql = "INSERT INTO cursos(cod_curso,nombre_curso) VALUES ($codigo,'$nombre')";

//ejecutar la query
$resultado = mysqli_query($con,$sql);

//controlar la respuesta y dar feedback
if($resultado){
    //todo se ejecuto correctamente
    echo'<script>alert("El curso se creó con éxito"); window.location="cursos.html";</script>';
}else{
    //Hubo un error al insertar
    echo'<script>alert("Hubo un error al crear el Curso"); window.location="cursos.html";</script>';
}
//cerrar el enlace a la bdd
mysqli_close($con);
?>