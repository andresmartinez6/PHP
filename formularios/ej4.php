<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej4 formularios</title>
</head>
<body>
    <!-- 4. Programar una página en HTML – PHP que pida al usuario 3 número y muestre
    la siguiente tabla:

    Valor 1
    Valor 2
    Valor 3
    valor1 + valor2
    valor2 * valor3
    valor1 / valor3
    valor1 + valor2 + valor3
    (valor2 + valor3) / valor1 -->

    <form name="tabla" method="post">
        <label for="numero1">Ingresa un número:</label>
        <input type="text" name="numero1" id="numero1">
        <br><br>
        <label for="numero2">Ingresa otro número:</label>
        <input type="text" name="numero2" id="numero2">
        <br><br>
        <label for="numero3">Ingresa otro número:</label>
        <input type="text" name="numero3" id="numero3">
        <br><br>
        <input type="submit" value="Operar los numeros">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $valor1=$_POST["numero1"];
            $valor2=$_POST["numero2"];
            $valor3=$_POST["numero3"];
            echo"<table>";
            echo"<tr><th>Numeros sin operar:</th></tr>";
            echo"<tr><td>El numero 1 es:$valor1</td></tr>";
            echo"<tr><td>El numero 2 es:$valor2</td></tr>";
            echo"<tr><td>El numero 3 es:$valor3</td></tr>";
            echo"</table>";
            
            $sum=$valor1+$valor2;
            $mult=$valor2*$valor3;
            $div=$valor1/$valor3;
            $op_final=($valor2+$valor3)/$valor1;
            echo"<table>";
            echo"<tr><th>Numeros operados:</th></tr>";
            echo"<tr><td>$valor1+$valor2=$sum</td></tr>";
            echo"<tr><td>$valor2*$valor3=$mult</td></tr>";
            echo"<tr><td>$valor1/$valor3=$div</td></tr>";
            echo"<tr><td>($valor2/$valor3)/$valor1=$op_final</td></tr>";
            echo"</table>";
        }
    ?>
</body>
</html>