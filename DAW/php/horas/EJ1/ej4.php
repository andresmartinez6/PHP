<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="#" method="POST">
        Ingresa la fecha de devolucion<br> 
        <input type="date" name="1"><br>
        <input type="submit" name="enviar">
    </form>
        <?php

if (isset($_POST['enviar'])) {
              $fecha= strtotime($_POST['1']);
              $fechahoy = time();
             

              if ($fecha<$fechahoy) {
                $dif=$fechahoy-$fecha;
                $diasdif=$dif/86400;
                $deuda = $diasdif*3;
                echo"Hola, deberias haber devuelto el libro hace $diasdif, debes pagar $deuda euros";
              }elseif ($fecha>$fechahoy) {
                $dif=$fecha-$fechahoy;
                $diasdif=$dif/86400;
                echo"Hola, te faltan $diasdif para devolver el libro";
              }else{
                echo"Estupendo, estas devolviendo el libro el dia exacto";
              }

} 
        ?>
</body>
</html>