<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Modificación de alumno</title>
</head>
<body>
<header><h1>Pantalla Modificación Alumno</h1>
<img class="img-alumno" src="../images/alumno.png" alt="Alumno-foto" align="right"></header>
<div id="header">
    <ul class="nav">
        <li><a href="../index.html">Inicio</a></li>
        <li><a href="formulario_alumno.php">Alumno</a>
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
<div> 
    <main class="main2">
    <div align="center" class="form-alumno">
    <h2>Modificación de alumno</h2>
    <table>
    <?php
    $id_alumno = $_GET['id'];
    include  "../conexion.php";

    $sql="select * from alumnos where id_alumno=$id_alumno";
    $datas = mysqli_query($con,$sql);
    if(empty($datas)){
		echo "No se encontraron Datos con el alumno provisto";
	}else{
        $nfilas=  mysqli_num_rows($datas);
        if($nfilas>0){
            $fila=mysqli_fetch_array($datas);
            echo '<form action="actualizar_alumno.php" method="POST">';

			echo '<input hidden type="number" name="id_alumno" id="id_alumno" value="'.$fila['id_alumno'].'">';

			echo '<tr><td><label for="dni">DNI</label></td>';
			echo '<td><input type="number" name="dni" id="dni" value="'.$fila['dni'].'"></td></tr>';
			
 		   	echo '<tr><td><label for="nombre">Nombre</label></td>';
			echo '<td><input type="text" name="nombre" id="nombre" value="'.$fila['nombre'].'"></td></tr>';

            echo '<tr><td><label for="apellido">Apellido</label></td>';
			echo '<td><input type="text" name="apellido" id="apellido" value="'.$fila['apellido'].'"></td></tr>';

            echo '<tr><td><label for="correo">Correo electrónico</label></td>';
			echo '<td><input type="text" name="correo" id="correo" value="'.$fila['correo'].'"></td></tr>';
            ?>
            <tr><td><label for="genero[]">Género</label></td>
            <td><select name="genero[]" id="genero[]">
            <?php
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
                    </select></td></tr>
                    <?php
        $sql="select * from alumnos where id_alumno=$id_alumno";
                     $datas = mysqli_query($con,$sql);
                     if(empty($datas)){
                         echo "No se encontraron Datos con el alumno provisto";
                     }else{
                         $nfilas=  mysqli_num_rows($datas);
                         if($nfilas>0){
                             $fila=mysqli_fetch_array($datas);
            echo '<tr><td><label for="fecha_nacimiento">Fecha de Nacimiento</label></td>';
            echo '<td><input type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="'.$fila['fecha_nacimiento'].'"></td></tr>';

            echo '<tr><td><label for="lugar_nacimiento">Lugar de nacimiento</label></td>';
            echo '<td><input type="text" name="lugar_nacimiento" id="lugar_nacimiento" value="'.$fila['lugar_nacimiento'].'"></td></tr>';

            echo '<tr><td><label for="direccion">Direccion</label></td>';
            echo '<td><input type="text" name="direccion" id="direccion" value="'.$fila['direccion'].'"></td></tr>';

            ?>
            <tr><td><label for="nacionalidad[]">Nacionalidad</label></td>
            <td><select name="nacionalidad[]" id="nacionalidad[]">
            <?php
            $sql="select * from nacionalidades order by desc_nacion";
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
                    </select></td></tr>
                    <?php
        $sql="select * from alumnos where id_alumno=$id_alumno";
                     $datas = mysqli_query($con,$sql);
                     if(empty($datas)){
                         echo "No se encontraron Datos con el alumno provisto";
                     }else{
                         $nfilas=  mysqli_num_rows($datas);
                         if($nfilas>0){
                             $fila=mysqli_fetch_array($datas);
            echo '<tr><td><label for="cuil">Cuil</label></td>';
            echo '<td><input type="text" name="cuil" id="cuil" value="'.$fila['cuil'].'"></td></tr>';

            echo '<tr><td><label for="secundario">¿Finalizo el nivel secundario?</label></td>';
            echo '<td><select name="secundario[]" id="secundario[]">';
            echo '<option value="0">Seleccione una respuesta</option>';
            echo '<option value="1">Si</option>';
            echo  '<option value="2">No</option>';
        echo '</select></td></tr>';

        echo '<tr><td><label for="lugar_secundario">¿En que lugar finalizo el secundario?</label></td>';
            echo '<td><input type="text" name="lugar_secundario" id="lugar_secundario" value="'.$fila['lugar_secundario'].'"></td></tr>';

        //     echo '<label for="alergia">Alergias</label>';
        //     echo '<select name="alergia[]" id="alergia[]">';
        //     echo '<option value="0">Seleccione una respuesta</option>';
        //     echo '<option value="1">Si</option>';
        //     echo  '<option value="2">No</option>';
        // echo '</select>';
        // echo '';
        
        // echo '<label for="tipo_alergia">Tipo de alergia</label>';
        // echo '<input type="text" name="tipo_alergia" id="tipo_alergia" value="'.$fila['tipo_alergia'].'">';

        // echo '<label for="enfermedad">Enfermedades Crónicas</label>';
        // echo '<input type="text" name="enfermedad" id="enfermedad" value="'.$fila['enfermedad'].'">';

                         }
            }
			echo '</table>';
            echo '<input type="submit" value="Actualizar Curso" name="btnsave" id="btnsave" />';

                         }
                }
                    

			echo "</form>";


		}else{echo "Nrofilas=0";}
        }
mysqli_close($con);
    ?>
    </div>
    </main>
    <div class="espacio">
    <footer>
    &copy 2022 - Sistema de Alumnos creado por Peralta Rodrigo
    </footer>
</body>
</html>