<?php
//recibir datos
$codigo = $_POST['txtcod'];
$nombre = $_POST['txtnombre'];
$valor = $_POST['valor'];

//validar los datos
if($codigo<=0){
    echo'<script>alert("El código debe ser un número positivo"); window.location="especialidad.html";</script>';
    exit;
}

if($nombre==""){
    echo'<script>alert("El nombre debe ser un texto válido"); window.location="especialidad.html";</script>';
    exit;
}

if($valor<=0){
    echo'<script>alert("El valor debe ser un número positivo"); window.location="especialidad.html";</script>';
    exit;
}

//conectarse a la base de datos
include "conexion.php";
//valido que no exista el curso o el código
$sql="Select * from especialidades where desc_especialidad='$nombre' or id_especialidad=$codigo ";
$res_sel = mysqli_query($con,$sql);
$nro_filas_dev=mysqli_num_rows($res_sel);
if($nro_filas_dev !=0){
    echo'<script>alert("Ya existe una especialidad con los datos provistos"); window.location="especialidad.html";</script>';
    exit;
}
//armar la query sql
$sql = "INSERT INTO especialidades(id_especialidad,desc_especialidad,valor) VALUES ($codigo,'$nombre',$valor)";

//ejecutar la query
$resultado = mysqli_query($con,$sql);

//controlar la respuesta y dar feedback
if($resultado){
    //todo se ejecuto correctamente
    echo'<script>alert("La especialidad se creó con éxito"); window.location="especialidad.html";</script>';
}else{
    //Hubo un error al insertar
    echo'<script>alert("Hubo un error al crear la especialidad"); history.go(-1);</script>';
}
//cerrar el enlace a la bdd
mysqli_close($con);
?>