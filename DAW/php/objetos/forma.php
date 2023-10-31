<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post" id="forma">
        Escribe el nombre:
        <br>
        <input type="text" name="nombre" placeholder="Reina...">
        <br>
        Color:
        <br>
        <input type="text" name="color" placeholder="amarillo...">
        <br>
        Fecha de nacimiento:
        <input type="date" name="fecha">
        <br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
        require_once 'animal.php';//esto es el equivalente del IMPORT de Java para llamar a las clases
        if (isset($_POST['enviar'])) {
            $nom=$_POST['nombre'];
            $col=$_POST['color'];
            $fec=$_POST['fecha'];

            $ani=new Animal($nom,$col,$fec);
            $edad=$ani->obtenerEdad();
            echo "<h2>Tu mascota tiene ".$edad." años</h2>";
            echo $ani->__toString();
        }

    ?>
</body>
</html>