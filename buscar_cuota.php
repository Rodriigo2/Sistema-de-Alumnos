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
<form action="buscar_cuota.php" method="get">
<h2>Consultar cuota</h2>
        <select name="cuotas[]" id="cuotas[]">
        <option value="0">Buscar alumno</option>
            <?php
            include "conexion.php";
            $sql="select * from inscripciones order by dni";
            $datas = mysqli_query($con,$sql);
                    if(empty($datas)){
                        echo '<script>alert("No se encontraron datos de alumnos. No se puede continuar."); window.location="index.html";</script>';
                        exit;
                    }else{
                        $nfilas= mysqli_num_rows($datas);
                        if($nfilas>0){
                            while ($fila = mysqli_fetch_array($datas)) {
                                echo "<option value=".$fila['dni'].">".$fila['dni']."</option> ";
                            }
                        }
                    }
            ?>
        </select>

        <input type="submit" value="Buscar cuotas" name="buscar" id="buscar"><br>
    </form>
    </div>
<?php
$doc = $_GET['cuotas'];
if($doc[0]==0){
    echo '<script>alert("Seleccione una opción válida."); window.location="index.html";</script>';
                        exit;
}
if($doc[0]>0){
	include "conexion.php";

	$sql="select cuotas.*, meses.desc_cuota, cuota_estado.desc_estado from cuotas inner join meses on cuotas.nrocuota=meses.nrocuota inner join cuota_estado on cuotas.estado_cuota=cuota_estado.id_estado where dni='$doc[0]' and estado_cuota=1 order by nrocuota";
	$datos = mysqli_query($con,$sql);
	if(empty($datos)){
		echo "Sin datos de Cuotas:";
	}else{
?>
<div class="table-wrapper2">	
<table border=1 class="fl-table">
	<thead>
		<tr><th>Documento</th><th>N° Cuota</th><th>Saldo</th><th>Estado de cuota</th>
		</tr>
	</thead>
	<tbody>		
<?php
	while ($reg = mysqli_fetch_array($datos)) {
			echo '<tr>';
			echo '<td>'.$reg['dni'].'</td>';
            echo '<td>'.$reg['desc_cuota'].'</td>';
			echo '<td>'.$reg['saldo'].'</td>';
            echo '<td>'.$reg['desc_estado'].'</td>';
            echo '<td><a href="pagar_cuota.php?dni='.$reg['dni'].'&nrocuota='.$reg['nrocuota'].'&importe='.$reg['importe'].'&saldo='.$reg['saldo'].'">Pagar Cuota</a></td>';
			echo '</tr>';
	}
    echo '<td><a href="cuotas_pagas.php?dni='.$doc[0].'">Ver cuotas pagadas</a></td>';
	}
}

?>
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