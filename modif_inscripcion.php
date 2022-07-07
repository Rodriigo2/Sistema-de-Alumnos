<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Modificación de Inscripcion</title>
</head>
<body>
<header><h1>Pantalla Modificar Inscripcion</h1>
<img class="img-alumno" src="images/alumno.png" alt="Alumno-foto" align="right"></header>
<div id="header">
    <ul class="nav">
        <li><a href="index.html">Inicio</a></li>
        <li><a href="ficha_alumno/formulario_alumno.php">Alumno</a>
        <!-- <ul>
            <li><a href="formulario/login.html">Usuario</a></li>
        </ul> -->
    </li>
        <li><a href="cursos.html">Cursos</a></li>
        <li><a href="inscripciones.php">Inscripciones</a>
        <ul>
            <li><a href="cuotas.php?nrodoc=0">Cuotas</a></li>
        </ul>
        </li>
        <li><a href="inasistencia.php">Inasistencias</a>
            <ul>
                <li><a href="justificar-inasistencia.php">Justificación de Inasistencia</a></li>
            </ul>
        </li>
        <li><a href="formulario/logout.php" class="logout">Cerrar Sesión</a></li>
    </ul>
</div>
    <main>
    <div align="center" class="login-form">
    <?php
    $dni = $_GET['cod'];
    include  "conexion.php";

    $sql="select * from inscripciones where dni=$dni";
    $datas = mysqli_query($con,$sql);
    if(empty($datas)){
		echo "No se encontraron Datos con la inscripcion provista";
	}else{
        $nfilas=  mysqli_num_rows($datas);
        if($nfilas>0){
            $fila=mysqli_fetch_array($datas);
            echo '<h2>Modificación de Inscripcion</h2>';
            echo '<form action="actualizar_inscripcion.php" method="POST" >';
			echo '<label for="dni">Documento</label>';
			echo '<input type="text" readonly name="dni" id="dni" value="'.$fila['dni'].'"><br>';
			
 		   	echo '<br><label for="especialidad[]">Especialidad</label>';
			echo '<select name="especialidad[]" id="especialidad[]">';
            echo '<option value="0">Selecciona la Especialidad</option>';
            $sql="select * from especialidades order by desc_especialidad";
                    $datas = mysqli_query($con,$sql);
                    if(empty($datas)){
                        echo '<script>alert("No se encontraron datos de alumnos. No se puede continuar."); window.location="lista_alumno.php";</script>';
                        exit;
                    }else{
                        $nfilas= mysqli_num_rows($datas);
                        if($nfilas>0){
                            while ($fila = mysqli_fetch_array($datas)) {
                                echo "<option value=".$fila['id_especialidad'].">".$fila['desc_especialidad']."</option> ";
                            }
                        }
                    }
			echo '</select><br>';
            echo '<br><label for="curso[]">Curso</label>';
			echo '<select name="curso[]" id="curso[]">';
            echo '<option value="0">Selecciona el curso</option>';
            $sql="select * from cursos order by cod_curso";
                    $datas = mysqli_query($con,$sql);
                    if(empty($datas)){
                        echo '<script>alert("No se encontraron datos de alumnos. No se puede continuar."); window.location="lista_alumno.php";</script>';
                        exit;
                    }else{
                        $nfilas= mysqli_num_rows($datas);
                        if($nfilas>0){
                            while ($fila = mysqli_fetch_array($datas)) {
                                echo "<option value=".$fila['cod_curso'].">".$fila['nombre_curso']."</option> ";
                            }
                        }
                    }
			echo '</select>';
			echo '<input type="submit" value="Actualizar Inscripcion" name="btnsave" id="btnsave" />';


			echo "</form>";


		}else{echo "Nrofilas=0";}
        }
mysqli_close($con);
    ?>
    <a href="inscripcion_listar.php">Volver atrás</a>
    </div>
    </main>
    <div class="espacio">
    <footer>
    &copy 2022 - Sistema de Alumnos creado por Peralta Rodrigo
    </footer>
</body>
</html>