<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$cadena = "PALA";
function corregirMayusculas($cadena){
  $minus= strtolower($cadena);
  $mayus= ucfirst($minus);

    echo"$mayus";
}

corregirMayusculas($cadena);

?>
</body>
</html>