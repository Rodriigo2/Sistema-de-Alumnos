<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Listado de usuarios</title>
</head>
<body>
<header><h1>Listado de Usuarios</h1></header>
<main>
    <div align="center" class="table-wrapper">
    <table border="1" class="fl-table" bgcolor="white">
        <thead>
        <tr>
            <th>Código de usuario</th>
            <th>Nombre de Usuario</th>
            <th>Clave</th>
            <th>Estado</th>
            <th>Correo Electrónico</th>
        </tr>
        </thead>
        <tbody>
<?php
include "../conexion.php";
$sql = "Select usuarios.*, estado.desc_estado From usuarios inner join estado on usuarios.codestado=estado.id_estado order by cod_us";
$res=mysqli_query($con, $sql);
if(empty($res)){
    echo '<script>alert("");window.location="index.html";</script>';
}else{
    $cant_registros=mysqli_num_rows($res);
    if($cant_registros>0){
        while($registro = mysqli_fetch_array($res)){
        echo   '<tr><td>'.$registro['cod_us'].'</td><td>'.$registro['nombre'].'</td><td>'.$registro['clave'].'</td><td>'.$registro['desc_estado'].'</td><td>'.$registro['email'].'</td>';
         echo '<td><a href="edit_usuario.php?codigo='.$registro['cod_us'].'">Editar</a></td>';
         echo '<td><a href="borrar_usuario.php?codigo='.$registro['cod_us'].'">Borrar</a></td>';
        echo '</tr>';
        }
    }else{
        echo "<tr><h1><td>No exiten datos en la base de datos!</td></h1></tr>";
    }
}

?>
        </tbody>
    </table></div><br>
    <div class="btn-atras">
<a href="login.html">Volver atrás</a>
</div>
    </main>
    <div class="espacio">
        <footer>
        &copy 2022 - Sistema de Alumnos creado por Peralta Rodrigo
        </footer>
</body>
</html>