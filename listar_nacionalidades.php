<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Listado Nacionalidades</title>
</head>
<body>
    <div align="center">
    <table>
        <caption><h2>Listado de Nacionalidades</h2>
    </caption>
        <thead>
        <tr>
            <th>Código</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
<?php
include "conexion.php";
$sql = "Select * From Nacionalidades order by desc_nacion";
$res=mysqli_query($con, $sql);
if(empty($res)){
    echo '<script>alert("");window.location="index.html";</script>';
}else{
    $cant_registros=mysqli_num_rows($res);
    if($cant_registros>0){
        while($registro = mysqli_fetch_array($res)){
        echo   '<tr><td>'.$registro['nacionalidad'].'</td><td>'.$registro['desc_nacion'].'</td>';
        echo '<td><a href="edit_nacionalidad.php?codigo='.$registro['nacionalidad'].'&descripcion='.$registro['desc_nacion'].'">Editar</a></td>';
        echo '</tr>';
        }
    }else{
        echo "<tr><h1><td>No exiten datos en la base de datos!</td></h1></tr>";
    }
}

?>
        </tbody>
    </table>
    </div>
</body>
</html>