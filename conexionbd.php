<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<?php
		//1. conectarme con la bd
		// creando un objeto de tipo mysqli
		$con = new mysqli ('localhost', 'root', '', 'centro');
		//asignar el conjunto de caracteres
		$con->set_charset('utf8');

		//2. Construir la sentencia que quiero ejecutar
		$sentencia = "select nombre, creditos from asignaturas";

		//3. Ejecutar la sentencia
		$resultado = $con->query($sentencia);
		// Si hemos hecho insert, uptade o un delete (true o false)
		// Si hemos hecho un select (false  o conjunto de datos)
		if (!$resultado)
		{
			echo "sentencia mal escrita<br>";
			echo "Error ocurrido: $con->errno, que significa: $con->error";
		}
		else
		{
			/*
			//4. sacar y mostrar los datos
			$num_filas = $resultado->num_rows;
			for($i=0; $i<$num_filas; $i++)
			{
				$datos = $resultado->fetch_array(MYSQLI_ASSOC);
				echo "- $datos[nombre] tiene $datos[creditos] creditos <br>";
			}*/

			//4. sacar y mostrar los datos
			$datos = $resultado->fetch_all(MYSQLI_ASSOC);
			
			for($i=0; $i<count($datos); $i++)
			{
				echo "- ".$datos[$i]['nombre']." tiene ".$datos[$i]['creditos']." creditos<br>";
			}



		}

		//5. cerrar la conexión
		$con->close();




	?>
	
</body>
</html>