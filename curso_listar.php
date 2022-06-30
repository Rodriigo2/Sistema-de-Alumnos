<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Listado de cursos</title>
</head>
<body>
<header><h1>Pantalla Lista curso</h1>
<img class="img-alumno" src="images/alumno.png" alt="Alumno-foto" align="right"></header>
    <!-- <div class="navbar">
    <nav>
    <ul>
    <div class="box-">
        <li><a href="index.html">Inicio</a></li>
       </div>
        <div class="box-1">
        <li><a href="formulario/login.html">Usuarios</a></li>
       </div>
       <div class="box-2">
       <li><a href="ficha_alumno/formulario_alumno.php">Alumno</a></li>
    </div>
    <div class="box-3">
        <li><a href="cursos.html">Cursos</a></li>
    </div>
    <div class="box-4">
        <li><a href="inscripciones.php">Inscripciones</a></li>
    </div>
    <div class="box-5">
        <li><a href="cuotas.php">Cuotas</a></li>
    </div>
    <div class="box-6">
        <li><a href="inasistencia.php">Inasistencias</a></li>
    </div>
        <ul>
            <li><a href="justificar-inasistencia.php">Justificación Inasistencia</a></li> -->
            <!-- <li><a href="#">Cargar Asistencia</a></li> -->
        <!-- </ul>
    </ul>
</nav>
</div> -->
<div id="header">
    <ul class="nav">
        <li><a href="index.html">Inicio</a></li>
        <li><a href="ficha_alumno/formulario_alumno.php">Alumno</a>
        <ul>
            <li><a href="formulario/login.html">Usuario</a></li>
        </ul></li>
        <li><a href="cursos.html">Cursos</a></li>
        <li><a href="inscripciones.php">Inscripciones</a>
        <ul>
            <li><a href="cuotas.php">Cuotas</a></li>
        </ul>
        </li>
        <li><a href="inasistencia.php">Inasistencias</a>
            <ul>
                <li><a href="justificar-inasistencia.php">Justificación de Inasistencia</a></li>
            </ul>
        </li>
    </ul>
</div>
<main>
<div align="center" class="table-wrapper">
<table border="1" bgcolor="white" class="fl-table">
    <thead>
        <tr><th>Código</th><th>Nombre</th></tr>
    </thead>
    <tbody>
<?php
include "conexion.php";
$sql="Select * from cursos order by cod_curso";
$resultado = mysqli_query($con,$sql);
if(empty($resultado)){
echo'No existen datos que mostrar';
}else{
    while($fila = mysqli_fetch_array($resultado)){
        //creo las filas
        echo "<tr><td>".$fila['cod_curso']."</td>";
        echo "<td>".$fila['nombre_curso']."</td>";
        echo '<td><a href="modif_lista.php?cod='.$fila['cod_curso'].'">Modificar</a></td>';
        echo '<td><a href="borrar_curso.php?cod='.$fila['cod_curso'].'">Eliminar</a></td></tr>';
    }
}
mysqli_close($con);
?>
</tbody>
</table>
</div>
<br>
<div class="btn-atras">
<a href="cursos.html">Volver atrás</a>
</div>
</main>
<div class="espacio">
    <footer>
    &copy 2022 - Sistema de Alumnos creado por Peralta Rodrigo
    </footer>
</body>
</html>

<?php
?>