<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
</head>
<body>
    <?php
        foreach($datos as $dato){
            echo"$dato[dni] -- $dato[nombre] -- $$dato[edad]<br/>";
        }
    ?>
</body>
</html>