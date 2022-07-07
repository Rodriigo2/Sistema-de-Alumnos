

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
<div>
<main>
<div align="center" class="login-form">
<form action="cuota_pagado.php" method="Post">
<?php
$dni = $_GET['dni'];
$nrocuota = $_GET['nrocuota'];
$importe = $_GET['importe'];
$saldo = $_GET['saldo'];
    include  "conexion.php";

    $sql="select * from cuotas where nrocuota=$nrocuota and dni=$dni";
    $datas = mysqli_query($con,$sql);
    if(empty($datas)){
		echo "No se encontraron datos de la cuota";
	}else{
        $nfilas=  mysqli_num_rows($datas);
        if($nfilas>0){
            $fila=mysqli_fetch_array($datas);
            echo '<table>';
            echo '<h2>Pagar cuota</h2>';
            echo '<form action="cuota_pagada.php" method="POST" >';
			echo '<tr><td><label for="dni">Documento</label></td>';
			echo '<td><input type="text" readonly name="dni" id="dni" value="'.$fila['dni'].'"></td></tr>';
			
 		   	echo '<tr><td><label for="nrocuota">Cuota N°:</label></td>';
			echo '<td><input type="number" readonly name="nrocuota" id="nrocuta" value="'.$fila['nrocuota'].'"></td></tr>';

            
            echo '<tr><td><label for="saldo">Saldo:</label></td>';
            echo '<td><input type="number" readonly name="saldo" id="saldo" value="'.$fila['saldo'].'"</td></tr>';
            
            echo '<tr><td><label for="importe">Importe:</label></td>';
            echo '<td><input type="number" name="importe" id="importe" placeholder="Ingrese el importe"</td></tr>';

			
            echo '</table>';
			echo '<input type="submit" value="Pagar cuota" name="btnsave" id="btnsave" />';


			echo "</form>";


		}else{echo "Nrofilas=0";}
        }
mysqli_close($con);
?>
    </form>
    </div>
</div>	
</table>
</div>
</main>
<div class="espacio">
    <footer>
    &copy 2022 - Sistema de Alumnos creado por Peralta Rodrigo
    </footer>
</div>
</body>
</html>


