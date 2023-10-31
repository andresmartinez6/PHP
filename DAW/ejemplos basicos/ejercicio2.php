<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num1=25;
    $num2=13;
    $suma=$num1+$num2;
    $resta=$num1-$num2;
    $multi=$num1*$num2;
    $div=$num1/$num2;

    echo"<table border bgcolor='grey' align='center' >
    <tr bgcolor='red'>
    <td>Operacion</td>
    <td>Resultado</td>
    <td>Operacion</td>
    <td>Resultado</td>
    </tr>
    <tr>
    <td>$num1+$num2</td>
    <td>$suma</td>
    <td>$num1*$num2</td>
    <td>$multi</td>
    </tr>
    <tr>
    <td>$num1-$num2</td>
    <td>$resta</td>
    <td>$num1/$num2</td>
    <td>$div</td>
    </tr>
    </table>"
    ?>
</body>
</html>