<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Modificación de especialidad</title>
</head>
<body>
<header><h1>Pantalla Modificar Especialidad</h1>
<img class="img-alumno" src="images/alumno.png" alt="Alumno-foto" align="right"></header>
<div id="header">
    <ul class="nav">
        <li><a href="index.html">Inicio</a></li>
        <li><a href="ficha_alumno/formulario_alumno.php">Alumno</a>
        <ul>
            <li><a href="formulario/login.html">Usuario</a></li>
        </ul>
        </li>
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
    <div align="center" class="login-form">
    <?php
    $cod_especialidad = $_GET['cod'];
    include  "conexion.php";

    $sql="select * from especialidades where id_especialidad=$cod_especialidad";
    $datas = mysqli_query($con,$sql);
    if(empty($datas)){
		echo "No se encontraron Datos con la especialidad provista";
	}else{
        $nfilas=  mysqli_num_rows($datas);
        if($nfilas>0){
            $fila=mysqli_fetch_array($datas);
            echo '<h2>Modificación de Especialidad</h2>';
            echo '<form action="actualizar_especialidad.php" method="POST" >';
			echo '<label for="txtcod">Codigo de especialidad</label>';
			echo '<input type="text" readonly name="txtcod" id="txtcod" value="'.$fila['id_especialidad'].'"><br>';
			
 		   	echo '<br><label for="txtnombre">Nombre de la especialidad</label>';
			echo '<input type="text" name="txtnombre" id="txtnombre" value="'.$fila['desc_especialidad'].'"><br><br>';
			
			echo '<input type="submit" value="Actualizar Especialidad" name="btnsave" id="btnsave" />';


			echo "</form>";


		}else{echo "Nrofilas=0";}
        }
mysqli_close($con);
    ?>
    <a href="especialidad_lista.php">Volver atrás</a>
    </div>
    </main>
    <div class="espacio">
    <footer>
    &copy 2022 - Sistema de Alumnos creado por Peralta Rodrigo
    </footer>
</body>
</html>