<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $cadena = "hola";
    function corregirPrimeraLetra($cadena){
      $mayu= ucfirst($cadena);
        echo"$mayu";
    }

    corregirPrimeraLetra($cadena);

    ?>
</body>
</html>