<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <form action="#" method="post">
        <label for="color">Selecciona el color</label>
        <input type="color" name="color">
        <label for="letra">Que tipo de letra quieres</label>
        <input type="text" name="letra">
        <input type="submit" name="enviar">
    </form>
    <?php
    if (isset($_POST["enviar"])) {
        session_start();
        $_SESSION["color"] = $_POST["color"];
        $_SESSION["letra"] = $_POST["letra"];
    }
    ?>
    
    <a href="./Sesion2.php">Pagina 2</a>
    <a href="./Sesion3.php">Pagina 3</a>
    <a href="./Sesion4.php">Pagina 4</a>
</body>

</html>