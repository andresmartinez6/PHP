<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ej2 formulario</title>
</head>
<body>
    <!-- 2. Programar una página en HTML – PHP que pida al usuario un número y muestre
    la tabla de multiplicar de dicho número. -->
    <form name="calculartabla" method="post">
        <label for="numero">Ingresa un numero:</label>
        <input type="text" name="numero" id="numero">
        <input type="submit" value="Calcular tabla de multiplicar">
    </form>
    <?php
        $res=0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num = $_POST['numero'];

            if ($num!="" && $num>=0) {
                echo "<h2>La tabla de multiplicar de $num es:</h2>";
                for ($i=1; $i<=10; $i++) {
                    $res=$num*$i;
                    echo "<p>$num * $i= $res</p>";
                }
            } else {
                echo "<p>Por favor, ingresa un número válido.</p>";
            }
        }
    ?>
</body>
</html>