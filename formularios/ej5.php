<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej5</title>
</head>
<body>
    <!-- 5. Programar una página en HTML – PHP que a través de formularios pida al
    usuario dos números y muestre, en una tabla el rango de números que van desde
    el menor hasta el mayor. -->
    <form name="mostrarRangos" method="post">
        <label for="numero1">Introduce el inicio del rango que quieres mostrar:</label>
        <input type="text" name="numero1" id="numero1">
        <br>
        <label for="numero2">Introduce el final del rango que quieres mostrar:</label>
        <input type="text" name="numero2" id="numero2">
        <br>
        <input type="submit" value="Generar el rango">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = (int)$_POST["numero1"];
            $num2 = (int)$_POST["numero2"];
            echo "<table>";
            echo "<tr><th>Números en el rango</th></tr>";
            for ($i = $num1; $i <= $num2; $i++) {
                echo "<tr><td>$i</td></tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>