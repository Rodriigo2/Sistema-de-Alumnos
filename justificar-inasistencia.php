<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Justificar Inasistencia</title>
</head>
<body>
<header><h1>Pantalla Justificacion</h1>
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
    <div align="center" class="justificar-form">
        <form action="guardar_justificacion.php" method="post" enctype="multipart/form-data">
            <table>
            <caption><h2>Justificación de Inasistencia</h2></caption></thead>
            <tr>
                    <td><label for="datos[]">Datos alumno</label></td>
                <td><select name="datos[]" id="datos[]">
            <?php
            include "conexion.php";
                    $sql="select * from alumnos order by apellido,nombre";
                    $datas = mysqli_query($con,$sql);
                    if(empty($datas)){
                        echo "<option value='0'>No hay datos</option>";
                    }else{
                        $nfilas= mysqli_num_rows($datas);
                        if($nfilas>0){
                            while ($fila = mysqli_fetch_array($datas)) {
                                echo "<option value=".$fila['dni'].">".$fila['apellido'].' '.$fila['nombre']."</option>";
                            }
                        }
                    }
                
            ?>        
            </select></td></tr>
                <tr>
                    <td><label for="fecha">Fecha</label></td>
                    <td><input type="text" name="fecha" id="fecha" placeholder="DD/MM/AA"></td>
                </tr>
                <tr>
                    <td><label for="motivo">Motivo</label></td>
                    <td><input type="text" name="motivo" id="motivo"></td>
                </tr>
                <tr>
                    <td><label for="inasistencia">Fecha Inasistencia</label></td>
                    <td><input type="text" name="inasistencia" id="inasistencia" placeholder="DD/MM/AA"></td>
                </tr>
            </table>
            <input type="submit" name="cargar" id="cargar" value="Cargar justificatorio">
        </form>
    <br>
    <a href="index.html">Volver a inicio</a>
</div>
</main>
<div class="espacio">
    <footer>
    &copy 2022 - Sistema de Alumnos creado por Peralta Rodrigo
    </footer>
</body>
</html>