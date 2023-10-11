<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
</head>
<body>
    <!-- 1. Programar una página en HTML – PHP que pida al usuario un número y muestre
    por pantalla las 10 primeras potencias del dicho número. -->
    <form name="calcularpotencias" method="post">
        <label for="numero">Ingresa un número:</label>
        <input type="text" name="numero" id="numero">
        <input type="submit" value="Calcular potencias">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recuperar el número ingresado por el usuario
            $num = $_POST['numero'];

            if ($num!="" && $num>=0) {
                echo "<h2>Las 10 primeras potencias de $num son:</h2>";
                for ($i = 1; $i <= 10; $i++) {
                    $potencia = pow($num,$i);
                    echo "<p>Potencia de $num al ($i)=$potencia</p>";
                }
            } else {
                echo "<p>Por favor, ingresa un número válido.</p>";
            }
        }
    ?>
</body>
</html>