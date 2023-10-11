<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej3 formulario</title>
</head>
<body>
    <!--3. Programar una página en HTML – PHP que pida al usuario 3 números y los
        muestre ordenados de menor a mayor dentro de una tabla.-->
    <form name="ordenarnumeros" method="post">
        <label for="numero1">Ingresa un número:</label>
        <input type="text" name="numero1" id="numero1">
        <br><br>
        <label for="numero2">Ingresa otro número:</label>
        <input type="text" name="numero2" id="numero2">
        <br><br>
        <label for="numero3">Ingresa otro número:</label>
        <input type="text" name="numero3" id="numero3">
        <br><br>
        <input type="submit" value="Ordenar números">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $num1 = $_POST["numero1"];
            $num2 = $_POST["numero2"];
            $num3 = $_POST["numero3"];
            $array = [$num1, $num2, $num3];
            if ($num1 != "" && $num2 != "" && $num3 != "" && is_numeric($num1) && is_numeric($num2) && is_numeric($num3)) {
                sort($array);
                echo "<table>";
                echo "<tr><th>Números ordenados</th></tr>";
                echo "<tr><td>{$array[0]}</td></tr>";
                echo "<tr><td>{$array[1]}</td></tr>";
                echo "<tr><td>{$array[2]}</td></tr>";
                echo "</table>";
            } else {
                echo "Número introducido no válido";
            }
        }
    ?>

</body>
</html>