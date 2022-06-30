<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Cuotas</title>
</head>
<body>
<header><h1>Pantalla Cuotas</h1>
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
    <div align="center" class="cuotas-form">
        <form action="guardar_cuotas.php" method="POST">
            <table>
            <caption><h2>Cuotas de alumnos</h2></caption></thead>
                <tr>
                    <td><label for="datos[]">Datos alumno</label></td>
                <td><select name="datos[]" id="datos[]">
            <?php
            include "conexion.php";
                    $sql="select * from alumnos order by id_alumno";
                    $datas = mysqli_query($con,$sql);
                    if(empty($datas)){
                        echo "<option value='0'>No hay datos</option>";
                    }else{
                        $nfilas= mysqli_num_rows($datas);
                        if($nfilas>0){
                            while ($fila = mysqli_fetch_array($datas)) {
                                echo "<option value=".$fila['id_alumno'].">".$fila['dni'].' '.$fila['nombre'].' '.$fila['apellido']."</option>";
                            }
                        }
                    }
                
            ?>        
            </select></td></tr>
                <tr>
                    <td><label for="mes_pago[]">Mes pago</label></td>
                    <td><select name="mes_pago[]" id="mes_pago[]">
                    <?php
                    $sql="select * from mes_pago order by id_mes";
                    $datas = mysqli_query($con,$sql);
                    if(empty($datas)){
                        echo "<option value='0'>No hay datos</option>";
                    }else{
                        $nfilas= mysqli_num_rows($datas);
                        if($nfilas>0){
                            while($fila = mysqli_fetch_array($datas)) {
                                echo "<option value=".$fila['id_mes'].">".$fila['des_mes']."</option>";
                            }
                        }
                    }
                        ?>  
                    </select></td>
                </tr>
                <tr>
                    <td><label for="importe">Importe</label></td>
                    <td><input type="number" name="importe" id="importe" placeholder="Ingrese el importe"></td>
                </tr>
            </table>
            <input type="submit" name="btn-cargar" id="btn-cargar" value="Cargar pago">
        </form>
    
    <br>
    <a href="index.html">Volver a inicio</a><br>
</div>
</main>
<div class="espacio">
    <footer>
    &copy 2022 - Sistema de Alumnos creado por Peralta Rodrigo
    </footer>
</div>
</body>
</html>