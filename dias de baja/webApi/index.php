<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

        $con = new mysqli('localhost', 'root', '', 'usuarios');
        $con->set_charset('utf8');
        
        $consulta="SELECT * from tdusuarios";
        $sentencia=$con->query($consulta);
        while($filas=$sentencia->fetch_assoc()){
            echo json_encode($filas["nombre"]);
        }

       




    ?>
</body>

</html>