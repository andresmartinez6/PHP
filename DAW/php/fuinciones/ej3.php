<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $cadena = "Hola como estas";
    function contarLetraA($cadena){
    $buscar= "a";
    $buscarA = substr_count($cadena,$buscar);
    
        echo"La letra a aparece $buscarA veces";
    }
    
    contarLetraA($cadena);

    ?>
</body>
</html>