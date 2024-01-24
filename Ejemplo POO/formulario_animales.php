<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action='#' method='get'>
		<b>DATOS DEL PERRO</b>
			<br>
			Nombre: <input type="text" name="nombre_p">
			<br>
			Color: <input type="text" name="color_p">
			<br>
			Fecha de nacimento: <input type="date" name="fecha_p">
			<br>
			Raza: <input type="text" name="raza">
			<br>
			Sexo:  Macho <input type="radio" name="sexo" value='M'>
				   Hembra <input type="radio" name="sexo" value='H'>
			¿Qué está haciendo? 
			<br>
			<select name='accion_p'>
				<option value='l' selected> ladrar </option>
				<option value='d'> dormir </option>
			</select>
		<br><b>DATOS DEL DELFÍN</b>
			<br>
			Nombre: <input type="text" name="nombre_d">
			<br>
			Color: <input type="text" name="color_d">
			<br>
			Fecha de nacimento: <input type="date" name="fecha_d">
			<br>
			Longitud: <input type="text" name="long">
			<br>
			¿Qué está haciendo?<br>
			<select name='accion_d'>
				<option value='s' selected> saltar </option>
				<option value='c'> comer </option>
			</select>
		<input type="submit" name="enviar">		
	</form>

	<?php 

		if(isset($_GET['enviar']))
		{
			if(!$_GET['nombre_p'] || !$_GET['color_p'] || !$_GET['fecha_p']
			|| !$_GET['raza'] || !$_GET['sexo'] || !$_GET['accion_p']
			|| !$_GET['nombre_d'] || !$_GET['color_d'] || !$_GET['fecha_d']
			|| !$_GET['long'] || !$_GET['accion_d'])
			{
				echo "Debes rellenar todos los datos<br>";
				header("refresh:5;URL=formulario_animales.php");
			}
			else
			{
				require_once "perro.php";
				require_once "delfin.php";

				$perrito = new perro($_GET['nombre_p'], $_GET['color_p'],
				$_GET['fecha_p'], $_GET['raza'], $_GET['sexo']);
				$del = new delfin ($_GET['nombre_d'], $_GET['color_d'],
				$_GET['fecha_d'], $_GET['long']);

				if($_GET['accion_p'] == 'l')
				{
					echo $perrito->ladrar();
				}
				else
				{
					echo $perrito->dormir();
				}

				if($_GET['accion_d']=='s')
				{
					$del->saltar();
				}
				else
				{
					$del->comer();
				}
			}
		}


	?>
	
</body>
</html>