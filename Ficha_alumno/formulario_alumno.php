<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Ficha de alumno</title>
</head>
<body>
<header><h1>Pantalla de alumno</h1>
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
       <li><a href="#">Alumno</a></li>
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
        <ul> -->
            <!-- <li><a href="../justificar-inasistencia.php">Justificación Inasistencia</a></li> -->
            <!-- <li><a href="#">Cargar Asistencia</a></li> -->
        <!-- </ul>
    </ul>
</nav>
</div> -->
<div id="header">
    <ul class="nav">
        <li><a href="../index.html">Inicio</a></li>
        <li><a href="#">Alumno</a>
        <ul>
            <li><a href="../formulario/login.html">Usuario</a></li>
        </ul></li>
        <li><a href="../cursos.html">Cursos</a></li>
        <li><a href="../inscripciones.php">Inscripciones</a>
        <ul>
            <li><a href="../cuotas.php">Cuotas</a></li>
        </ul>
        </li>
        <li><a href="../inasistencia.php">Inasistencias</a>
            <ul>
                <li><a href="../justificar-inasistencia.php">Justificación de Inasistencia</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="main2">
<main>
    <div align="center" class="form-alumno"><h1><u></u></h1>
        <table>
        <thead>
        <caption><h2>Alumno</h2></caption></thead>
        <form action="guardar_alumno.php" method="post" class="">
        <tbody>
        <div class="sinborde">
        <tr><td><label for="dni">DNI</label></td> 
            <td><input type="number" name="dni" id="dni" placeholder="Ingrese su DNI" required><br></td>
        </tr>
        <tr>
        <td><label for="nombre">Nombre</label></td> 
        <td><input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" required><br></td>
        </tr>
        <tr><td><label for="apellido">Apellido</label></td>
            <td><input type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido" required><br></td>
        </tr>
        <tr>
            <td><label for="correo">Correo electrónico</label></td>
            <td><input type="email" name="correo" id="correo" placeholder="Correo@hotmail.com" required></td>
        </tr>
        <tr>
            <td><label for="sexo">Género</label></td>
            <td><select name="sexo[]" id="sexo[]">
            <option value="0">Selecciones su género</option>
            <?php
            include "../conexion.php";
                    $sql="select * from generos order by desc_genero";
                    $datas = mysqli_query($con,$sql);
                    if(empty($datas)){
                        echo "<option value='0'>Sin género</option>";
                    }else{
                        $nfilas= mysqli_num_rows($datas);
                        if($nfilas>0){
                            while ($fila = mysqli_fetch_array($datas)) {
                                echo "<option value=".$fila['id_genero'].">".$fila['desc_genero']."</option> ";
                            }
                        }
                    }
                
                    ?>
            </select></td>
        </tr>
        <!-- <tr>
            <td><label for="curso">Curso</label></td><td><select name="curso[]" id="curso[]">
            <option value="0" selected>Seleccione un año</option>
            <option value="1">1er año</option>
            <option value="2">2do año</option>
            <option value="3">3er año</option>
        </select><br></td>
        </tr> -->
        <tr>
            <td><label for="fecha_nacimiento">Fecha de nacimiento</label></td>
            <td><input type="text" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="DD/MM/AAAA" required><br></td>
        </tr>
        <tr>
        <td><label for="lugar_nacimiento">Lugar de nacimiento</label></td>
        <td><input type="text" name="lugar_nacimiento" id="lugar_nacimiento" placeholder="Ingrese su lugar de nacimiento" required><br></td>
        </tr>
        <tr>
            <td><label for="direccion">Dirección</label></td>
            <td><input type="text" name="direccion" id="direccion" placeholder="Ingrese su dirección" required><br></td>
        </tr>
        <tr>
            <td><label for="nacion[]">Nacionalidad</label></td>
            <td>
                <select id="nacion[]" name="nacion[]">
                    <option value="0">Seleccione su nacionalidad</option>
                    <?php
                    include "../conexion.php";
                    $sql="select * from Nacionalidades order by desc_nacion";
                    $datas = mysqli_query($con,$sql);
                    if(empty($datas)){
                        echo "<option value='0'>Sin Nacionalidad</option>";
                    }else{
                        $nfilas= mysqli_num_rows($datas);
                        if($nfilas>0){
                            while ($fila = mysqli_fetch_array($datas)) {
                                echo "<option value=".$fila['nacionalidad'].">".$fila['desc_nacion']."</option> ";
                            }
                        }
                    }
                
                    ?>
                </select><br></td>
        </tr>
        <tr>
            <td><label for="cuil">Cuil</label></td>
            <td><input type="number" name="cuil" id="cuil" placeholder="Ingrese su CUIL" required><br></td>
        </tr>
       <tr>
           <td><label for="secundario">¿Finalizo el nivel secundario?</label></td>
           <td><select name="secundario[]" id="secundario[]">
           <option value="0">Seleccione una respuesta</option>
            <option value="1">Si</option>
            <option value="2">No</option>
        </select>
        <br></td>
        </tr>
    <tr>
        <td><label for="lugar">¿En que lugar finalizo el secundario?</label></td>
        <td><input type="text" name="lugar" id="lugar" placeholder="Ingrese el lugar"></td>
    </tr>
            <!-- <tr>
                <td><label for="alergia">Alergias</label></td>
                <td><select name="alergia[]" id="alergia[]">
                    <option value="0">Seleccione una respuesta</option>
                    <option value="1">Si</option>
                    <option value="2">No</option>
                </select><br></td>
            </tr>
            <tr><td><label for="tipo">Tipo de alergia</label></td>
                <td><input type="text" name="tipo" id="tipo" placeholder="Ingrese tiene alguna alergia"><br></td>
            </tr>
            <tr>
                <td><label for="enfermedad">Enfermedades Crónicas</label></td>
                <td><input type="text" name="enfermedad" id="enfermedad" placeholder="Ingrese si tiene alguna enfermedad crónica">
        <br></td></tr> -->
    </table>
        <input type="submit" name="btn-subir" id="btn-subir" value="Cargar alumno">
        <input type="reset" name="" id=""><br>
        <a href="lista_alumno.php">Lista alumnos |</a>
        <a href="../index.html">Volver a inicio</a>
    </div>
    </div>
</form>
</tbody>
</main>
</div>
<div class="espacio">
    <footer>
    &copy 2022 - Sistema de Alumnos creado por Peralta Rodrigo
    </footer>
</body>
</html>