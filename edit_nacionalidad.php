<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar nacionalidad</title>
</head>
<body>
    <div align="Center">
<h2>Modificacion de Nacionalidad</h2>
<form action="actualizar_nacion.php" method="Post">
<label for="codigo">Código</label>
<input type="number" name="codigo" id="codigo" value="<?php echo $_GET['codigo']; ?>"><br>
<label for="desc">Nacionalidad</label>
<input type="text" name="des" id="des" value="<?php echo $_GET['descripcion'];?>">
<br>
<input type="submit" name="actualizar" id="actualizar" value="Actualizar Nacionalidad">
    </form>
    <a href="listar_nacionalidades.php">Volver atrás</a>
    </div>
</body>
</html>