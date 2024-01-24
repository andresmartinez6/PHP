<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["color"]) && isset($_SESSION["letra"])) {
        echo "<body style='background-color:$_SESSION[color];font-family:$_SESSION[letra]'>";
        echo "<h1>David eres retrasado</h1>";
    }
    ?>
    <a href="./Sesion.php">Pagina 1</a>
    <a href="./Sesion2.php">Pagina 2</a>
    <a href="./Sesion4.php">Pagina 4</a>
</body>

</html>