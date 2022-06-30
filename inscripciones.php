<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Inscripciones</title>
</head>
<body>
<header><h1>Pantalla Inscripciones</h1>
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
            <li><a href="justificar-inasistencia.php">Justificación Inasistencia</a></li>
             <li><a href="#">Cargar Asistencia</a></li> -->
        <!-- </ul>
    </ul>
</nav>
</div>  -->
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
<div>
<main>
    <div align="center">
    <form action="guardar_inscripcion.php" method="POST" class="cuotas-form">
    <table>
    <caption><h2>Inscripciones</h2></caption></thead>
    <tr><td><label for="alumno[]">Alumno</label></td>
    <td><select name="alumno[]" id="alumno[]">
        <option value="0">Seleccione un alumno</option>
            <?php
            include "conexion.php";
                    $sql="SELECT id_alumno,dni,nombre,apellido FROM alumnos order by apellido,nombre";
                    $datas = mysqli_query($con,$sql);
                    if(empty($datas)){
                        echo '<script>alert("No se encontraron datos de alumnos. No se puede continuar."); window.location="index.html";</script>';
                        exit;
                    }else{
                        $nfilas= mysqli_num_rows($datas);
                        if($nfilas>0){
                            while ($fila = mysqli_fetch_array($datas)) {
                                echo "<option value=".$fila['dni'].">".$fila['apellido']." ".$fila['nombre']."</option> ";
                            }
                        }
                    }
                
                    ?>
    </select><br></td></tr>
            <tr><td><label for="especialidad">Especialidad</label></td>
            <td><select name="especialidad[]" id="especialidad[]">
            <option value="0">Seleccione una especialidad</option>
            <?php
            include "conexion.php";
            $sql = "SELECT * FROM especialidades order by id_especialidad";
            $datas = mysqli_query($con,$sql);
            if(empty($datas)){
                echo '<script>alert("No se encontraron datos de especialidades. No se puede continuar."); window.location="index.html";</script>';
            }else{
                $nfilas = mysqli_num_rows($datas);
                if($nfilas>0){
                    while($fila = mysqli_fetch_array($datas)){
                        echo "<option value=".$fila['id_especialidad'].">".$fila['desc_especialidad']."</option>";
                    }
                }
            }

            ?>
            </select><br></td></tr>        
            <tr><td><label for="curso">Curso</label></td>
                <td><select name="curso[]" id="curso[]">
                <option value="0">Seleccione un curso</option>
                <?php
            include "conexion.php";
            $sql = "SELECT * FROM cursos order by cod_curso";
            $datas = mysqli_query($con,$sql);
            if(empty($datas)){
                echo '<script>alert("No se encontraron datos de cursos. No se puede continuar."); window.location="index.html";</script>';
            }else{
                $nfilas = mysqli_num_rows($datas);
                if($nfilas>0){
                    while($fila = mysqli_fetch_array($datas)){
                        echo "<option value=".$fila['cod_curso'].">".$fila['nombre_curso']."</option>";
                    }
                }
            }
            mysqli_close($con);
            ?>
            </select><br></td></tr>
    </table>
            <a href="Ficha_alumno/formulario_alumno.php" target="_blank" ><u>¿Todavia no te registraste?</u></a><br>
            <input type="checkbox" name="datos[]" id="datos[]" class="datos2"><label for="datos[]" class="datos">¿Todos los datos son correctos?</label><br><br>
            <input type="submit" name="btn-save" id="btn-save" value="Cargar Inscripción">
            <a href="index.html">Volver atrás</a>
    </form>
    </div>
    </main>
    </div>
    <div class="espacio">
    <footer>
    &copy 2022 - Sistema de Alumnos creado por Peralta Rodrigo
    </footer>
</body>
</html>