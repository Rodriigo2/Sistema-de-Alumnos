<?php
$alumno = $_POST['alumno'];
$especialidad = $_POST['especialidad'];
$curso = $_POST['curso'];
$datos = $_POST['datos'];

if($datos==0){
    echo'<script>alert("Debe confirmar que los datos sean correctos."); window.location="inscripciones.php";</script>';
    exit;
}

if($alumno[0]==0){
    echo'<script>alert("Seleccione un alumno válido."); window.location="inscripciones.php";</script>';
    exit;
}
if($especialidad[0]==0){
    echo'<script>alert("Seleccione una especialidad válida."); window.location="inscripciones.php";</script>';
    exit;
}
if($curso[0]==0){
    echo'<script>alert("Seleccione un curso válido."); window.location="inscripciones.php";</script>';
    exit;
}
include "conexion.php";

$sql="Select * from inscripciones where dni=$alumno[0]";
$res_sel = mysqli_query($con,$sql);
$nro_filas_dev=mysqli_num_rows($res_sel);
if($nro_filas_dev!=0){
    echo'<script>alert("El alumno ya está inscripto"); window.location="inscripciones.php";</script>';
    exit;
}

$sql = "INSERT INTO inscripciones(dni,id_especialidad,cod_curso) values ($alumno[0],$especialidad[0],$curso[0])";

$resultado = mysqli_query($con,$sql);

//controlar la respuesta y dar feedback
if($resultado){
    for($i=0;$i < 11;$i++){
    $qslq="Select valor from especialidades where id_especialidad=$especialidad[0]";
    $resultado=mysqli_query($con,$qslq);
    if(empty($resultado)){
        echo'<script>alert("Error al inscribir. No se pudo obtener el valor de la cuota"); window.location="inscripciones.php";</script>';
        exit;
    }
    $fila = mysqli_fetch_array($resultado);
    $valor=$fila['valor'];

    $sql = "INSERT INTO cuotas(dni,nrocuota,importe,saldo) values ($alumno[0],$i,$valor,$valor)";

        $resultado = mysqli_query($con,$sql);      
    }
    echo'<script>alert("Se inscribio al alumno con Exito!!"); window.location="inscripciones.php";</script>';
    //todo se ejecuto correctamente
}else{
    //Hubo un error al insertar
    echo'<script>alert("Hubo un error al inscribir al alumno"); history.go(-1)";</script>';
    exit;
}
//cerrar el enlace a la bdd
mysqli_close($con);
?>