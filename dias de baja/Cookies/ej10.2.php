<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Hacer un sitio Web que controle el número de veces que accede un determinado
navegador a su contenido. Cada vez que se acceda al sitio Web, éste deberá mostrar
un mensaje indicando cuántas veces se ha visitado el sitio Web. -->
    <?php
    $contador = 0;
    if (isset($_COOKIE["contador"])) {
        $contador=$_COOKIE["contador"]+1;
        setcookie("contador", $contador, time() + 100000, "/");
        echo "Has entrado en este sitio $contador veces";
    } else {
        setcookie("contador", 1, time() + 100000, "/");
    }



    ?>
</body>

</html>