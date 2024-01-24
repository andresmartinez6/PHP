<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action=# method='post' enctype="multipart/form-data">
		archivo <input type="file" name="a">
		<br>
		nuevo nombre para archivo <input type="text" name="nom">
		<br>
		<input type="submit" name="enviar">

	</form>

	<?php 
		if(isset($_POST['enviar']))
		{
			//saco la información del nombre del archivo, como si fuera una simple cadena de texto
			$info = pathinfo($_FILES['a']['name']);

			//me quedo con el nombre del archivo sin extensión
			$nombre_archivo = $info['basename'];
			//saco la extensión del archivo
			$extension = $info['extension'];


			//concateno nombre que quiere el usuario con extensión extraída
			$nombre_nuevo = $_POST['nom'].".".$extension;


			//subo archivo al servidor
			move_uploaded_file($_FILES['a']['tmp_name'], $nombre_nuevo);
		}
	?>
	
</body>
</html>