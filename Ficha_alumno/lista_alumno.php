<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Listado de alumnos</title>
</head>
<body>
<header><h1>Pantalla Lista alumnos</h1>
<img class="img-alumno" src="../images/alumno.png" alt="Alumno-foto" align="right"></header>
<!-- <div class="navbar">
    <nav>
    <ul>
    <div class="box-">
        <li><a href="../index.html">Inicio</a></li>
       </div>
        <div class="box-1">
        <li><a href="../formulario/login.html">Usuarios</a></li>
       </div>
       <div class="box-2">
       <li><a href="formulario_alumno.php">Alumno</a></li>
    </div>
    <div class="box-3">
        <li><a href="../cursos.html">Cursos</a></li>
    </div>
    <div class="box-4">
        <li><a href="../inscripciones.php">Inscripciones</a></li>
    </div>
    <div class="box-5">
        <li><a href="../cuotas.php">Cuotas</a></li>
    </div>
    <div class="box-6">
        <li><a href="../inasistencia.php">Inasistencias</a></li>
    </div>
        <ul>
            <li><a href="../justificar-inasistencia.php">Justificación Inasistencia</a></li> -->
            <!-- <li><a href="#">Cargar Asistencia</a></li> -->
        <!-- </ul>
    </ul>
</nav>
</div> -->
<div id="header">
    <ul class="nav">
        <li><a href="../index.html">Inicio</a></li>
        <li><a href="formulario_alumno.php">Alumno</a>
        <!-- <ul>
            <li><a href="../formulario/login.html">Usuario</a></li>
        </ul> -->
    </li>
        <li><a href="../cursos.html">Cursos</a></li>
        <li><a href="../inscripciones.php">Inscripciones</a>
        <ul>
            <li><a href="../cuotas.php?nrodoc=0">Cuotas</a></li>
        </ul>
        </li>
        <li><a href="../inasistencia.php">Inasistencias</a>
            <ul>
                <li><a href="../justificar-inasistencia.php">Justificación de Inasistencia</a></li>
            </ul>
        </li>
        <li><a href="../formulario/logout.php" class="logout">Cerrar Sesión</a></li>
    </ul>
</div>
<main>
<div class="table-wrapper3"> 
<table border="1" bgcolor="white" class="fl-table">
    <thead>
        <tr><th>ID_Alumno</th><th>Dni</th><th>Nombre</th><th>Apellido</th><th>Correo</th><th>Sexo</th><th>Fecha nacimiento</th><th>Lugar de nacimiento</th><th>Dirección</th><th>Nacionalidad</th><th>Cuil</th><th>Secundario</th><th>Lugar Secundario</th></tr>
    </thead>
    <tbody>
<?php
include "../conexion.php";
$sql="Select alumnos.*,generos.desc_genero,nacionalidades.desc_nacion, secundario.desc_secundario from alumnos inner join generos on alumnos.sexo=generos.id_genero inner join nacionalidades on alumnos.nacionalidad=nacionalidades.nacionalidad inner join secundario on alumnos.secundario=secundario.id_secundario order by id_alumno";
$resultado = mysqli_query($con,$sql);
if(empty($resultado)){
echo'No existen datos que mostrar';
}else{
    while($fila = mysqli_fetch_array($resultado)){
        //creo las filas
        echo "<tr><td width='50' height='50'>".$fila['id_alumno']."</td>";
        echo "<td>".$fila['dni']."</td>";
        echo "<td>".$fila['nombre']."</td>";
        echo "<td>".$fila['apellido']."</td>";
        echo "<td>".$fila['correo']."</td>";
        echo "<td>".$fila['desc_genero']."</td>";
        echo "<td>".$fila['fecha_nacimiento']."</td>";
        echo "<td>".$fila['lugar_nacimiento']."</td>";
        echo "<td>".$fila['direccion']."</td>";
        echo "<td>".$fila['desc_nacion']."</td>";
        echo "<td>".$fila['cuil']."</td>";
        echo "<td>".$fila['desc_secundario']."</td>";
        echo "<td>".$fila['lugar_secundario']."</td>";
        // echo "<td>".$fila['alergias']."</td>";
        // echo "<td>".$fila['tipo_alergia']."</td>";
        // echo "<td>".$fila['enfermedad']."</td>";
        echo '<td><a href="modif_alumno.php?id='.$fila['id_alumno'].'">Modificar</a></td>';
        echo '<td><a href="borrar_alumno.php?id='.$fila['id_alumno'].'">Eliminar</a></td></tr>';
    }
}
mysqli_close($con);
?>
</tbody>
</table></div>
<br>
<div align="center" class="btn-atras">
<a href="formulario_alumno.php">Volver atrás</a>
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