<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Modificar Usuario</title>
</head>
<body>
<header><h1>Modificar Usuario</h1>
<img class="img-alumno" src="../images/alumno.png" alt="Alumno-foto" align="right"></header>
<main>
<div align="center" class="login-form">
<table>
    <?php
    $codigo = $_GET['codigo'];
    include  "../conexion.php";

    $sql="select * from usuarios where cod_us=$codigo";
    $datas = mysqli_query($con,$sql);
    if(empty($datas)){
		echo "No se encontraron Datos con el usuario provisto";
	}else{
        $nfilas=  mysqli_num_rows($datas);
        if($nfilas>0){
            $fila=mysqli_fetch_array($datas);
            echo '<h2>Modificación de Usuario</h2>';
            echo '<form action="actualizar_usuario.php" method="POST" >';
			echo '<tr><td><label for="cod_us">Código de usuario</label></td>';
			echo '<td><input type="text" readonly name="cod_us" id="cod_us" value="'.$fila['cod_us'].'"></td></tr>';
			
 		   	echo '<tr><td><label for="nombre">Nombre de usuario</label></td>';
			echo '<td><input type="text" name="nombre" id="nombre" value="'.$fila['nombre'].'"></td></tr>';

            echo '<tr><td><label for="clave">Contraseña del usuario</label></td>';
			echo '<td><input type="text" name="clave" id="clave" value="'.$fila['clave'].'"></td></tr>';

            echo '<tr><td><label for="codestado[]">Estado del usuario</label></td>';
            echo '<td><select name="codestado[]" id="codestado[]">';
            echo '<option value="1">Activo</option>';
            echo '<option value="0">Inactivo</option>';

            echo '</select></td></tr>';
			
            echo '<tr><td><label for="email">Correo Electrónico</label></td>';
			echo '<td><input type="text" name="email" id="email" value="'.$fila['email'].'"></td></tr>';

            echo '</table>';

			echo '<input type="submit" value="Actualizar Curso" name="btnsave" id="btnsave" />';


			echo "</form>";


		}else{echo "Nrofilas=0";}
        }
mysqli_close($con);
    ?>
    <a href="lista_usuario.php">Volver atrás</a>
    </main>
    <div class="espacio">
        <footer>
        &copy 2022 - Sistema de Alumnos creado por Peralta Rodrigo
        </footer>
</body>
</html>